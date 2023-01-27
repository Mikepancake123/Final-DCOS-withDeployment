<!DOCTYPE html>
<html>
<head>
    <title>Dr. Gerong's Dental Clinic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div>
    @if (Route::has('login'))
    <li class="text-center absolute top-1/3 left-1/3 shadow-2xl items-center bg-transparent p-5 rounded-lg -translate-x-1/4 -translate-y-3/4 ">
        <a class="text-8xl" href="{{ route('login') }}">{{ __('Dr. Gerong\'s Dental Clinic') }}</a>
    </li>
@endif</div>  

<div class="container">
    @yield('content')
</div>
   
</body>
</html>