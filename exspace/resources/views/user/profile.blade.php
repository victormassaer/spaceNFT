@extends('layouts/app')

<title>{{ $user->name }} | Edit profile | Exspace</title>

@section('content')


        <div class="flex-grow flex justify-center items-center">
            <div class="p-6 shadow-xl rounded-lg flex justify-center items-center flex-col">
                <img class="h-60 w-full object-contain object-center rounded-t-lg rounded-lg" src="{{ $user->image }}" alt="Profile picture of {{ $user->name }}">
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
            </div>
        </div>

        <div>
            <form method="POST" action="/user/update/{{$user->id}}">
                @csrf
                @method('PUT')
                <label for="name">change your name</label>
                <input type="text" id="name" name="name">

                <label for="email">change your email</label>
                <input type="email" id="email" name="email">

                <label for="image">change profile picture</label>
                <input type="file" name="image">

                <input type="submit" name="submit" value="change info">
            </form>
        </div>

@endsection
