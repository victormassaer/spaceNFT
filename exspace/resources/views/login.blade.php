@extends('layouts/login_register')

<title>Login | Exspace</title>

@section('content')

    <div class="w-screen h-screen flex justify-center items-center bg-gray-100">
		<form class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md" method="post" action="{{ url('/login') }}">
            @csrf
			<p class="mb-5 text-3xl uppercase text-gray-600">Login</p>
			<input type="email" name="email" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="on" placeholder="Email" required>
			<input type="password" name="password" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="on" placeholder="Password" required>
			<button name="login" class="bg-indigo-500 hover:bg-blue-400 duration-700 transform text-white font-bold p-2 rounded w-80 mb-5" id="login" type="submit" name="submit"><span>Login</span></button>
            <div>
                <span>Don't have an account yet?</span>
                <a class="text-indigo-500 font-bold" href="{{ url('register') }}">Register</a>
            </div>
		</form>
	</div>

@endsection
