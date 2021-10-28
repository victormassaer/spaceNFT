@extends('layouts/app')

@section('content')

    <header class="mx-6 my-8">
        <div class="flex flex-col justify-center items-center">
            <img class="w-32 h-32 rounded-full mb-3" src="{{ $collections->image }}"
                 alt="Profile picture of {{ $collections->title }}">
            <span class="font-bold text-xl">{{ $collections->title }}</span>
            <p>{{ $collections->description }}</p>
        </div>
    </header>

    <section class="mb-8">
        <div class="m-6">
            <h3 class="font-bold text-l md:text-xl lg:text-2xl">All items inside this collection</h3>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-6 m-6" id="nft-section">
            @foreach($collections->nfts as $nft)
                <div class="w-full shadow-xl rounded-lg">
                    <a href="/nft/{{ $nft->id }}">
                        <img class="h-40 w-full object-center object-cover rounded-t-lg" src="{{ $nft->image }}"
                             alt="NFT {{ $nft->title }} image">
                    </a>
                    <div class="p-4">
                        <div class="mb-4">
                            <p class="font-bold">{{ $nft->title }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="font-bold">€{{ $nft->price }}</p>
                            <a class="text-right font-bold text-indigo-500 hover:text-blue-400 transition-colors duration-700 transform"
                               href="#">Place a bid</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
