<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OnlineSession
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\OnlineSessionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineSession query()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineSession whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OnlineSession extends Model
{
    use HasFactory;
}
