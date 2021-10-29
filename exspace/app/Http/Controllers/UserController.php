<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

public function getProfileInfo($id){
    $user = User::all()->where('id', $id)->first();
    $data = ['user' => $user];
    return view('user/edit', $data);

}

    public function edit($id)
    {
        $user = User::findOrFail($id);
//        return view('user/edit', compact('user'));
        return view('user/edit')->withUser($user);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $user = User::findOrFail($id);

        if(\Auth::user()->cannot('update', $user)){
            abort(403);
        }

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $user->email = $request->input('email');
        $user->name = $request->input('name');
//        $user->image = "/images/astronaut_helmet.jpg";
        if($request->hasFile('profile_image'))
        {
            $destination = '/images/'.$user->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('/images/', $filename);
            $user->image = $filename;
        }

        $user->update();
        return redirect()->back();
    }

  public function updateSingleUser($id, Request $request){
    $user = User::where('id', $id)->first();

    if(\Auth::user()->cannot('update', $user)){
        abort(403);
    }

    $user->name = $request->input("name");
    $user->email = $request->input('email');
    $user->image = "/images/astronaut_helmet.jpg";
    $user->save();
}
}
