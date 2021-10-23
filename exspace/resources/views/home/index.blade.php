@extends('layouts/app')

<title>Expand your galaxy | Exspace</title>

@section('content')
    @include('components.nav')

    <header class="mx-6 my-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold py-6 md:py-10 lg:py-16">Expand your galaxy today</h1>
            <a class="p-2 cursor-pointer pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300" href="#nft-section">Check some NFT's</a>
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
                        <img class="object-center object-cover rounded-full h-36 w-36" src="{{$collection->image}}"
                             alt="photo">
                    </div>
                    <div class="text-center">
                        <p class="text-xl text-gray-700 font-bold mb-2">{{$collection->title}}</p>
                    </div>
                    <a href="/collection/{{$collection->title}}"class="p-2 cursor-pointer pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300">
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

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-6 m-6" id="nft-section">
            @foreach($nfts as $nft)
            <div class="w-full shadow-xl rounded-lg">
                <img class="h-40 w-full object-center object-cover rounded-t-lg" src="{{$nft->image}}" alt="photo">
                <div class="p-4">
                    <div class="mb-4">
                        <p class="font-bold">{{$nft->title}}</p>
                        <p>{{$nft->user_id}}</p>
                    </div>
                    <div class="grid grid-cols-2">
                        <p class="font-bold">€{{$nft->price}}</p>
                        <a class="text-right font-bold text-indigo-500" href="#">Place a bid</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

@endsection
