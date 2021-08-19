<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    use HasFactory;
<<<<<<< HEAD
<<<<<<< HEAD
    public function disorders()
    {
        return $this->belongsToMany(Therapist::class, 'disorder_therapist');
=======
    public function disorder()
    {
        return $this->belongsToMany(Therapist::class);
>>>>>>> SurveyApi
=======
    public function disorders()
    {
        return $this->belongsToMany(Disorder::class);
>>>>>>> surveycontroller update
    }
}

