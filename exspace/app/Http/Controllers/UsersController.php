<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
  public function login(){
      return view('login');
  }

  public function register(){
    return view('register');
  }

  public function store(Request $request){
    $user = new \App\Models\User();
    $user->name = $request->input('firstname');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->save();
  }

  public function handleLogin(Request $request){
      $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)){
          echo "login succesfull";
      } else{
        echo "login failed";
      }
  }
}
