<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DCOS') }}</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/app.scss') }}" rel="stylesheet">
  
    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body>

<header class="sticky top-0 z-50 bg-indigo-300 shadow-md w-full px-5 flex justify-between items-center">
    
    
        @guest
            @if (Route::has('login'))
                <div class="text-center absolute top-1/3 left-1/3 shadow-2xl items-center bg-transparent p-5 rounded-lg -translate-x-1/4 -translate-y-3/4 ">
                    <a class="text-8xl" href="{{ route('login') }}">{{ __('Dr. Gerong\'s Dental Clinic') }}</a>
                </div>
            @endif

        @else
        
        <div class="flex p-5 gap-5 relative w-full">
            <div class=" w-full flex items-center">
                <h1 class="font-bold text-2xl capitalize">
                {{ Auth::user()->name }}</h1>

                <a class="bg-white hover:bg-indigo-500 hover:text-white
                border
                border-indigo-500
                py-2
                px-5
                rounded-lg
                font-bold
                text-indigo-500 ml-5" href="{{url('patients')}}">
                    Patients
                </a>

                <a class="bg-white hover:bg-indigo-500 hover:text-white
                border
                border-indigo-500
                py-2
                px-5
                rounded-lg
                font-bold
                text-indigo-500 ml-5" href="{{url('reports\index')}}">
                    Reports
                </a>
            </div>        

            <div class="flex justify-end">
                <a class="bg-white hover:bg-red-500 hover:text-white
                border
                border-red-500
                py-2
                px-5
                rounded-lg
                font-bold
                text-red-500" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                    @csrf
                </form>
            </div>
        </div>
        @endguest
</header>
        <main>
                @yield('content')
        </main>
</body>

</html>
