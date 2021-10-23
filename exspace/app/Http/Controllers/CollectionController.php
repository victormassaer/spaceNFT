<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    public function getCollections(Request $request)
    {
        $collections = \DB::table('collections')->get();
        return view('collection/index', ['collections' => $collections]);
    }

    public function getCollectionNFT($title)
    {
        $nft = \DB::table('nfts')->where('collection', $title)->get();
        $data['nft'] = $nft;
        return view('collection/detail', $data); 
    }

}