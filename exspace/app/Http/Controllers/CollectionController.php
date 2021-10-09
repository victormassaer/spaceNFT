<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function getCollection()
    {
        $collections = \DB::table('collections')->get();
        return view('home/index', ['collections' => $collections]);
    }
}
