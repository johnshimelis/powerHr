<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disorder extends Model
{
    use HasFactory;
<<<<<<< HEAD
<<<<<<< HEAD
    public function therapists()
    {
        return $this->belongsToMany(Disorder::class, 'disorder_therapist');
=======
    public function therapist()
    {
        return $this->belongsToMany(Disorder::class);
>>>>>>> SurveyApi
=======
    public function therapists()
    {
        return $this->belongsToMany(Therapist::class);
>>>>>>> surveycontroller update
    }
}
