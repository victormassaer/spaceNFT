<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getData()
    {
        $collections = Collection::latest()->take(3)->get();
        $nfts = Nft::all();
        $users = User::all();
        $data = [
            'collections' => $collections,
            'nfts' => $nfts,
            'users' => $users
        ];
        return view('home/index', $data);
    }
}
