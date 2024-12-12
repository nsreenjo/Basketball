<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded;
    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function SessionStudent(){
        return $this->hasMany(SessionStudent::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_students', 'student_id', 'activity_id')
            ->withPivot('enrollmentDate', 'enrollmentStatus', 'completionDate');
    }


}
