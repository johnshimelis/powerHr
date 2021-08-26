<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
