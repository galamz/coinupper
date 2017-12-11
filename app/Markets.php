<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
class Markets extends Model
{
    protected $fillable = ['name','url'];
}
