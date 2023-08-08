<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(){

        return view("front.surveys.index");
    }

    public function submitUserInfo(Request $request){
        $request->validate([
            "type"=>"required|in:student,tutor",
            "name"=>"required",
            "email"=>"required|email",
        ]);

        $user=User::updateOrCreate([
            "email"=>$request->email
        ],[
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt("test1234"),
        ]);

        $user->assignRole($request->type);

        return response([
            "message"=>"Submitted successfully",
            "data"=>[
                "user"=>$user,
            ]
        ],200);

    }
}
