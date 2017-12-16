<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CryptoCurrency
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $name
 * @property string|null $iso_code
 * @property string|null $slug
 * @property string|null $algorithm
 * @property string|null $overview
 * @property string|null $logo
 * @property float|null $price
 * @property float|null $market_cap
 * @property float|null $volume_24h
 * @property float|null $circulating
 * @property string|null $mini_chart
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereAlgorithm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereCirculating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereIsoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereMarketCap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereMiniChart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereVolume24h($value)
 * @property string|null $full_name
 * @property string|null $symbol
 * @property float|null $price_usd
 * @property float|null $price_btc
 * @property float|null $market_cap_usd
 * @property float|null $market_cap_btc
 * @property float|null $volume_24h_usd
 * @property float|null $volume_24h_btc
 * @property float|null $change_7d_usd
 * @property float|null $change_7d_btc
 * @property float|null $change_24h_usd
 * @property float|null $change_24h_btc
 * @property float|null $change_1h_usd
 * @property float|null $change_1h_btc
 * @property float|null $max_circulating
 * @property string|null $circulating_url
 * @property string|null $url
 * @property string|null $url_data
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereChange1hBtc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereChange1hUsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereChange24hBtc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereChange24hUsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereChange7dBtc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereChange7dUsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereCirculatingUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereMarketCapBtc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereMarketCapUsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereMaxCirculating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency wherePriceBtc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency wherePriceUsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereUrlData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereVolume24hBtc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereVolume24hUsd($value)
 * @property string|null $social
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CustomValue[] $info
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CryptoCurrency whereSocial($value)
 */
class CryptoCurrency extends Model
{

    /*
     *                    'name'              => $item->name,
                    'full_name'         => self::nameCurrency($item->name),
                    'symbol'            => self::symbolCurrency($item->symbol),
                    'slug'              => str_slug(self::nameCurrency($item->name)),
                    'rank'              => $item->rank,

                    'price_usd'         => self::price_usd($item->price_usd),
                    'price_btc'         => self::price_btc($item->price_btc),

                    'market_cap_usd'    => self::market_cap_usd($item->market_cap_usd),

                    'volume_24h_usd'    => self::volume_usd($item->{'24h_volume_usd'}),

                    'available_supply'  => $item->{'available_supply'},
                    'total_supply'      => $item->{'total_supply'},
                    'max_supply'        => $item->{'max_supply'},
                    'percent_change_1h'        => $item->{'percent_change_1h'},
                    'percent_change_24h'        => $item->{'percent_change_24h'},
                    'percent_change_7d'        => $item->{'percent_change_7d'},
                    'last_updated'        => $item->{'percent_change_7d'},
    */

    protected $fillable = [
        'name',
        'full_name',
        'symbol',
        'rank',
        'slug',
        'algorithm',
        'overview',
        'logo',

        'price_usd',
        'price_btc',

        'market_cap_usd',

        'volume_24h_usd',

        'available_supply',

        'max_supply',

        'percent_change_1h',
        'percent_change_24h',
        'percent_change_7d',
        'last_updated',

        'url',
        'url_data'
    ];

    public function info(){
        return $this->hasMany(CustomValue::class,'id_crypto_currencie','id');
    }
}
