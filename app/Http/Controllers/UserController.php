<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::get();
    }

    public function departments()
    {
        return Department::with('user')->get();
    }

    public function store(UserRequest $request)
    {
        $attributes = $request->validated();

        return User::create($attributes);
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return $user;
    }
}
