@extends('layouts.app')
 
@section('content')
    <div class="mt-10 mb-10">
        <div class="flex w-10/12 mx-auto">
            <div class="w-full flex items-center">
                <h1 class="font-bold text-4xl">Patient's Session(s)</h1>
            </div>
            
            <div class="flex gap-10">
                
                <a class="bg-white whitespace-nowrap hover:bg-green-500 hover:text-white
                    border
                    border-green-500
                    py-2
                    px-5
                    rounded-lg
                    font-bold
                    text-green-500" href="{{ route('sessions.create') }}"> Add New Session</a>
                <a class="bg-white hover:bg-red-500 hover:text-white
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



    @if ($message = Session::get('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
            <p>{{ $message }}</p>
        </div>
        <br>
    @endif
   
    <table class="flex table shadow w-11/12 mx-auto">
        <tr>
            {{-- <th class="py-3">No</th> --}}
            <th class="py-3">Procedure</th>
            <th class="py-3">Complain</th>
            <th class="py-3">Session Date</th>
            <th class="py-3">Tooth Number</th>
            <th class="py-3">Total Amount</th>
            <th class="py-3">Action</th>
        </tr>
        @foreach ($sessions as $session)
            <tr class="odd:bg-white even:bg-slate-100 text-center">
                {{-- <td>{{ ++$i }}</td> --}}
                <td>{{ $session->dentalProcedure }}</td>
                <td>{{ $session->complain }}</td>
                <td>{{ $session->presentDate }}</td>
                <td>{{ $session->toothNum }}</td>
                <td>{{ $session->payment }}</td>
                <td>
                    <form action="{{ route('sessions.destroy',$session->id) }}" method="POST">
    
                        <a class="" href="{{ route('sessions.show',$session->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
        
                        {{-- <a class="btn btn-primary" href="{{ route('sessions.edit',$session->id) }}">Edit</a>
    
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-danger">Delete</button> --}}
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
  
    {!! $sessions->links() !!}
      
@endsection