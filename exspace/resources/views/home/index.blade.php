@extends('layouts/app')

<title>Expand your galaxy | Exspace</title>

@section('content')
    <header class="mx-6 my-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold py-6 md:py-10 lg:py-16">Expand your galaxy today</h1>
            <a class="p-2 cursor-pointer pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300"
               href="#nft-section">Check some NFT's</a>
        </div>
    </header>

    <section class="mb-8">
        <div class="m-6">
            <h2 class="font-bold text-2xl md:text-3xl lg:text-4xl">Latest collections</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 m-6">
            @foreach($collections as $collection)
                <div class="w-full shadow-xl rounded-lg p-12 flex flex-col justify-center items-center">
                    <div class="mb-8">
                        <img class="object-center object-cover rounded-full h-36 w-36" src="{{ $collection->image }}"
                             alt="Collection {{ $collection->title }} image">
                    </div>
                    <div class="text-center">
                        <p class="text-xl text-gray-700 font-bold mb-2">{{ $collection->title }}</p>
                    </div>
                    <a href="/collection/{{ $collection->id }}" class="p-2 cursor-pointer pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300">
                        View collection
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mb-8">
        <div class="m-6">
            <h2 class="font-bold text-2xl md:text-3xl lg:text-4xl">Explore NFT's</h2>
        </div>
        <livewire:nft-search />
    </section>

@endsection
