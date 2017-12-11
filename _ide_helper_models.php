<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Tabs
 *
 * @property int $id
 * @property int $id_crypto_currencie
 * @property string $name
 * @property string $text
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tabs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tabs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tabs whereIdCryptoCurrencie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tabs whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tabs whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tabs whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Tabs extends \Eloquent {}
}

namespace App{
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
	class CryptoCurrency extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Markets
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Markets whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Markets whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Markets whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Markets whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Markets whereUrl($value)
 * @mixin \Eloquent
 */
	class Markets extends \Eloquent {}
}

namespace App{
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
	class Data extends \Eloquent {}
}

namespace App{
/**
 * App\CustomValue
 *
 * @property int $id
 * @property int $id_crypto_currencie
 * @property string $name
 * @property string $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomValue whereIdCryptoCurrencie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomValue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomValue whereValue($value)
 * @mixin \Eloquent
 */
	class CustomValue extends \Eloquent {}
}

namespace App{
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
 */
	class MarketsExchange extends \Eloquent {}
}

