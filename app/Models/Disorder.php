<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disorder extends Model
{
    use HasFactory;
    public function therapists()
    {
        return $this->belongsToMany(Disorder::class, 'disorder_therapist');
    }
    
}
