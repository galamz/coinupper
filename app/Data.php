<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Data
 *
 * @property int $id
 * @property int|null $id_crypto_currencie
 * @property float|null $price_btc
 * @property float|null $price_usd
 * @property float|null $volume_usd
 * @property float|null $market_cap_by_available_supply
 * @property string $time
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereIdCryptoCurrencie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereMarketCapByAvailableSupply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data wherePriceBtc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data wherePriceUsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereVolumeUsd($value)
 * @mixin \Eloquent
 */
class Data extends Model
{
    protected $fillable = ['id_crypto_currencie','price_btc','price_usd','volume_usd','market_cap_by_available_supply','time'];
}
