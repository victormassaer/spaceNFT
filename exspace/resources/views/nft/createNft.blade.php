@extends('layouts.app')

<title>create NFT | Exspace</title>

@section('content')

    <div class="w-screen h-screen flex justify-center items-center">
		<form class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md" method="post" action="{{url('/addNFT')}}" enctype="multipart/form-data">
        @csrf
			<p class="mb-5 text-3xl uppercase text-gray-600">create NFT</p>
			<input type="text" name="title" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"  placeholder="Title" required>
			<input type="text" name="description" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"  placeholder="Description" required>
            <input type="file" name="nft_image"
                   class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="on" id="NFT_upload_image">
            <input type="number" name="price" step="0.01" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" id="NFT_upload_price" placeholder="Price in ETH" required>
            <input type="text" name="collection_id" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="Collection_id" required>

            <button class="duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 font-bold p-2 rounded w-80" id="NFT_create_btn" type="submit" name="create"><span>add NFT</span></button>
		</form>
	</div>

@endsection
