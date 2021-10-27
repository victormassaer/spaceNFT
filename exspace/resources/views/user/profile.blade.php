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

@endsection
