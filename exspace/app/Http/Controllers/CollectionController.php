<?php

namespace App\Http\Controllers;

use App\Models\Nft;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

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
        return view('collection/details', $data);
    }

    public function getCollections()
    {
        $collections = Collection::all();
        $nfts = Nft::all();
        $data = [
            'collections' => $collections,
            'nfts' => $nfts
        ];
        return view('collection/index', $data);
    }

    public function createCollection(Request $request)
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

        $collection = new Collection();
        $collection->title = $request->input('title');
        $collection->description = $request->input('description');
        //$collection->image = $imageHash;
        $collection->image = "/images/astronaut_helmet.jpg";
        $collection->category = $request->input('category');
        $collection->user_id = Auth::user()->id;
        $collection->save();
        return redirect('/');
    }

    public function edit($id) {
        $collection = Collection::findOrFail($id);

        return view('/collection/edit')->withCollection($collection);
    }

    public function update(Request $request, $id)
    {
        $collection = Collection::findOrFail($id);

        if(Auth::id() !== $collection->user_id){
            abort(403);
        }

        $collection->title = $request->input('title');
        $collection->description = $request->input('description');
        $collection->category = $request->input('category');
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
        $collection->save();
    }

    public function destroy($id)
    {
        $collection = Collection::findOrFail($id);
        $user_id = $collection->user_id;
        if(Auth::id() !== $user_id){
            abort(403);
        }

        $collection->delete();
        return redirect()->route('user/'.$user_id);
    }

    public function getCollectionByUserId()
    {
        $collections = Collection::all();
        $nfts = Nft::all()->where('user_id', Auth::user()->id);
        $data = [
            'collections' => $collections,
            'nfts' => $nfts
        ];
        return view('collection/createCollection', $data);
    }

}
