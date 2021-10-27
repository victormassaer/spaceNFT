@extends('layouts/app')

<title>{{$user->name}} | Profile | Exspace</title>

@section('content')

    <header class="mx-6 my-8">
        <div class="flex flex-col justify-center items-center">
            <img class="w-32 h-32 rounded-full mb-3" src="{{$user->image}}" alt="">
            <span class="font-bold text-xl">{{$user->name}}</span>
            <a class="text-blue-400 font-medium border-lg shadow-xl p-2 rounded-lg" href="/user/profile/{{$user->id}}">Edit Profile</a>
        </div>
    </header>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-6 m-6" id="nft-section">
        @foreach($user->nfts as $nft)
            <div class="w-full shadow-xl rounded-lg">
                <img class="h-40 w-full object-center object-cover rounded-t-lg" src="{{$nft->image}}" alt="photo">
                <div class="p-4">
                    <div class="mb-4">
                        <p class="font-bold">{{$nft->title}}</p>
                    </div>
                    <div class="grid grid-cols-2">
                        <p class="font-bold">€{{$nft->price}}</p>
                        <a class="text-right font-bold text-indigo-500 hover:text-blue-400 transition-colors duration-700 transform" href="#">Place a bid</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
