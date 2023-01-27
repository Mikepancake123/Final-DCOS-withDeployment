@extends('sessions.layout')
  
@section('content')
<div class="shadow">
    <div class="py-5 mb-10 flex">
        <div class="flex w-11/12 mx-auto">
            <div class="w-full flex items-center">
                <h1 class="ml-10 font-bold text-3xl">Create Session</h1>
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
                href="{{ url('/sessions') }}">Back</a>
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
   
<form action="{{ route('sessions.store') }}" method="POST">
    @csrf
  
     <div class="mx-auto w-6/12">
        <div class="">
            <div class="">
                {{-- <div class="block uppercase text-gray-700 font-bold mb-2">Patients ID:</div>
                <input type="text" name="patient_id" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Procedure" value="1"> --}}
            </div>
        </div>

        <div class="">
            <div class="">
                <div class="block uppercase text-gray-700 font-bold mb-2">Procedure:</div>
                <input type="text" name="dentalProcedure" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Procedure">
            </div>
        </div>
        <div class="">
            <div class="">
                <div class="block uppercase text-gray-700 font-bold mb-2">Complain:</div>
                <input type="text" name="complain" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Complain">
            </div>
        </div>

        <div class="flex gap-10">
            <div class="w-full">
                <div class="block uppercase text-gray-700 font-bold mb-2">Session Date:</div>
                <input type="date" name="presentDate" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Date">
            </div>
            <div class="w-full">
                <div class="block uppercase text-gray-700 font-bold mb-2">Tooth Number:</div>
                <input type="text" name="toothNum" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Tooth Number">
            </div>
        </div>

        <div class="">
            <div class="">
                <div class="block uppercase text-gray-700 font-bold mb-2">Amount to be Paid:</div>
                <input type="number" name="payment" class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" placeholder="Amount">
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
        {{-- This must go to http://127.0.0.1:8000/patients/1 --}}

    </div>
   
</form>
@endsection