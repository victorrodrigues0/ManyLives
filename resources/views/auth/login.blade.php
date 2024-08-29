@extends('layouts.main')

@section('title')
Login
@endsection

@section('content')

<section class="w-full h-full flex items-center justify-center bg-gray-100 flex-col">

    <x-validation-errors class="mb-6 text-red-600 mx-auto bg-white rounded-lg border border-gray-300 p-4 w-4/5 max-w-md" />

    @session('status')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ $value }}
    </div>
    @endsession

    <form method="POST" action="{{ route('login') }}" class="w-4/5 max-w-md bg-white shadow-lg rounded-lg p-8 flex flex-col gap-6 border border-gray-300">
        @csrf

        <div class="w-full flex flex-col">
            <x-label class="text-gray-800 mb-2" for="email" value="{{ __('Email') }}" />
            <x-input id="email" class="block w-full border border-gray-300 rounded-md p-2 focus:border-yellow-400 focus:ring-yellow-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <div class="w-full flex flex-col">
            <x-label class="text-gray-800 mb-2" for="password" value="{{ __('Password') }}" />
            <x-input id="password" class="block w-full border border-gray-300 rounded-md p-2 focus:border-yellow-400 focus:ring-yellow-400" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center text-gray-800">
                <x-checkbox id="remember_me" name="remember" />
                <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
            <a class="text-sm text-gray-600 hover:text-gray-800 transition-all duration-300 underline" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
        </div>

        <div class="flex justify-end">
            <input type="submit" name="submit" id="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-6 rounded transition-all duration-300 cursor-pointer" value="Login">
        </div>
    </form>
</section>

@endsection
