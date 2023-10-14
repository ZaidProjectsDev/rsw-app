<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public static function getRole($id)
    {
        $user = User::findOrFail($id);
        $role = Role::findOrFail($user->role_id);
        return $role;
    }
}
