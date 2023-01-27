@extends('layouts.app')
   
@section('content')
<div class="py-5 mb-3 flex">
    <div class="w-11/12 mx-auto">
        <h1 class="ml-10 font-bold text-2xl">Edit Session's Record</h1>
    </div>
    <div class="w-full mr-10">
        <a class="bg-white float-right hover:bg-red-500 hover:text-white border border-red-500 py-2 px-5 rounded-lg font-bold text-red-500"
        href="{{ route('patients.show',$session->patient_id) }}">Back</a>
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
  
    <form action="{{ route('sessions.update',$session->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="w-6/12 mx-auto">
            <div class="">

                <div class="flex gap-14 mb-5">
                    <div class="w-full">
                        <div class="block uppercase text-gray-700 font-bold mb-2" >Procedure:</div>
                        <input type="text" name="dentalProcedure"
                            class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" value="{{ $session->dentalProcedure }}" placeholder="Procedure">
                    </div>
                    <div class="w-full">
                        <div class="block uppercase text-gray-700 font-bold mb-2" >Complain:</div>
                        <input type="text" name="complain"
                            class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" value="{{ $session->complain }}" placeholder="Complain">
                    </div>
                </div>
                    
                <div class="flex gap-14 mb-7">
                    <div class="w-full">
                        <div class="block uppercase text-gray-700 font-bold mb-2" >Tooth Number</div>
                        <input type="text" name="toothNum"
                            class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" value="{{ $session->toothNum }}"
                            placeholder="Tooth Number">
                    </div>
                    <div class="w-full">
                        <div class="block uppercase text-gray-700 font-bold mb-2" >Amount to be Paid:</div>
                        <input type="text" name="payment"
                            class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3" value="{{ $session->payment }}" placeholder="Amount">
                    </div>
                </div>
                {{-- Image --}}
                <div class="mt-5 mb-5">
                    <div class="">
                        <img class="w-full" src="{{ url('/images/teeth.png') }}" alt="Image" />
                    </div>
                </div>


                <div class="text-center mt-16 mb-10">
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
        </div>
   
    </form>
@endsection