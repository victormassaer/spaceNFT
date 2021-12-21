<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use GuzzleHttp\Client;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

$user = Auth::user();
$id = Auth::id();

class ImageController extends Controller
{
    public function uploadImage($imageFile){

        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySW5mb3JtYXRpb24iOnsiaWQiOiIwMjMwOGUxNy03YWY4LTQwZDktYjZiNS0xYmExY2JlMWEyOTgiLCJlbWFpbCI6InZpY3Rvci5tYXNzYWVyQGdtYWlsLmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJwaW5fcG9saWN5Ijp7InJlZ2lvbnMiOlt7ImlkIjoiRlJBMSIsImRlc2lyZWRSZXBsaWNhdGlvbkNvdW50IjoxfV0sInZlcnNpb24iOjF9LCJtZmFfZW5hYmxlZCI6ZmFsc2V9LCJhdXRoZW50aWNhdGlvblR5cGUiOiJzY29wZWRLZXkiLCJzY29wZWRLZXlLZXkiOiJiMmM4M2I5YzMwYjlkNDQzZTBhMyIsInNjb3BlZEtleVNlY3JldCI6IjUxYTExOTlhYjRhZTA0MWVlMGYwYjU5NzJiZDM2ZjQxYjI3ZWM4NzA0MWE4NGQxNmY2ZWMzMDgyMzM5OGU1MDMiLCJpYXQiOjE2MzcwNjU4NTR9.-NdpYjFincQ8_PzDh5DaJknnC9-N8UjrLtfIzjRotss";
        $response = Http::withToken($token)->attach('attachement', file_get_contents($imageFile))->post('https://api.pinata.cloud/pinning/pinFileToIPFS', ['file' =>fopen($imageFile, "r")]);

        return $response->json('IpfsHash');

    }

    public function convertPrice($price){
        $response = Http::get('https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=EUR')->json();
        $eur = $response["EUR"];
        $p = $price * $eur;
        return $p;
        }

    public function updateUserImage($id, Request $request){
        $imageFile = $request->file("profile_image");
        $user = User::where('id', $id)->first();

        $imageHash = $this->uploadImage($imageFile);

        $user->name = $request->input("name");
        $user->email = $request->input('email');
        $user->image = "https://gateway.pinata.cloud/ipfs/" . $imageHash;
        $user->update();
        return redirect("/");
    }

    public function deleteUserImage($id){
        $user = user::findOrFail($id);

        if(Auth::id() !== $user->id){
            abort(403);
        }

        $user->image = '/images/astronaut_helmet.jpg';

        $user->save();
        return redirect()->back();
    }

    public function saveNFT(Request $request){
        $imageFile = $request->file("nft_image");

        $imageHash = $this->uploadImage($imageFile);
        $price = $this->convertPrice($request->input('price'));

        $nft = new Nft();
        $nft->title = $request->input('title');
        $nft->description = $request->input('description');
        $nft->price = $price;
        $nft->is_minted = false;
        $nft->image = "https://gateway.pinata.cloud/ipfs/" . $imageHash;
        $nft->user_id = Auth::user()->id;
        $nft->collection_id = $request->input('collection_id');
        $nft->tokenId = 1;
        $nft->is_for_sale = 1;
        $nft->save();
        return redirect()->back();
    }

    public function createCollection(Request $request)
    {
        $imageFile = $request->file("collection_image");

        $imageHash = $this->uploadImage($imageFile);

        $collection = new Collection();
        $collection->title = $request->input('title');
        $collection->description = $request->input('description');
        //$collection->image = $imageHash;
        $collection->image = "https://gateway.pinata.cloud/ipfs/" . $imageHash;
        $collection->category = $request->input('category');
        $collection->user_id = Auth::user()->id;
        $collection->save();
        return redirect('/collection');
    }
}
