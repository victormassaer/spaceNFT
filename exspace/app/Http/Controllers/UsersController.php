<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CollectionController extends Controller
{
  public function login(){
      return view('register');
  }

  public function register(){
    return view('login');
  }

  public function store(Request $request){
    $user = new \App\Models\User();
    $user->fistname = $request->input('firstname');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
  }
}
