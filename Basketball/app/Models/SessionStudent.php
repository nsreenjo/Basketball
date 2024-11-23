<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionStudent extends Model
{
    use HasFactory;

    protected $guarded=[];


  
    public function student()
    {
        return $this->belongsTo(Student::class); // One student per session
    }

    public function session()
    {
        return $this->belongsTo(Session::class); // One session per record
    }

    public function activityStudents()
    {
        return $this->hasMany(ActivityStudent::class); // Multiple activities per session
    }


}
 



