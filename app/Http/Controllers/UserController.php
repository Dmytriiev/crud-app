<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UsersRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Http\Responses\MessageResponse;
use App\Models\User;

class UserController extends Controller
{
    public function index(UsersRequest $request): UserCollection
    {
        $users = User::paginate($request->perPage);

        return new UserCollection($users);
    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->getData());

        return new UserResource($user);
    }

    public function destroy(User $user): MessageResponse
    {
        $user->delete();

        return new MessageResponse('User deleted');
    }
}
