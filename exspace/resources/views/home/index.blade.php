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
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-6 m-6" id="nft-section">
            @foreach($users as $user)
                @foreach($user->nfts as $nft)
                    <div class="w-full shadow-xl rounded-lg">
                        <a href="/nft/{{ $nft->id }}">
                            <img class="h-40 w-full object-center object-cover rounded-t-lg" src="{{ $nft->image }}"
                                 alt="NFT {{ $nft->title }} image">
                        </a>
                        <div class="p-4">
                            <div class="mb-4">
                                <p class="font-bold">{{ $nft->title }}</p>
                                <a href="user/{{ $user->id }}">{{ $user->name }}</a>
                            </div>
                            <div class="grid grid-cols-2">
                                <p class="font-bold">ETH{{ $nft->price }}</p>
                                @if($nft->user_id == Auth::id())
                                    <form class="text-right" action="post">
                                        @csrf
                                        <input type="submit" id="forSale"
                                               class="bg-white cursor-pointer font-bold text-indigo-500 hover:text-blue-400 transition-colors duration-700 transform"
                                               value="Put up for sale">
                                    </form>
                                @else
                                    <form class="text-right" action="post">
                                        @csrf
                                        <input type="submit" id="buyNFT"
                                               class="bg-white cursor-pointer font-bold text-indigo-500 hover:text-blue-400 transition-colors duration-700 transform"
                                               value="Buy NFT">
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </section>

@endsection
