@extends('layouts.app')

@section('content')
    <div class="mt-10 mb-10">
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

    <div class="w-10/12 mx-auto text-right mt-10 mb-5">
        <a href="{{ url('/patients') }}" class="">
            <div class="h-12 relative">
                <input type="text" name="search" placeholder="Search a Patient" required class="w-56 rounded-lg hover:border-red-600 text-green-900 pr-10 border p-3 absolute right-0 bg-white" value="{{ app('request')->input('search') }}" disabled>
                <span class="fas fa-close absolute hover:text-red-600 right-4 top-4 text-red-400"></span>
            </div>
        </a>
    </div>

    <table class="flex table shadow w-11/12 mx-auto mt-10">
        <tr class="">
            <th class="py-3">Name</th>
            <th class="py-3">Contact Number</th>
            <th class="py-3">Address</th>
            <th class="py-3">Date of Birth</th>
            <th class="py-3">Action</th>
        </tr>

        @if ($patients->isNotEmpty())
            @foreach ($patients as $patient)
            <tr class="odd:bg-white even:bg-slate-100 text-center">
                <td class="p-5">{{ $patient->fullName }}</td>
                <td>{{ $patient->contactNum }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->dateOfBirth }}</td>
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
        @else
            <div>
                <h2>No posts found</h2>
            </div>
        @endif
        </table>
@endsection
