<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\activityStudent;
use App\Models\Coach;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ActivityStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coaches =Coach::all();
        $activities = Activity::all();
        return view('dashboard.activity_student.index', compact('activities','coaches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($activity_id)
    {
        // جلب جميع الطلاب من قاعدة البيانات
        $students = Student::with('user')->get();



        // تمرير معرّف النشاط مع الطلاب إلى view
        return view('dashboard.activity_student.create', compact('students', 'activity_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'students' => 'required|array', // يجب أن تكون مصفوفة
            'students.*' => 'exists:students,id', // يجب أن يكون كل معرف للطالب موجودًا في قاعدة البيانات
        ]);

        // حلقة لتكرار الطلاب المُحددين
        foreach ($request->students as $student_id) {
            ActivityStudent::create([
                'activity_id' => $request->activity_id,
                'student_id' => $student_id,
                'enrollmentDate' => now(), // تاريخ التسجيل الحالي
                'enrollmentStatus' => 'Enrolled', // الحالة الافتراضية "مسجل"

                'completionDate' => now() , // إذا كان التسجيل مكتملًا، أضف تاريخ الإكمال

            ]);
        }

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('activity_students.index')->with('success', 'تمت إضافة الطلاب إلى النشاط بنجاح.');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the activity by its ID
        $activity = Activity::findOrFail($id);

        // Get all students related to the selected activity using the relationship
        $students = $activity->students;

        // Return the view with the students and activity
        return view('dashboard.activity_student.show', compact('students', 'activity'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
