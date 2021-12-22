@extends('layouts/app')

<title>{{$user->name}} | Profile | Exspace</title>

@section('content')

    <header class="mx-6 my-8">
        <div class="flex flex-col justify-center items-center">
            <img class="w-32 h-32 rounded-full mb-3" src="{{ $user->image }}"
                 alt="Profile picture of {{ $user->name }}">
            <span class="font-bold text-xl">{{ $user->name }}</span>
            @if(Auth::id() == $user->id)
                <a class="text-blue-400 font-medium p-2"
                   href="/user/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endif
        </div>
    </header>

    <section class="mb-8">
        <div class="m-6">
            <h2 class="font-bold text-2xl md:text-3xl lg:text-4xl">My NFT's</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-6 m-6" id="nft-section">
            @foreach($user->nfts as $nft)
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
                            <a class="text-left font-bold text-indigo-500 hover:text-blue-400 transition-colors duration-700 transform"
                               href="/nft/{{ $nft->id }}">Checkout NFT</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
