<?php

namespace App\Versions\Admin\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Versions\Admin\Reporters\UserReporter;
use Illuminate\Http\Request;

class UserController
{
    public function index(UserReporter $reporter, Request $request)
    {
        $users = $reporter
            ->execute($request)
            ->paginate($request->get('limit', 15));

        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        return UserResource::make($user);
    }
}
