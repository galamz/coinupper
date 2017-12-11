<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
class CustomValue extends Model
{
    protected $fillable = ['id_crypto_currencie','name','value'];
}
