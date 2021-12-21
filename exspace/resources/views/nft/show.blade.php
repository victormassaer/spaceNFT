@extends('layouts.app')

<title> Exspace NFT | {{ $nft['title'] }} </title>

@section('content')

    <header class="mx-6 mt-6 mb-3">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold py-6 md:py-10 lg:py-16">NFT | {{ $nft->title }}</h1>
        </div>
    </header>

    <div class="h-auto w-5/6 shadow-xl rounded-lg p-6 mx-auto sm:w-4/6 md:hidden">
        <p class="text-right font-medium">{{ $nft->user_id }}</p>
        {{$victor}}
        <img class="h-auto w-full object-contain object-center rounded-t-lg rounded-lg" src="{{ $nft->image }}"
             alt="NFT {{ $nft->title }} image">
        <div class="flex flex-wrap justify-between mt-2">
            <span>€</span>
            <p class="font-bold" id="nft_price">{{ $nft->price }}</p>
            <a class="text-right font-bold text-indigo-500" href="#">Place a bid</a>
        </div>
    </div>
    <div class="h-auto w-5/6 shadow-xl rounded-lg p-6 mx-auto sm:w-4/6 md:hidden">
        <h2 class="font-medium mb-2">Description</h2>
        <p>{{ $nft->description }}</p>
    </div>

    <div class="grid grid-cols-4 grid-rows-5 gap-2 h-auto w-5/6 mx-auto mb-12 hidden md:grid lg:grid">
        <div class="col-start-1 col-end-3 row-start-1 row-end-5 rounded-lg shadow-xl p-4 flex justify-around">
            <img class="h-50 max-w-lg w-full object-contain object-center rounded-t-lg rounded-lg" id="nft_image"
                 src="{{ $nft->image }}" alt="NFT {{ $nft->title }} image">
        </div>
        <div
            class="rounded-lg shadow-xl p-4 col-start-3 col-end-5 row-start-1 row-end-2 flex justify-between items-center">
            <p class="font-bold">{{ $nft->title }}</p>
            <div class="flex">
                <a class="text-blue-400 font-medium p-2" href="/nft/{{ $nft->id }}/edit">Edit</a>
                <form action="/nft/{{ $nft->id }}/delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" name="update_nft" class="text-red-500 font-medium p-2">Delete</button>
                </form>
            </div>
        </div>
        <div class="rounded-lg shadow-xl p-4 col-start-3 col-end-5 row-start-2 row-end-4 flex flex-col justify-evenly">
            <h2 class="font-medium mb-2">Description</h2>
            <p>{{ $nft->description }}</p>
        </div>
        <div
            class="rounded-lg shadow-xl p-4 col-start-3 col-end-5 row-start-4 row-end-5 flex justify-between items-center">
            <span>ETH</span>
            <p class="font-bold">{{ $nft->price }}</p>
        
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


            <p class="hidden" id="dataAttribute" data-csrf="{{csrf_token()}}">test</p>
            <p class="hidden" id="dataAttribute2" data-nftId="{{$nft->id}}">test</p>
            <p class="hidden" id="dataAttribute3" data-tokenid="{{$nft->tokenId}}">test</p>
        <a href="#" id="mintBtn" class="text-right font-bold text-indigo-500">mint NFT</a>

        </div>
        <div class="rounded-lg shadow-xl p-4 col-start-1 col-end-5 row-start-5 row-end-6 flex flex-col justify-evenly">
            <h2 class="font-medium mb-2">Comments</h2>
            <ul>
                @if (count($nft->comments) === 0)
                    <li>There are no comments for this nft.</li>
                @elseif (count($nft->comments) > 0)
                    @foreach($nft->comments as $c)
                        <li class="flex flex-row justify-between items-center">
                            <p>{{ $c->user_id }}</p>
                            <p>{{ $c->text }}</p>
                            <p>{{ $c->created_at }}</p>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

@endsection
