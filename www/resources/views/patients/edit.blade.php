@extends('layouts.app')
   
@section('content')
    <div class="py-5 mb-3 flex">
        <div class="w-11/12 mx-auto">
            <h1 class="ml-10 font-bold text-2xl">Edit Patient's Record</h1>
        </div>
        <div class="w-full mr-10">
            <a class="bg-white float-right hover:bg-red-500 hover:text-white border border-red-500 py-2 px-5 rounded-lg font-bold text-red-500"
            href="{{ route('patients.show',$patient->id) }}">Back</a>
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
  
    <form action="{{ route('patients.update',$patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mx-auto w-6/12">
            <div class="">
                <div class="">
                    <div class="block uppercase text-gray-700 font-bold mb-2">Name:</div>
                    <input type="text" value="{{ $patient->fullName}}" name="fullName"  class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Name">
                </div>
            </div>
    
            <div class="flex gap-10">
                <div class="w-full">
                    <div class="block uppercase text-gray-700 font-bold mb-2">Contact Number:</div>
                    <input type="text" value="{{ $patient->contactNum}}" name="contactNum" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Contact Number">
                </div>
                <div class="w-full">
                    <div class="block uppercase text-gray-700 font-bold mb-2">Date of Birth:</div>
                    <input value="{{ $patient->dateOfBirth }}" name="dateOfBirth" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="dateOfBirth">
                </div>
            </div>
    
            <div class="">
                <div class="">
                    <div class="block uppercase text-gray-700 font-bold mb-2">Address:</div>
                    <input type="text" value="{{ $patient->address}}" name="address" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Address">
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