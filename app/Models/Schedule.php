<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Schedule
 *
 * @property int $id
 * @property string $date
 * @property string $time
 * @property string $type
 * @property int $patient_id
 * @property int $therapist_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ScheduleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereTherapistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Schedule extends Model
{
    use HasFactory;

    public function therapists()
    {
        return ;
    }

    public function patients()
    {
        return ;
    }


}
