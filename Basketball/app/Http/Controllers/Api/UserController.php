<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ApiResponses;



    public function index(): JsonResponse
    {
        $users = UserResource::collection(User::all());
        return $this->ok('Users retrieved successfully', $users);
    }


    public function store(StoreUserRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = new UserResource(User::create($data));

        return $this->success('User created successfully.', $user, 201);
    }


    public function show(User $user): JsonResponse
    {
        return $this->ok('User retrieved successfully', new UserResource($user));
    }


    public function update(UpdateUserRequest $request, User $user):JsonResponse
    {
        $data = $request->validated();
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);

        return $this->ok('User updated successfully', new UserResource($user));
    }


    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return $this->ok('User deleted successfully');
    }
}
