<?php

namespace App\Http\Controllers;

use App\CryptoCurrency;
use App\Data;
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
        return $tr->find('.currency-name-container',0)->plaintext;
    }

    protected static function symbolCurrency($tr){
        return $tr->find('.col-symbol',0)->plaintext;
    }

    protected static function change_1h_usd($tr){
        $percent_1h = $tr->find('td.percent-1h',0);
        $change_1h = ($percent_1h ? (float) $percent_1h->{'data-usd'} : null);
        return $change_1h;
    }

    protected static function change_1h_btc($tr){
        $change_1h_btc = $tr->find('td.percent-1h',0);
        $change_1h_btc = ($change_1h_btc ? (float) $change_1h_btc->{'data-btc'} : null);
        return $change_1h_btc;
    }

    protected static function change_24h_usd($tr){
        $change_24h_usd = $tr->find('td.percent-24h',0);
        $change_24h_usd = ($change_24h_usd ? (float) $change_24h_usd->{'data-usd'} : null);
        return $change_24h_usd;
    }

    protected static function change_7d_btc($tr){
        $change_7d_btc = $tr->find('td.percent-1h',0);
        $change_7d_btc = ($change_7d_btc ? (float) $change_7d_btc->{'data-btc'} : null);
        return $change_7d_btc;
    }

    protected static function change_7d_usd($tr){
        $change_7d_usd = $tr->find('td.percent-7d',0);
        $change_7d_usd = ($change_7d_usd ? (float) $change_7d_usd->{'data-usd'} : null);
        return $change_7d_usd;
    }

    protected static function change_24h_btc($tr){
        $change_24h_btc = $tr->find('td.percent-24h',0);
        $change_24h_btc = ($change_24h_btc ? (float) $change_24h_btc->{'data-btc'} : null);
        return $change_24h_btc;
    }

    protected static function market_cap_usd($tr){
        $market_cap_usd = $tr->find('.market-cap',0);
        $market_cap_usd = ($market_cap_usd ? (float) $market_cap_usd->{'data-usd'} : null);
        return $market_cap_usd;
    }

    /**
     * @param $tr
     * @return float|null
     */
    protected static function market_cap_btc($tr){
        $market_cap_btc = $tr->find('.market-cap',0);
        $market_cap_btc = ($market_cap_btc ? (float) $market_cap_btc->{'data-btc'} : null);
        return $market_cap_btc;
    }

    /**
     * @param $tr
     * @return float|null
     */
    protected static function price_usd($tr){
        $price_usd = $tr->find('.price',0);
        $price_usd = ($price_usd ? (float) $price_usd->{'data-usd'} : null);
        return $price_usd;
    }

    protected static function price_btc($tr){
        $price_btc = $tr->find('.price',0);
        $price_btc = ($price_btc ? (float) $price_btc->{'data-btc'} : null);
        return $price_btc;
    }

    protected static function volume_usd($tr){
        $volume_usd = $tr->find('.volume',0);
        $volume_usd = ($volume_usd ? (float) $volume_usd->{'data-usd'} : null);
        return $volume_usd;
    }


    protected static function url($tr){
        $url =  $tr->find('.currency-name-container',0)->href;
        return $url;
    }

    protected static function volume_btc($tr){
        $volume_btc = $tr->find('.volume',0);
        $volume_btc = ($volume_btc ? (float) $volume_btc->{'data-btc'} : null);
        return $volume_btc;
    }

    protected static function circulating_supply($tr){
        $circulating_supply = $tr->find('.circulating-supply a',0);
        $circulating_supply = ($circulating_supply ? (float) $circulating_supply->{'data-supply'} : null);
        return $circulating_supply;
    }

    protected static function circulating_url($tr){
        $circulating_supply = $tr->find('.circulating-supply a',0);
        $circulating_supply = ($circulating_supply ? $circulating_supply->href : null);
        return $circulating_supply;
    }

    public function index(){

        $client = new Client;

        $html = $client->get(self::$domain.self::$path_all)->getBody();

        $htmlDom = new Htmldom($html);

        $tableCurrencies = $htmlDom->find('#currencies-all',0);

        foreach ($tableCurrencies->find('tbody>tr[id]') as $tr){

            $data[] = CryptoCurrency::updateOrCreate(
                ['url' => self::url($tr)],
                [
                    'name'              => self::nameCurrency($tr),
                    'symbol'            => self::symbolCurrency($tr),
                    'slug'              => str_slug(self::nameCurrency($tr)),

                    'price_usd'         => self::price_usd($tr),
                    'price_btc'         => self::price_btc($tr),

                    'market_cap_usd'    => self::market_cap_usd($tr),
                    'market_cap_btc'    => self::market_cap_btc($tr),

                    'volume_24h_usd'    => self::volume_usd($tr),
                    'volume_24h_btc'    =>  self::volume_btc($tr),

                    'change_1h_usd'     => self::change_1h_usd($tr),
                    'change_1h_btc'     =>  self::change_1h_btc($tr),

                    'change_24h_usd'    => self::change_24h_usd($tr),
                    'change_24h_btc'    =>  self::change_24h_btc($tr),

                    'change_7d_usd'     => self::change_7d_usd($tr),
                    'change_7d_btc'     => self::change_7d_usd($tr),

                    'circulating'       => self::circulating_supply($tr),
                    'circulating_url'   => self::circulating_url($tr),

                    'url'               => self::url($tr)
                ]
            );

        }

        return $data;


    }


    public function show(){

        $timeStar = 1367174841000;
        $timeEnd = Carbon::now()->timestamp.'000';


        $coin = CryptoCurrency::orderBy('id')->find(1);

        $client = new Client;

        $html = $client->get(self::$domain_graphs.$coin->url.$timeStar.'/'.$timeEnd.'/')->getBody();

        $data =  json_decode($html);

        $data = collect($data)->toArray();

        $NewArray = [];
        $i = 0;
        foreach($data['market_cap_by_available_supply'] as $value) {
            $NewArray = array_unique(array_merge(array_merge(array_merge($value, $data['price_usd'][$i]),$data['price_btc'][$i]),$data['volume_usd'][$i]));
            $i++;

            $time = Carbon::createFromTimestampUTC(substr($NewArray[0],0,-3))->toDateTimeString();

            $data[] = Data::firstOrCreate(
                ['time' => $time,'id_crypto_currencie' => $coin->id],
                [
                    'time'                   => $time,
                    'id_crypto_currencie'    => $coin->id,
                    'market_cap_by_available_supply'              => $NewArray[1],
                    'price_usd'              => $NewArray[3],
                    'price_btc'              => $NewArray[5],
                    'volume_usd'             => $NewArray[7],
                ]
            );


        }


        //$data = array_unique($NewArray[0]);

       return response()->json($data);

    }
}
