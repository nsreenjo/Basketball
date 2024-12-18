<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public function SessionStudent(){
        return $this->hasMany(SessionStudent::class);
    }

}

