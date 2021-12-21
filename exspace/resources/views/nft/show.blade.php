@extends('layouts.app')

<title> Exspace NFT | {{ $nft['title'] }} </title>

@section('content')

    <header class="mx-6 mt-6 mb-3">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold py-6 md:py-10 lg:py-16">NFT | {{ $nft->title }}</h1>
            <h2 class="text-2xl text-indigo-500 md:text-3xl lg:text-4xl font-bold">{{ \App\Models\User::all()->where('id', $nft->user_id)->first()->name }}</h2>
        </div>
    </header>

    <div class="h-auto w-5/6 shadow-xl rounded-lg p-6 mx-auto sm:w-4/6 md:hidden">
        <p class="text-right font-medium">{{ $nft->user_id }}</p>
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
            @if($nft->user_id == Auth::id())
                <div class="flex">
                    <a class="text-blue-400 font-medium p-2" href="/nft/{{ $nft->id }}/edit">Edit</a>
                    <form action="/nft/{{ $nft->id }}/delete" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" name="update_nft" class="text-red-500 font-medium p-2">Delete</button>
                    </form>
                </div>
            @endif
        </div>
        <div class="rounded-lg shadow-xl p-4 col-start-3 col-end-5 row-start-2 row-end-4 flex flex-col justify-evenly">
            <h2 class="font-medium mb-2">Description</h2>
            <p>{{ $nft->description }}</p>
        </div>
        <div
            class="rounded-lg shadow-xl p-4 col-start-3 col-end-5 row-start-4 row-end-5 flex justify-between items-center">
            <span>EUR</span>
            <p class="font-bold" id="nft_price">{{ $nft->price }}</p>

            @if($nft->user_id == Auth::id())
                @if($nft->is_for_sale == 0)
                    <form class="text-right" method="post" action="/nft/forSale/{{$nft->id}}">
                        @csrf
                        <input type="submit" id="forSale"
                               class="bg-white cursor-pointer font-bold text-indigo-500 hover:text-blue-400 transition-colors duration-700 transform"
                               value="Put up for sale">
                    </form>
                @else
                    <form class="text-right" method="post" action="/nft/withdrawSale/{{$nft->id}}">
                        @csrf
                        <input type="submit" id="withdrawSale"
                               class="bg-white cursor-pointer font-bold text-indigo-500 hover:text-blue-400 transition-colors duration-700 transform"
                               value="Withdraw from sale">
                    </form>
                @endif
            @elseif($nft->is_for_sale == 1)
                <form class="text-right">
                    @csrf
                    <input type="submit" id="buyNFT"
                           class="bg-white cursor-pointer font-bold text-indigo-500 hover:text-blue-400 transition-colors duration-700 transform"
                           value="Buy NFT">
                </form>
            @else
                <p>This NFT is currently not for sale</p>
            @endif



            @if($nft->user_id == Auth::id())
            <p class="hidden" id="dataAttribute" data-csrf="{{csrf_token()}}">test</p>
            <p class="hidden" id="dataAttribute2" data-nftId="{{$nft->id}}">test</p>
            <p class="hidden" id="dataAttribute3" data-tokenid="{{$nft->tokenId}}">test</p>
        <a href="#" id="mintBtn" class="text-right font-bold text-indigo-500">mint NFT</a>
            @endif

        </div>
        <div class="rounded-lg shadow-xl p-4 col-start-1 col-end-5 row-start-5 row-end-6 flex flex-col justify-evenly">

            <form action="/nft/comment/{{$nft->id}}" method="POST">
                @csrf
                <label for="commentInput">post your comment:</label>
                <input class="border-2 border-black rounded shadow-sm" type="text" id="commentInput" name="commentText">
                <input type="submit" id="commentSubmit" value="post comment">
            </form>

            <h2 class="font-medium mb-2">Comments</h2>
            <ul>
                @if (count($nft->comments) === 0)
                    <li>There are no comments for this nft.</li>
                @elseif (count($nft->comments) > 0)
                    @foreach($nft->comments as $c)
                        <li class="flex flex-row justify-between items-center">
                            <p>{{ \App\Models\User::all()->where('id', $c->user_id)->first()->name }}</p>
                            <p>{{ $c->text }}</p>
                            <p>{{ $c->created_at }}</p>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

@endsection
