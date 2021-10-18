@extends('layouts/app')

<title>create NFT | Exspace</title>

@section('content')

    <div class="w-screen h-screen flex justify-center items-center bg-gray-100">
		<form class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md" method="post" action="{{url('/addNFT')}}">
			
        @csrf

			<p class="mb-5 text-3xl uppercase text-gray-600">create NFT</p>
			<input type="text" name="title" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"  placeholder="title" required>
			<input type="text" name="description" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"  placeholder="description" required>
            add image
            <input type="number" name="price" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="price" required>
			<button name="create" class="bg-purple-600 hover:bg-purple-900 text-white font-bold p-2 rounded w-80" id="create" type="submit" name="create"><span>add NFT</span></button>
		</form>
	</div>

@endsection
