@extends('auth.layout')

@section('content')
    <div
        class="absolute
        top-1/3
        left-1/2
        transform
        -translate-x-1/2 -translate-y-1/2
        border border-color
        bg-transparent
        p-5
        rounded-lg
        mt-16
        w-3/12
        shadow-2xl
        mt-60">

    <div class="text-center py-2">
        Admin Login
    </div>


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="w-fit mx-auto my-5">
                <div class="block">
                    @error('email')
                        <span class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="block">
                    @error('password')
                        <span class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Forms --}}
            <div class="flex w-full border-b border-green-500 py-4">
                <input id="email" type="email" class=" @error('email') is-invalid @enderror focus:outline-none px-3 focus:bg-white" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

   
            </div>
            <div class="flex border-b border-green-500 py-4">
                <input id="password" type="password" class=" @error('password') is-invalid @enderror focus:outline-none px-3"
                    name="password" required autocomplete="current-password" placeholder="Password">

            </div>

            {{-- Button --}}
            <div class="mt-9">
                <button type="submit"
                    class="mx-auto
                        block
                        border
                        hover:bg-green-500
                        hover:text-white
                        border-green-500
                        py-2
                        px-5
                        rounded-lg
                        font-bold
                        text-green-500">
                    {{ __('Submit') }}
                </button>
            </div>

        </form>

    </div>
@endsection
