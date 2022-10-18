<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(15);
        return UserResource::collection($user);
        // return view('admin.pages.User.user', compact('user'));
    }
}
