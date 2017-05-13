<?php

namespace App\Http\Controllers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

use App\User;
use Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        if ($user->save()) {
            return $user;
        }

        throw new HttpException(400, "Invalid data");
    }
}
