@extends('layouts/app')

<title>Expand your galaxy | Exspace</title>

@section('content')
    @include('components.nav')

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
                <a class="p-2 cursor-pointer pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300">
                    View collection
                </a>
            </div>
        @endforeach
    </div>

@endsection
