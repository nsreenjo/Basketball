<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Http\Resources\SessionResource;
use App\Models\Session;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;

class SessionController extends Controller
{
    use ApiResponses;

    public function index(): JsonResponse
    {
        $sessions = SessionResource::collection(Session::all());
        return $this->ok('Sessions retrieved successfully', $sessions);
    }


    public function store(StoreSessionRequest $request): JsonResponse
    {

        $data = $request->validated();


        $session = Session::create($data);


        return $this->success('Session created successfully.', new SessionResource($session), 201);
    }


    public function show(Session $session): JsonResponse
    {
        // Return the requested session as a resource
        return $this->ok('Session retrieved successfully', new SessionResource($session));
    }


    public function update(UpdateSessionRequest $request, Session $session): JsonResponse
    {
        $data = $request->validated();

        $session->update($data);
        return $this->ok('Session updated successfully', new SessionResource($session));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session): JsonResponse
    {
        // Soft delete the session record
        $session->delete();

        return $this->ok('Session deleted successfully');
    }
}
