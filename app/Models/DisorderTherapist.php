<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DisorderTherapist
 *
 * @property int $disorder_id
 * @property int $therapist_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DisorderTherapistFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DisorderTherapist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisorderTherapist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisorderTherapist query()
 * @method static \Illuminate\Database\Eloquent\Builder|DisorderTherapist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisorderTherapist whereDisorderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisorderTherapist whereTherapistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisorderTherapist whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DisorderTherapist extends Model
{

    use HasFactory;
    protected $table = 'disorder_therapist';
}
