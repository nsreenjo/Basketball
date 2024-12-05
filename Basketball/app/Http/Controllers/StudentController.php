<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $users = User::all();

        return view('dashboard.students.index', compact('students', 'users'));
    }


    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
    
        $data = $request->validated();

        // Hash password if provided
      

      

        try {
            Student::create($data);

            return redirect()->route('dashboard.students.index')->with('success', 'student created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create the student. Please try again.');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id); 
        $user = $student->user;
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found');
        }
    
        return view('dashboard.students.show', compact('student','user'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        $users = User::all(); 
    
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found');
        }
    
        return view('dashboard.students.edit', compact('student', 'users'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, string $id)
    {
        $student = Student::find($id);
    
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found');
        }
    
        // Validate the incoming data
        $data = $request->validated();
    
        try {
            // Update the student record
            $student->update($data);
    
            return redirect()->route('students.index')->with('success', 'Student updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update the student. Please try again.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found');
        }

        try {
            $student->delete(); 
            return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete the student. Please try again.');
        }
    }
}
