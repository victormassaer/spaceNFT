@extends('layouts.app')

<title>edit NFT | Exspace</title>

@section('content')

    <div class="w-screen h-screen flex justify-center items-center">
        <form class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md" method="post" action="/nft/{{ $nft->id }}/update">
            @method('PUT')
            @csrf
            <p class="mb-5 text-3xl uppercase text-gray-600">edit NFT</p>
            <input type="text" name="title" value="{{ old('title') ?? $nft->title }}" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="title">
            <input type="text" name="description" value="{{ old('description') ?? $nft->description }}" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="description">
            <input type="file" name="nft_image" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none">
            <input type="number" name="price" value="{{ old('price') ?? $nft->price }}" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="price">
            <input type="text" name="collection_id" value="{{ old('price') ?? $nft->collection_id }}" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="collection_id">
            <button class="duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 font-bold p-2 rounded w-80" id="create" type="submit" name="edit"><span>UPDATE</span></button>
        </form>
    </div>

@endsection
