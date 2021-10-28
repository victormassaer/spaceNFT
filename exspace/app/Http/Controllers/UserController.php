<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$id = Auth::id();

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $user = new \App\Models\User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            return view('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getSingleUser($id)
    {
    $user = User::all()->where('id', $id)->first();
    $nfts = Nft::all();
    $collections = Collection::all();
    $data = [
        'user' => $user,
        'nfts' => $nfts,
        'collections' => $collections
    ];
    return view('user/details', $data);
  }

  public function getProfileInfo($id) {
      $user = User::all()->where('id', $id)->first();
      $data = ['user' => $user];
      return view('user/profile', $data);
  }
}
