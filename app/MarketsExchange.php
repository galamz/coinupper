<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MarketsExchange
 *
 * @property int $id
 * @property int|null $id_crypto_currencie
 * @property string|null $url
 * @property string|null $from
 * @property string|null $to
 * @property float|null $volume_24h_usd
 * @property float|null $volume_24h_btc
 * @property float|null $volume_24h_native
 * @property float|null $price_24h_usd
 * @property float|null $price_24h_btc
 * @property float|null $price_24h_native
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange whereIdCryptoCurrencie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange wherePrice24hBtc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange wherePrice24hNative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange wherePrice24hUsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange whereVolume24hBtc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange whereVolume24hNative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange whereVolume24hUsd($value)
 * @mixin \Eloquent
 * @property int|null $id_market
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MarketsExchange whereIdMarket($value)
 */
class MarketsExchange extends Model
{
    protected $fillable = ['id_crypto_currencie','id_market','url','from','to'];
}
