<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $students = StudentResource::collection(Student::all());
        return $this->ok('Students retrieved successfully', $students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): JsonResponse
    {
        $data = $request->validated();

        $student = new StudentResource(Student::create($data));

        return $this->success('Student created successfully.', $student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): JsonResponse
    {
        return $this->ok('Student retrieved successfully', new StudentResource($student));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student): JsonResponse
    {
        $data = $request->validated();

        $student->update($data);

        return $this->ok('Student updated successfully', new StudentResource($student));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): JsonResponse
    {
        $student->delete();
        return $this->ok('Student deleted successfully');
    }
}
