@extends('layouts.app')

<title> Exspace NFT | {{ $nft['title'] }} </title>

@section('content')
    @include('components.navLoggedOut')

    <header class="mx-6 mt-6 mb-3">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold py-6 md:py-10 lg:py-16">NFT | {{ $nft['title'] }}</h1>
        </div>
    </header>

    <div class="h-auto w-5/6 shadow-xl rounded-lg p-6 mx-auto sm:w-4/6 md:hidden">
        <p class="text-right font-medium">{{ $nft['user_id'] }}</p>
        <img class="h-50 w-full object-contain object-center rounded-t-lg rounded-lg" src="{{ $nft['image'] }}" alt="NFT {{ $nft['title'] }} image">
        <div class="flex flex-wrap justify-between mt-2">
            <p class="font-bold">€{{$nft['price']}}</p>
            <a class="text-right font-bold text-indigo-500" href="#">Place a bid</a>
        </div>
    </div>
    <div class="h-auto w-5/6 shadow-xl rounded-lg p-6 mx-auto sm:w-4/6 md:hidden">
        <h2 class="font-medium mb-2">Description</h2>
        <p>{{ $nft['description'] }}</p>
    </div>

    <div class="grid grid-cols-4 grid-rows-5 gap-2 h-auto w-5/6 mx-auto mb-12 hidden md:grid lg:grid">
        <div class="col-start-1 col-end-3 row-start-1 row-end-5 rounded-lg shadow-xl p-4 flex justify-around">
            <img class="h-50 max-w-lg w-full object-contain object-center rounded-t-lg rounded-lg" src="{{ $nft['image'] }}" alt="NFT {{ $nft['title'] }} image">
        </div>
        <div class="rounded-lg shadow-xl p-4 col-start-3 col-end-5 row-start-1 row-end-2 flex justify-between items-center">
            <p class="font-bold">{{ $nft['title'] }}</p>
            <p class="font-bold">{{ $nft['user_id'] }}</p>
        </div>
        <div class="rounded-lg shadow-xl p-4 col-start-3 col-end-5 row-start-2 row-end-4 flex flex-col justify-evenly">
            <h2 class="font-medium mb-2">Description</h2>
            <p>{{ $nft['description'] }}</p>
        </div>
        <div class="rounded-lg shadow-xl p-4 col-start-3 col-end-5 row-start-4 row-end-5 flex justify-between items-center">
            <p class="font-bold">€{{$nft['price']}}</p>
            <a class="text-right font-bold text-indigo-500" href="#">Place a bid</a>

            <form method="post" action="/nft/mint/{{ $nft->id }}">
                @csrf
                @method('PUT')
                <input type="submit" value="mint this NFT" class="text-right font-bold text-indigo-500">
            </form>

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
