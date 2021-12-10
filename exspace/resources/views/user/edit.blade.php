@extends('layouts/app')

<title>{{ $user->name }} | Profile | Exspace</title>

@section('content')

    <header class="mx-6 mt-2 mb-5">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold py-6 md:py-10 lg:py-16">Hey {{ $user->name }}, </br>
                update your profile settings here!</h1>
        </div>
    </header>

    <div class="flex flex-col justify-center items-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="block" action="/user/profile/{{ $user->id }}/delete" method="post">
            @method('PUT')
            @csrf
            <button type="submit" name="update_nft" class="text-red-500 font-medium p-2">Delete Profile Image</button>
        </form>
        <form class="p-6 shadow-xl rounded-lg flex justify-center items-center flex-col" method="POST"
              action="/user/profile/{{ $user->id }}/update" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <img class="h-60 w-full object-contain object-center rounded-lg mb-4" src="{{ $user->image }}"
                 alt="profile picture">
            <input type="file" name="profile_image"
                   class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="on">

            <input type="text" name="name" value="{{ old('name') ?? $user->name }}"
                   class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="on">
            <input type="email" name="email" value="{{ old('email') ?? $user->email }}"
                   class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="on"
                   placeholder="{{ $user->email }}">
            <textarea name="bio" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
                      placeholder="Bio"></textarea>
            {{--            <input type="password" name="password" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="on" placeholder="Password">--}}
            {{--            <input type="password" name="newPassword" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="on" placeholder="New Password">--}}
            <button
                class="bg-indigo-500 hover:bg-blue-400 duration-700 transform text-white font-bold p-2 rounded w-80 mb-5"
                id="update" type="submit" name="update"><span>Update</span></button>
        </form>
    </div>

@endsection
