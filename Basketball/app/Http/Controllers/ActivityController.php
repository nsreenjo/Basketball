<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;

use App\Models\Activity;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    use ApiResponses;

    public function index()
    {
        $activity = ActivityResource::collection(Activity::all());
        return $this->ok('Activity retrieved successfully', $activity);
    }




    public function store(StoreActivityRequest $request): JsonResponse
    {
        $data = $request->validated();
        $activity = Activity::create($data);

        return $this->ok('Activity created successfully', new ActivityResource($activity));
    }



    public function show(Activity $activity):JsonResponse
    {
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
