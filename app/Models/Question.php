<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $hidden = [];
<<<<<<< HEAD
=======
    protected $guarded =[];
>>>>>>> SurveyApi

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
