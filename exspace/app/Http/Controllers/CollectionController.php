<?php

namespace App\Http\Controllers;

use App\Models\Nft;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function getSingleCollection($id)
    {
        $collections = Collection::all()->where('id', $id)->first();
        $nfts = Nft::all();
        $data = [
            'collections' => $collections,
            'nfts' => $nfts
        ];
        return view('collection/index', $data);
    }
}
