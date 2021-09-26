<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Patient
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PatientFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient query()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Patient extends Model
{
    protected $guarded =[];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
}
