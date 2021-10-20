<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class NFTController extends Controller
{
    public function createNFT(Request $request)
    {
        $nft = new \App\Models\Nft();
        $nft->title = $request->input('title');
        $nft->description = $request->input('description');
        $nft->price = $request->input('price');
        $nft->is_minted = false;
        $nft->image = "fake image";
        $nft->user_id = Auth::user()->id;   
        $nft->save();
    }
}