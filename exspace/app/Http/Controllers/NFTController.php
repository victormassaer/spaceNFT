<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Nft;
use App\Models\Comment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Auth;

class NFTController extends Controller
{
    public function createNFT(Request $request)
    {
        $imageFile = $request->input("image");

        /*$response = http::withHeaders([
            'pinata_api_key' => '26f0951f9bda0d366c23',
            'pinata_secret_api_key' => 'd2b136a43a42f1124272c4c66bfdb48793d3e179db91abda2791ef5789d571bf'
          ])->post('https://api.pinata.cloud/pinning/pinFileToIPFS', [
              'form_params' =>[
                'file' => $imageFile
              ]
          ]);

          $imageHash = $response->IpfsHash();*/

        $nft = new Nft();
        $nft->title = $request->input('title');
        $nft->description = $request->input('description');
        $nft->price = $request->input('price');
        $nft->is_minted = false;
        //$nft->image = $imageHash;
        $nft->image = "/images/astronaut_helmet.jpg";
        $nft->user_id = Auth::user()->id;
        $nft->collection_id = $request->input('collection_id');
        $nft->save();
        return redirect("/");
    }


    public function show(Nft $nft){
        $data['nft'] = $nft;
        $victor['victor'] = "hallo";
        return view('nft/show', $data, $victor);
    }

    public function edit($id){
        $nft = Nft::findOrFail($id);
        return view('nft/edit')->withNft($nft);
    }

    public function update(Request $request, $id)
    {
        $nft = Nft::findOrFail($id);

        if(Auth::id() !== $nft->user_id){
            abort(403);
        }

        $nft->title = $request->input('title');
        $nft->description = $request->input('description');
        $nft->price = $request->input('price');
        $nft->collection_id = $request->input('collection_id');
//        $user->image = "/images/astronaut_helmet.jpg";
//        if ($request->hasFile('nft_image')) {
//            $destination = '/images/' . $user->image;
//            if (File::exists($destination)) {
//                File::delete($destination);
//            }
//            $file = $request->file('profile_image');
//            $extension = $file->getClientOriginalExtension();
//            $filename = time() . '.' . $extension;
//            $file->move('/images/', $filename);
//            $user->image = $filename;
//        }
        $nft->save();
        return redirect("/");
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $nft = Nft::where('id', $id)->first();
        $user_id = $nft->user_id;

        if(Auth::user()->cannot('delete', $nft)){
            abort(403);
        }

//        if(Auth::id() !== $user_id){
//            abort(403);
//        }

        $nft->delete();
        return redirect('/user/' . $user_id);
    }

    public function addTokenId(Request $request){
        $tokenId = $request->tokenId;
        $id =$request->NFTId;
        $nft = Nft::where('id', $id)->first();

        if(\Auth::user()->cannot('update', $nft)){
                return false;
            }

        $nft->tokenId = $tokenId;
        $nft->is_minted = true;
        $nft->save();
        return redirect("/");
    }

    /*public function saveComment(Request $request, $id){
        $userId = Auth::id();
        
        $comment = new Comment;
        $comment->text = $request->input("commentText");
        $comment->nft_id = $id;
        $comment->user_id = $userId;
        $comment->save();
        return redirect('/nft/' . $id);
    }*/

    
}
