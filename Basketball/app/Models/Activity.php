<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ActivityStudent(){
        return $this->hasMany(ActivityStudent::class);
    }
    public function session(){
        return $this->hasMany(Session::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function coach(){
        return $this->belongsTo(Coach::class);
    }

}
