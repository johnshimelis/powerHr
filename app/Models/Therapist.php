<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    use HasFactory;
    public function disorders()
    {
        return $this->belongsToMany(Therapist::class, 'disorder_therapist');
    }
}

