<?php

namespace App\Http\Controllers;

use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
  public function login(){
      return view('login');
  }

  public function register(){
    return view('register');
  }

  public function store(Request $request){
    $user = new \App\Models\User();
    $user->name = $request->input('name');
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
          return view('/');
      } else{
          return view('/login');
      }
  }

    public function getSingleUser($id)
    {
    $user = User::all()->where('id', $id)->first();
    $nfts = Nft::all();
    $data = [
        'users' => $user,
        'nfts' => $nfts
    ];
    return view('user/details', $data);
  }
}
