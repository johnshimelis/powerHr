<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\AdminFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @mixin \Eloquent
 */
class Admin extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class);
    }
}
