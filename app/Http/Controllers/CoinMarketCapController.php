<?php

namespace App\Http\Controllers;

use App\CryptoCurrency;
use App\CustomValue;
use App\Data;
use App\Markets;
use App\MarketsExchange;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use function PHPSTORM_META\type;
use Yangqi\Htmldom\Htmldom;

class CoinMarketCapController extends Controller
{
    public static $domain           = 'https://coinmarketcap.com/';

    public static $domain_graphs    = 'https://graphs.coinmarketcap.com/';

    public static $path_all         = 'all/views/all/';


    protected static function nameCurrency($tr){
        return trim($tr);
    }

    protected static function symbolCurrency($tr){
        return trim($tr);
    }

    protected static function change_1h_usd($tr){
        $tr = ($tr ? (float) $tr : null);
        return $tr;
    }

    protected static function change_1h_btc($tr){
        $tr = ($tr ? (float) $tr : null);
        return $tr;
    }

    protected static function change_24h_usd($tr){
        $tr = ($tr ? (float) $tr : null);
        return $tr;
    }

    protected static function change_7d_btc($tr){
        $change_7d_btc = ($change_7d_btc ? (float) $change_7d_btc->{'data-btc'} : null);
        return $change_7d_btc;
    }

    protected static function change_7d_usd($tr){
        $change_7d_usd = $tr->find('td.percent-7d',0);
        $change_7d_usd = ($change_7d_usd ? (float) $change_7d_usd->{'data-usd'} : null);
        return $change_7d_usd;
    }

    protected static function change_24h_btc($tr){
        $tr = ($tr ? (float) $tr : null);
        return $tr;
    }

    protected static function market_cap_usd($tr){
        $tr = ($tr ? (float) $tr : null);
        return $tr;
    }


    /**
     * @param $tr
     * @return float|null
     */
    protected static function price_usd($price_usd){
        $price_usd = ($price_usd ? (float) $price_usd : null);
        return $price_usd;
    }

    protected static function price_btc($price_btc){
        $price_btc = ($price_btc ? (float) $price_btc : null);
        return $price_btc;
    }

    protected static function volume_usd($volume_usd){
        $volume_usd = ($volume_usd ? (float) $volume_usd : null);
        return $volume_usd;
    }


    protected static function available_supply($available_supply){
        $available_supply = (!is_null($available_supply) ? (float) $available_supply : null);
        return $available_supply;
    }


    protected static function total_supply($total_supply){
        $total_supply = (!is_null($total_supply) ? floatval($total_supply) : null);
        return $total_supply;
    }

    protected static function max_supply($max_supply){
        $max_supply = (!is_null($max_supply) ? floatval($max_supply) : null);
        return $max_supply;
    }




    public function index(){

        $client = new Client;

        $html = $client->get('https://api.coinmarketcap.com/v1/ticker/?start=0&limit=1800')->getBody();

        $json = \GuzzleHttp\json_decode($html);

//        return response()->json($json);


        foreach ($json as $item){

            $data[] = CryptoCurrency::updateOrCreate(
                ['url' => $item->id],
                [
                    'name'                  => $item->name,
                    'full_name'             => self::nameCurrency($item->name),
                    'symbol'                => self::symbolCurrency($item->symbol),
                    'slug'                  => str_slug(self::nameCurrency($item->name)),
                    'rank'                  => $item->rank,
                    'url'                   => $item->id,

                    'price_usd'             => self::price_usd($item->price_usd),
                    'price_btc'             => self::price_btc($item->price_btc),

                    'market_cap_usd'        => self::market_cap_usd($item->market_cap_usd),

                    'volume_24h_usd'        => self::volume_usd($item->{'24h_volume_usd'}),

                    'available_supply'      => self::available_supply($item->{'available_supply'}),

                    'total_supply'          => self::total_supply($item->{'total_supply'}),

                    'max_supply'            => self::max_supply($item->{'max_supply'}),

                    'percent_change_1h'     => $item->{'percent_change_1h'},
                    'percent_change_24h'    => $item->{'percent_change_24h'},
                    'percent_change_7d'     => $item->{'percent_change_7d'},
                    'last_updated'          => $item->{'last_updated'},

                ]
            );

        }

        return $data;


    }


    public function show($id = 1){

        $timeStar = 1367174841000;
        $timeEnd = Carbon::now()->timestamp.'000';

        $coin = CryptoCurrency::findOrFail($id);

//        return $coin;

        $client = new Client;


        $htmldata = $client->get(self::$domain.'currencies/'.$coin->url)->getBody();

//        return $htmldata;

        $htmlDom = new Htmldom($htmldata);

        $menuData  = $htmlDom->find('.list-unstyled',0);

        foreach ($menuData->find('a') as $li ){
            $href = trim($li->href);
            $title = trim($li->plaintext);

            CustomValue::firstOrCreate([
                'id_crypto_currencie' => $id,
                'name' => $title,
                'value' => $href,
            ]);

        }


        $marketsTable = $htmlDom->find('#markets-table',0);

        foreach ($marketsTable->find('tr') as $trMarket ){
            $nameMarket = $trMarket->find('td',1);
            if(!$nameMarket) continue;

            $nameMarket = trim($nameMarket->plaintext);
            $urlMarket =  $trMarket->find('td',2)->find('a',0)->href;
            $domainMarket = parse_url($urlMarket,PHP_URL_SCHEME).'://'.parse_url($urlMarket,PHP_URL_HOST);

            $CreateMarket = Markets::firstOrCreate(
                ['name' => $nameMarket],
                [
                    'name' => $nameMarket,
                    'url' => $domainMarket,
                ]
            );

            $id_CreateMarket = $CreateMarket->id;

//            MarketsExchange::firstOrCreate([
//                'id_crypto_currencie' => ,
//                'id_market' => ,
//            ],
//                [
//                    'id_crypto_currencie' => ,
//                    'id_market' => ,
//                    'url' => ,
//                    'from' => ,
//                    'to' => ,
//                ]);


        }

//        return '';


//        $html = $client->get(self::$domain_graphs.$coin->url.$timeStar.'/'.$timeEnd.'/')->getBody();
//        $data =  json_decode($html);
//
//        $data = collect($data)->toArray();
//
//        $NewArray = [];
//        $i = 0;
//        foreach($data['market_cap_by_available_supply'] as $value) {
//            $NewArray = array_unique(array_merge(array_merge(array_merge($value, $data['price_usd'][$i]),$data['price_btc'][$i]),$data['volume_usd'][$i]));
//            $i++;
//
//            $time = Carbon::createFromTimestampUTC(substr($NewArray[0],0,-3))->toDateTimeString();
//
//            $data[] = Data::firstOrCreate(
//                ['time' => $time,'id_crypto_currencie' => $coin->id],
//                [
//                    'time'                   => $time,
//                    'id_crypto_currencie'    => $coin->id,
//                    'market_cap_by_available_supply'              => $NewArray[1],
//                    'price_usd'              => $NewArray[3],
//                    'price_btc'              => $NewArray[5],
//                    'volume_usd'             => $NewArray[7],
//                ]
//            );
//
//
//        }
//

        //$data = array_unique($NewArray[0]);

       return response()->json($data);

    }
}
