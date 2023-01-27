@extends('layouts.app')

@section('content')
    <div class="pt-2 mb-10 mt-8">
        <div class="flex w-10/12 mx-auto">
            <div class="w-full flex items-center">
                <h1 class="font-bold text-4xl">Patient(s)</h1>
            </div>
            <a class="bg-white whitespace-nowrap float-right hover:bg-green-500 hover:text-white
                border
                border-green-500
                py-2
                px-5
                rounded-lg
                font-bold
                text-green-500"
                href="{{ route('patients.create') }}"> Add New Patient</a>
        </div>
    </div>

    <div class="flex items-center">
        <div class="ml-16">
            <div class="bg-white whitespace-nowrap float-right 
            shadow
            py-2
            px-5
            rounded-lg
            font-bold
            text-green-500">
                <i class="fa fa-id-card"></i>
                <span class="count-numbers">{{ $totalpatients }}</span>
                <span class="count-name">Patients</span>
            </div>
        </div>

        {{-- Search --}}
        <div class="w-10/12 mx-auto text-right mr-16">
            <form type="get" action="{{ url('/search') }}">
                <div class="h-12 relative">
                    <input type="text" name="search" placeholder="Search a Patient" required
                        class="pr-10 border p-3 rounded-lg hover:border-black absolute right-0 w-56">

                    <span class="fas fa-search absolute right-4 top-4"></span>

                </div>
            </form>
        </div>


    </div>

    {{-- Message after adding a patient --}}
    @if ($message = Session::get('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
            <p>{{ $message }}</p>
        </div>
        <br>
    @endif

    {{-- table --}}
    <table class="flex table shadow w-11/12 mx-auto mt-10">
        <tr class="">
            <th class="py-3">Name</th>
            <th class="py-3">Contact Number</th>
            <th class="py-3">Address</th>
            <th class="py-3">Date of Birth</th>
            <th class="py-3">Action</th>
        </tr>
        @foreach ($patients as $patient)
            <tr class="odd:bg-white even:bg-slate-100 text-center">
                <td class="p-5">{{ $patient->fullName }}</td>
                <td>{{ $patient->contactNum }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ date('F d, Y', strtotime($patient->dateOfBirth)) }}</td>
                <td>
                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">

                        <a class="" href="{{ route('patients.show', $patient->id) }}"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>

                        {{-- <a class="btn btn-primary" href="{{ route('patients.edit',$patient->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button> --}}
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $patients->links() !!}
@endsection
