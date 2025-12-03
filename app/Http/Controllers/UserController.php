<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //register user
    public function register(Request $request){
        $incomingData = $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string"],
            "password" => ["required", "string", "min:3"]
        ]);
        $incomingData["password"] = bcrypt($incomingData["password"]);
        $user = User::create($incomingData);
        auth()->login($user);
        return redirect("/page1");
    }



    public function login(Request $request){
        $credentials = $request->validate([
            "loginName" => ["required", "string"],
            "loginPassword" => ["required", "string", "min:3"]
        ]);
        if(auth()->attempt([
            "name" => $credentials["loginName"],
            "password" => $credentials["loginPassword"]
            ])){
                $request->session()->regenerate();
                return redirect()->intended("/page1");
        }else{
            return redirect("/")->withErrors([
                "loginError" => "Invalid credentials"
                ]);
        }
    }

    public function page1(Request $request){
        $user = auth()->user();
        return view("page1", ["user" => $user]);
    }



    public function logout(Request $request){
        auth()->logout();
        return redirect("/");
    }
}