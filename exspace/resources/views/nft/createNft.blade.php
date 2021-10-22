@extends('layouts.app')

<title>create NFT | Exspace</title>

@include('components.navLoggedOut')

@section('content')

    <div class="w-screen h-screen flex justify-center items-center">
		<form class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md" method="post" action="{{url('/addNFT')}}">

        @csrf

			<p class="mb-5 text-3xl uppercase text-gray-600">create NFT</p>
			<input type="text" name="title" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"  placeholder="title" required>
			<input type="text" name="description" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"  placeholder="description" required>
            add image
            <input type="number" name="price" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="price" required>
			<button name="create" class="duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 font-bold p-2 rounded w-80" id="create" type="submit" name="create"><span>add NFT</span></button>
		</form>
	</div>

@endsection
