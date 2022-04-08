<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;



class UserController extends Controller
{
    //
    function  login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password, $user->password)){
            return "Username or Password is not matched";
        }
        else{
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }

    function register(Request $req){
        // we are going to get the data from the registration form and store it in the database using 
        // instance of model

        $user = new User;
        $user->name=$req->name;
        $user->email=$req->email;
        
        // Hash to encrypt the data 
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect('/login');
    }
}
