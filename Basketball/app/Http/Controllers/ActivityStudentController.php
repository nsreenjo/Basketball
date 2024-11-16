<?php

namespace App\Http\Controllers;

use App\Models\ActivityStudent;
use Illuminate\Http\JsonResponse;

use App\Http\Requests\StoreActivityStudent;
use App\Http\Requests\UpdateActivityStudent;
use App\Http\Resources\ActivityStudentResource;
use App\Traits\ApiResponses;  // Import the ApiResponses trait

class ActivityStudentController extends Controller
{
    use ApiResponses;  // Use the ApiResponses trait

    /**
     * Display a listing of the resource.
     */
    public function index() :  JsonResponse
    {
        $activityStudents = ActivityStudent::with(['activity', 'student'])->get();
    
        // Using a resource collection to return a more structured response
        return $this->ok('Activity Students retrieved successfully', ActivityStudentResource::collection($activityStudents));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityStudent $request) : JsonResponse
    {
        $activityStudent = ActivityStudent::create($request->validated());
    
        // Return the created resource using the ApiResponses trait
        return $this->success('Activity Student created successfully.', new ActivityStudentResource($activityStudent), 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(ActivityStudent $activityStudent) : JsonResponse
    {
        return $this->ok('Activity Student retrieved successfully', new ActivityStudentResource($activityStudent));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityStudent $request, ActivityStudent $activityStudent) : JsonResponse
    {
        $activityStudent->update($request->validated());
    
        // Return the updated resource using the ApiResponses trait
        return $this->ok('Activity Student updated successfully', new ActivityStudentResource($activityStudent));
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityStudent $activityStudent) : JsonResponse
    {
        // Delete the ActivityStudent record
        $activityStudent->delete();

        // Return a success response
        return $this->ok('Activity Student deleted successfully');
    }
}
