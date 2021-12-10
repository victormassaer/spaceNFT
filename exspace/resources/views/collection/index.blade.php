@extends('layouts/app')

@section('content')

    <section class="mb-8">
        <div class="m-6">
            <h2 class="font-bold text-2xl md:text-3xl lg:text-4xl">Explore all collections</h2>
        </div>

        <select class="m-6 py-2 px-4 pr-8 rounded border filter-value">
            @foreach($categories as $category)
                <option value="{{ $category->category }}">{{ $category->category }}</option>
            @endforeach
        </select>
        <button
            class="duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 font-bold px-6 py-2 rounded category-filter" onclick="filter()">
            <span>Filter</span></button>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 m-6">
            @foreach($collections as $collection)
                <div class="w-full shadow-xl rounded-lg p-12 flex flex-col justify-center items-center collection">
                    <div class="mb-8">
                        <img class="object-center object-cover rounded-full h-36 w-36" src="{{ $collection->image }}"
                             alt="Collection {{ $collection->title }} image">
                    </div>
                    <div class="text-center mb-2">
                        <p class="text-xl text-gray-700 font-bold">{{ $collection->title }}</p>
                        <span class="text-sm">Category: </span><span
                            class="text-sm category">{{ \App\Models\Category::all()->where('id', $collection->category_id)->first()->category }}</span>
                    </div>
                    <a href="/collection/{{ $collection->id }}"
                       class="p-2 cursor-pointer pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300">
                        View collection
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    <script>
        function filter() {
            let category = document.querySelector(".category").innerHTML;
            let value = document.querySelector(".filter-value").value;
            let collection = document.querySelectorAll(".collection");


        }
    </script>

@endsection
