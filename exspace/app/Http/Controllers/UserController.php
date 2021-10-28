<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
    $data = [
        'user' => $user,
        'nfts' => $nfts
    ];
    return view('user/details', $data);
  }

  public function getProfileInfo($id) {
      $user = User::all()->where('id', $id)->first();
      $data = ['user' => $user];
      return view('user/profile', $data);
  }

  public function updateSingleUser($id, Request $request){
      $user = User::where('id', $id)->first();
        
      if(\Auth::user()->cannot('update', $user)){
        abort(403);
    }
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->image = " ";
    $user->save();
    return redirect("/");
  }

  /*public function uploadImage($id ,Request $request){
      $imageFile = $request->input("image");
      $user = User::where('id', $id);

      $response = http::withHeaders([
        'pinata_api_key' => '26f0951f9bda0d366c23',
        'pinata_secret_api_key' => 'd2b136a43a42f1124272c4c66bfdb48793d3e179db91abda2791ef5789d571bf'
      ])->post('https://api.pinata.cloud/pinning/pinFileToIPFS', [
          'form_params' =>[
            'file' => $imageFile
          ]
      ]);

      $imageHash = $response->IpfsHash();

      $user->image = 'https://gateway.pinata.cloud/ipfs/' . $imageHash;
      $user->save();
  }*/
}
