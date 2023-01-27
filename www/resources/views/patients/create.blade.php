@extends('layouts.app')
@section('content')

<div class="shadow">
    <div class="py-3 mb-10 flex">
        <div class="flex w-11/12 mx-auto">
            <div class="w-full flex items-center">
                <h1 class="ml-10 font-bold text-3xl">New Patient's Record</h1>
            </div>
        </div>
        <div class="w-full mr-10">
            <a class="bg-white float-right hover:bg-red-500 hover:text-white
                    border
                    border-red-500
                    py-2
                    px-5
                    rounded-lg
                    font-bold
                    text-red-500"
                href="{{ url('/patients') }}">Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">Whoops!</div>
    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700" > There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br>
@endif
   
<form action="{{ route('patients.store') }}" method="POST">
    @csrf
  
     <div class="mx-auto w-6/12">
        {{-- <div class="">
            <div class="">
                <div class="block uppercase text-gray-700 font-bold mb-2">Patient ID:</div>
                <input type="text" name="patientID" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Patient ID">
            </div>
        </div> --}}
        <div class="">
            <div class="">
                <div class="block uppercase text-gray-700 font-bold mb-2">Name:</div>
                <input type="text" name="fullName" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Name">
            </div>
        </div>

        <div class="flex gap-10">
            <div class="w-full">
                <div class="block uppercase text-gray-700 font-bold mb-2">Contact Number:</div>
                <input type="text" name="contactNum" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Contact Number">
            </div>
            <div class="w-full">
                <div class="block uppercase text-gray-700 font-bold mb-2">Date of Birth:</div>
                <input type="date" name="dateOfBirth" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="dateOfBirth">
            </div>
        </div>

        <div class="">
            <div class="">
                <div class="block uppercase text-gray-700 font-bold mb-2">Address:</div>
                <input type="text" name="address" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Address">
            </div>
        </div>
        
            
        <div class="text-center mt-10">
                <button type="submit" class="bg-white hover:bg-green-500 hover:text-white
                border
                border-green-500
                py-2
                px-5
                rounded-lg
                font-bold
                text-green-500">Submit</button>
        </div>
    </div>
   
</form>
@endsection