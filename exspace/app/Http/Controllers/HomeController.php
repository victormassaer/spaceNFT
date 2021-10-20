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
        $collections = Collection::all();
        $nfts = Nft::all();
        $users = User::all();
        return view('home/index', ['collections' => $collections, 'nfts' => $nfts, 'users' => $users]);
    }

}
