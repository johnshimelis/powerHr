<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Therapist
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $title
 * @property int $gender
 * @property string $date_of_birth
 * @property string $profile_photo_path
 * @property string $cv_path
 * @property string $alma_mater
 * @property string $license_issue_date
 * @property string|null $bio
 * @property int $is_approved
 * @property string $work_hour_begin
 * @property string $work_hour_end
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Disorder[] $disorders
 * @property-read int|null $disorders_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TherapistFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereAlmaMater($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereCvPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereLicenseIssueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereWorkHourBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Therapist whereWorkHourEnd($value)
 * @mixin \Eloquent
 */
class Therapist extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function disorders()
    {
        return $this->belongsToMany(Disorder::class);
    }
    
}

