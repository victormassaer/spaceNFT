<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function getData()
    {
        $collections = \DB::table('collections')->get();
        $nfts = \DB::table('nfts')->get();
        $users = \DB::table('users')->get();
        return view('home/index', ['collections' => $collections, 'nfts' => $nfts , 'users' => $users]);
    }
}
