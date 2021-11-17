<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ImageController extends Controller
{
    public function uploadImage($imageFile){
  
        $response = http::withHeaders([
          'pinata_api_key' => '26f0951f9bda0d366c23',
          'pinata_secret_api_key' => 'd2b136a43a42f1124272c4c66bfdb48793d3e179db91abda2791ef5789d571bf'
        ])->post('https://api.pinata.cloud/pinning/pinFileToIPFS', [
            'form_params' =>[
              'file' => $imageFile
            ]
        ]);
  
        $imageHash = $response->IpfsHash();
        return $imageHash;

    }

    public function updateUserImage($id, Request $request){
        $imageFile = $request->input("image");
        $user = User::where('id', $id);

        $imageHash = $this->uploadImage($imageFile);

        $user->image = "https://gateway.pinata.cloud/ipfs/" . $imageHash;
        $user->save();
    }

    public function saveNFTImage(){
        
    }
}
