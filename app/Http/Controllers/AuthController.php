<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $email = $req->email;
        $password = $req->password;

        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                "status" => false,
                "message" => "Email or password you entered is incorrect!"
            ]);
        } else {
            $user = Auth::user();
            session([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role_id' => $user->role_id,
                'logged_in' => true
            ]);
            return response()->json([
                "status" => true,
                "message" => "Login successfully!",
                "user" => $user
            ]);
        }
    }

    public function register(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');

        $name = $req->name;
        $email = $req->email;
        $password = $req->password;

        $user = User::create([
            'name' => $name,
            'email' =>  $email,
            'password' => Hash::make($password),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if ($user) {
            return response()->json([
                "status" => true,
                "message" => "Register successfully!",
                "user" => $user
            ]);
        } else {
            return response()->json([
                "status" => true,
                "message" => "Register failed!",
                "user" => $user
            ]);
        }
    }
}
