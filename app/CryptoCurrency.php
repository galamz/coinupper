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
 */
class CryptoCurrency extends Model
{

    protected $fillable = [
        'name',
        'iso_code',
        'slug',
        'algorithm',
        'overview',
        'logo',
        'price',
        'market_cap',
        'volume_24h',
        'change_24h',
        'circulating',
        'mini_chart',
    ];
}
