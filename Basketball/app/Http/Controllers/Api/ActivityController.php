<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use App\Models\Session;
use App\Traits\ApiResponses;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class ActivityController extends Controller
{
    use ApiResponses;

    public function index() :JsonResponse
    {
        $activity = ActivityResource::collection(Activity::with('sessions')->get());
        return $this->ok('Activity retrieved successfully', $activity);
    }


    public function store(StoreActivityRequest $request): JsonResponse
    {
        // Validate the incoming request and extract validated data
        $data = $request->validated();

        // Create a new activity record
        $activity = Activity::create($data);

        // Get the start and end dates as Carbon instances
        $startDate = Carbon::parse($activity->startDate);
        $endDate = Carbon::parse($activity->endDate);

        // Define the days you want to create sessions (Sunday, Tuesday, Thursday)
        $targetDays = ['Sunday', 'Tuesday', 'Thursday'];


        if ($activity->type == "course") {
            while ($startDate->lte($endDate)) {
                // Check if the current day is one of the target days


                if (in_array($startDate->format('l'), $targetDays)) {
                    // Create a session for this day
                    Session::create([
                        'activity_id' => $activity->id,
                        'sessionDate' => $startDate->toDateString(), // Store as a date (Y-m-d)
                        'sessionStartTime' => '08:00:00', // Set a default start time
                        'sessionEndTime' => '09:00:00', // Set a default end time
                        'status' => 'Present', // Default status
                    ]);
                }


                // Move to the next day
                $startDate->addDay();
            }
        }

        // Return the activity created along with the sessions
        return $this->success('Activity and sessions created successfully.', new ActivityResource($activity), 201);
    }


    public function show(Activity $activity)
    {
        $activity->load('sessions');
        return $this->ok('Activity retrieved successfully', new ActivityResource($activity));
    }



    public function update(UpdateActivityRequest $request, Activity $activity): JsonResponse
    {
        $data = $request->validated();
        $activity->update($data);

        return $this->ok('Activity updated successfully', new ActivityResource($activity));
    }


    public function destroy(Activity $activity): JsonResponse
    {
        $activity->delete();

        return $this->ok('Activity deleted successfully');
    }

}
