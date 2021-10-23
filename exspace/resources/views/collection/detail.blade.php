@extends('layouts/app')

<title>Expand your galaxy | Exspace</title>

@section('content')
    @include('components.nav')  
   
    <section class="mb-8">
        <div class="m-6">
            <h2 class="font-bold text-2xl md:text-3xl lg:text-4xl">title</h2>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-6 m-6" id="nft-section">
            @foreach($nft as $nfts)
            <div class="w-full shadow-xl rounded-lg">
                <img class="h-40 w-full object-center object-cover rounded-t-lg" src="{{$nfts->image}}" alt="photo">
                <div class="p-4">
                    <div class="mb-4">
                        <p class="font-bold">{{$nfts->title}}</p>
                        <p>{{$nfts->user_id}}</p>
                    </div>
                    <div class="grid grid-cols-2">
                        <p class="font-bold">€{{$nfts->price}}</p>
                        <a class="text-right font-bold text-indigo-500" href="#">Place a bid</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

@endsection
