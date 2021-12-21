@extends('layouts/app')

<title>Edit Collection | Exspace</title>

@section('content')

    <div class="text-center m-6">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold m-6">Edit collection</h1>
        <form method="post" action="/collection/{{ $collection->id }}/update"
              class="shadow-xl flex flex-col w-full p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform bg-white rounded-lg lg:w-1/2 ">
            @method('PUT')
            @csrf
            <section class="flex flex-col w-full h-full p-1 overflow-auto">
                <label for="image" class="text-base text-xl font-bold leading-7 text-blueGray-500 mb-5">Choose an image for this collection</label>
                <header
                    class="flex flex-col items-center justify-center py-12 text-base text-blueGray-500 transition duration-500 ease-in-out transform bg-white border border-dashed rounded-lg focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                    <input class="cursor-pointer" name="image" type="file">
                </header>
            </section>
            <div class="mb-4">
                <label for="title" class="text-base leading-7 text-blueGray-500">Add title</label>
                <input type="text" id="title" name="title" placeholder="Title" value="{{ old('title') ?? $collection->title }}"
                       class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100">
            </div>
            <div class="mb-4">
                <label for="description" class="text-base leading-7 text-blueGray-500">Description</label>
                <input type="text" id="description" name="description" placeholder="Description" value="{{ old('description') ?? $collection->description }}"
                       class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100">
            </div>
{{--            <div class="mb-4">--}}
{{--                <label for="category" class="text-base leading-7 text-blueGray-500">Category</label>--}}
{{--                <input type="text" id="category" name="category" placeholder="Category" value="{{ old('category') ?? $collection->category }}"--}}
{{--                       class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100">--}}
{{--            </div>--}}
            <div class="flex items-center w-full pt-4 mb-4">
                <button id="create" type="submit" name="create"
                        class="w-full py-3 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg">
                    UPDATE
                </button>
            </div>
        </form>
    </div>

@endsection
