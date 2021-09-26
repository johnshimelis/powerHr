<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    public $primaryKey = 'emp_id';
    public $timestamps = true;
    public $appends = ['sunday','monday','tuesday','wednesday','thursday','friday','saturday','salon'];

    public function getSundayAttribute()
    {
        return json_decode($this->sun, true);
    }
    public function getMondayAttribute()
    {
        return json_decode($this->mon, true);
    }
    public function getTuesdayAttribute()
    {
        return json_decode($this->tue, true);
    }
    public function getWednesdayAttribute()
    {
        return json_decode($this->wed, true);
    }
    public function getThursdayAttribute()
    {
        return json_decode($this->thu, true);
    }
    public function getFridayAttribute()
    {
        return json_decode($this->fri, true);
    }
    public function getSaturdayAttribute()
    {
        return json_decode($this->sat, true);
    }

    public function getSalonAttribute()
    {
        $salon = Salon::find($this->attributes['salon_id']);
        return $salon;
    }

    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class,'booking_id','id');
    }
}
