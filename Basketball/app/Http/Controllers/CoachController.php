<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCoachRequest;
use App\Http\Requests\UpdateCoachRequest;
use App\Http\Resources\CoachResource;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coaches = Coach::with('user')->get();
        return response()->json(CoachResource::collection($coaches), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoachRequest $request)
    {
        $validated = $request->validated();

        // Ensure the user exists
        $user = User::findOrFail($validated['user_id']);

        // Create a new coach entry
        $coach = Coach::create([
            'user_id' => $validated['user_id'],
        ]);

        return response()->json([
            'message' => 'Coach created successfully.',
            'data' => new CoachResource($coach),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coach $coach)
    {
        $coach->load('user'); // Eager load the user relationship
        return response()->json(new CoachResource($coach), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoachRequest $request, Coach $coach)
    {
        $validated = $request->validated();

        if (isset($validated['user_id'])) {
            // Ensure the user exists
            $user = User::findOrFail($validated['user_id']);
            $coach->update(['user_id' => $validated['user_id']]);
        }

        return response()->json([
            'message' => 'Coach updated successfully.',
            'data' => new CoachResource($coach),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coach $coach)
    {
        $coach->delete();
        return response()->json([
            'message' => 'Coach deleted successfully.',
        ], 200);
    }
}
