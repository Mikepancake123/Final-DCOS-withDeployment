@extends('sessions.layout')
  
@section('content')
<div class="shadow">
    <div class="py-5 mb-10 flex">
        <div class="flex w-11/12 mx-auto">
            <div class="w-full flex items-center">
                <h1 class="ml-10 font-bold text-3xl">Patient's Session Record</h1>
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
   
<div class="mx-auto w-6/12">
    <div class="">
        <div class="block uppercase text-gray-700 font-bold mb-2">ID:</div>
        <div class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3">{{ $sessions->id }}</div>
    </div>
    <div class="">
        <div class="block uppercase text-gray-700 font-bold mb-2">Patients_ID:</div>
        <div class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3">{{ $patients->patients_id }}</div>
    </div>
    <div class="">
        <div class="block uppercase text-gray-700 font-bold mb-2">Procedure:</div>
        <div class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3">{{ $sessions->dentalProcedure }}</div>
    </div>
    <div class="">
        <div class="block uppercase text-gray-700 font-bold mb-2">Complain:</div>
        <div class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3">{{ $sessions->complain }}</div>
    </div>

    <div class="flex gap-10">
        <div class="w-full">
            <div class="block uppercase text-gray-700 font-bold mb-2">Session Date:</div>
            <div class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3">{{ $sessions->presentDate }}
            </div>
        </div>
        <div class="w-full">
            <div class="block uppercase text-gray-700 font-bold mb-2">Tooth Number:</div>
            <div class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3">{{ $sessions->toothNum }}</div>
        </div>
    </div>


    
    <div class="">
        <div class="block uppercase text-gray-700 font-bold mb-2">Amount to be Paid:</div>
        <div class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3">{{ $sessions->payment }}</div>
    </div>
</div>
@endsection