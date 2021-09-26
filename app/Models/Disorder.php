<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Disorder
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Therapist[] $therapists
 * @property-read int|null $therapists_count
 * @method static \Database\Factories\DisorderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Disorder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disorder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disorder query()
 * @method static \Illuminate\Database\Eloquent\Builder|Disorder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disorder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disorder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disorder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Disorder extends Model
{
    use HasFactory;
    protected $hidden = [];
    protected $guarded =[];
    public function therapists()
    {
        return $this->belongsToMany(Therapist::class);

    }
    
}
