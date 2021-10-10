@extends('layouts/app')

<title>Register | Exspace</title>

@section('content')

    <div class="w-screen h-screen flex justify-center items-center bg-gray-100">
		<form class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md">
			<p class="mb-5 text-3xl uppercase text-gray-600">register</p>
            <input type="text" name="firstname" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="first name" required>
            <input type="text" name="lastname" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="last name" required>
			<input type="email" name="email" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"  placeholder="Email" required>
			<input type="password" name="password" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"  placeholder="Password" required>
			<button class="bg-purple-600 hover:bg-purple-900 text-white font-bold p-2 rounded w-80" id="register" type="submit"><span>register</span></button>
		</form>
	</div>

@endsection
