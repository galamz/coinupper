<?php

namespace App\Http\Controllers;

use App\CryptoCurrency;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use function PHPSTORM_META\type;
use Yangqi\Htmldom\Htmldom;

class CoinMarketCapController extends Controller
{
    public static $domain = 'https://coinmarketcap.com/';


    public static $path_all = 'all/views/all/';


    public function index(){

        $client = new Client;

        $html = $client->get(self::$domain.self::$path_all)->getBody();

        $htmlDom = new Htmldom($html);


        $tableCurrencies = $htmlDom->find('#currencies-all',0);

//        return $tableCurrencies;


        foreach ($tableCurrencies->find('tbody>tr[id]') as $tr){

            $percent_1h = $tr->find('td.percent-1h',0);
            $change_1h = ($percent_1h ? $percent_1h->{'data-usd'} : null);

            $percent_1h_btc = $tr->find('td.percent-1h',0);
            $percent_1h_btc = ($percent_1h_btc ? $percent_1h_btc->{'data-btc'} : null);

            $change_24h = $tr->find('td.percent-24h',0);
            $change_24h = ($change_24h ? $change_24h->{'data-usd'} : null);


            $change_24h_btc = $tr->find('td.percent-24h',0);
            $change_24h_btc = ($change_24h_btc ? $change_24h_btc->{'data-btc'} : null);


            $change_7d = $tr->find('td.percent-7d',0);
            $change_7d = ($change_7d ? $change_7d->{'data-usd'} : null);


            $change_7d_btc = $tr->find('td.percent-7d',0);
            $change_7d_btc = ($change_7d_btc ? $change_7d_btc->{'data-usd'} : null);

//            return (float) $tr->find('.volume',0)->{'data-usd'};

//            return e($tr);

            $data[] = $item = [
                'name'              => $name               = $tr->find('.currency-name-container',0)->plaintext,
                'symbol'            => $symbol             = $tr->find('.col-symbol',0)->plaintext,

                'market-cap-usd'    => $market_cap_usd     = $tr->find('.market-cap',0)->{'data-usd'},
                'market-cap-btc'    => $market_cap_btc     = $tr->find('.market-cap',0)->{'data-btc'},

                'price-usd'         => $price_usd          = $tr->find('.price',0)->{'data-usd'},
                'price-btc'         => $price_usd          = $tr->find('.price',0)->{'data-btc'}, // need fix
//
//                'volume-usd'        => $volume_usd         = $tr->find('.volume',0)->{'data-usd'},
//                'volume-btc'        => $volume_btc         = $tr->find('.volume',0)->{'data-btc'},

//
                'change-1h-usd'     => $change_1h,
                'change-24h-usd'    => $change_24h,
                'change-7d-usd'     => $change_7d,

//
                'change-1h-btc'     => $percent_1h_btc,
                'change-24h-btc'    => $change_24h_btc,
                'change-7d-btc'     => $change_7d_btc

            ];

//            return floatval($item['price-usd']);


            CryptoCurrency::updateOrCreate(
                ['symbol' => $item['symbol']],
                [
                    'name'          => $item['name'],
                    'symbol'        => $item['symbol'],
                    'slug'          => str_slug($item['name']),

                    'price_usd'        => $item['price-usd'],
                    'price_btc'        => $item['price-btc'],

                    'market_cap_usd'    => $item['market-cap-usd'],
                    'market_cap_btc'    => $item['market-cap-btc'],

                    'volume_24h_usd' => (type($item['volume-usd']) ? $item['volume-usd'] : null ),
                    'volume_24h_btc' => $item['volume-btc'],

                    'change_1h_usd' => $item['change-1h-usd'],
                    'change_1h_btc' => $item['change-1h-btc'],

                    'change_24h_usd'    => $item['change-24h-usd'],
                    'change_24h_btc'    => $item['change-24h-btc'],

                    'change_7d_usd' => $item['change-7d-usd'],
                    'change_7d_btc' => $item['change-7d-btc'],
                ]
            );


//             echo e($tr).'<br>';
        }

        return $data;


    }
}
