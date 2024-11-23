<?php

namespace App\Http\Controllers;

use App\Models\SessionStudent;
use App\Http\Requests\StoreStudentSessionRequest;
use App\Http\Requests\UpdateSessionstudentRequest;
use App\Http\Resources\SessionStudentResource;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;

class SessionStudentController extends Controller
{
    use ApiResponses;

    /**
     * Display a listing of the session students.
     */
    public function index(): JsonResponse
    {
        // Load session students with their related data
        $sessionStudents = SessionStudentResource::collection(
            SessionStudent::with(['student', 'session'])->get()
        );

        return $this->ok('Session students retrieved successfully', $sessionStudents);
    }

    /**
     * Store a newly created session student in storage.
     */
    public function store(StoreStudentSessionRequest $request): JsonResponse
    {
        // Validate and create a new session student record
        $data = $request->validated();
        $sessionStudent = SessionStudent::create($data);

        return $this->success('Session student created successfully.', new SessionStudentResource($sessionStudent), 201);
    }

    /**
     * Display the specified session student.
     */
    public function show(SessionStudent $sessionStudent): JsonResponse
    {
        $sessionStudent->load(['student', 'session']);
        return $this->ok('Session student retrieved successfully.', new SessionStudentResource($sessionStudent));
    }

    /**
     * Update the specified session student in storage.
     */
    public function update(UpdateSessionStudentRequest $request, SessionStudent $sessionStudent): JsonResponse
    {
        $data = $request->validated(); // البيانات المرسلة صحيحة؟
    
        // تحديث السجل
        $sessionStudent->update($data);
    
        // استرجاع السجل المحدّث مع العلاقات
        $sessionStudent->load(['student.user', 'session.activity']);     
        return $this->ok('Session student updated successfully.', new SessionStudentResource($sessionStudent));
    }
    

    /**
     * Remove the specified session student from storage.
     */
    public function destroy(SessionStudent $sessionStudent): JsonResponse
    {
        $sessionStudent->delete();

        return $this->ok('Session student deleted successfully.');
    }
}
