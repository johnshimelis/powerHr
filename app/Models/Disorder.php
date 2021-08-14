<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disorder extends Model
{
    use HasFactory;
    public function therapist()
    {
        return $this->belongsToMany(Disorder::class);
    }
}
