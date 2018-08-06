<?php

namespace BatataSender\Http\Controllers;

use Illuminate\Http\Request;
use BatataSender\User;
use BatataSender\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \BatataSender\User
     */
    protected function create(Request $request)
    {

        $user = User::createUser($request->all());

        if($user) {
            return response()->json([
                'message' => 'success',
                'administrateur' => $user
            ], 201);
        }
        
        return response()->json([
                'message' => 'Error',
            ], 500);

    }
}
