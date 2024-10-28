<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    function index() {
        $accounts = User::where("is_deleted", "0")->orderBy("id", "desc")->get();
        return response()->json([
            "status" => true,
            "message" => "All Accounts.",
            "data" => $accounts,
        ]);
    }

    function create(Request $req) {
        $validator = Validator::make($req->all(), [
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors()
            ]);
        }

        $user = User::create([
            "email" => $req->email,
            "password" => $req->password,
            "otp" => "",
        ]);

        return response()->json([
            "status" => true,
            "message" => "User successfully Created.",
            "user" => $user,
        ]);
    }

    function update(Request $req, $id) {
        $validator = Validator::make($req->all(), [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors()
            ]);
        }

        $user = User::find($id);

        $user->email = $req->email;
        if ($req->password) {
            $user->password = $req->password;            
        }

        $user->save();

        return response()->json([
            "status" => true,
            "message" => "User successfully Updated.",
            "user" => $user,
        ]);
    }

    function destroy($id) {
        
        $user = User::find($id);

        $user->is_deleted = "1";

        $user->save();

        return response()->json([
            "status" => true,
            "message" => "User successfully deleted.",
            "user" => $user,
        ]);
    }


    function check() {
        return Auth::check();
    }

    function login(Request $req) {
        $validator = Validator::make($req->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors()
            ]);
        }

        $user = User::where('email', $req->email)
                ->where('is_deleted', 0) // Check if the user is not deleted
                ->first();

        if ($user && Auth::attempt(["email" => $req->email, "password" => $req->password])) {
            return response()->json([
                "status" => true,
                "message" => "Logged in successfully",
                "token" => Auth::user()->createToken("API Token")->plainTextToken,
                "token_type" => "Bearer",
            ]);

        } else {
            return response()->json([
                "status" => false,
                "message" => "Invalid Email or Password",
            ]);
        }
    }


    function logout() {
        // Revoke all tokens for the authenticated user
        Auth::user()->tokens()->delete();

        return response()->json([
            "status" => true,
            "message" => "Logged out successfully",
        ]);
    }
}
