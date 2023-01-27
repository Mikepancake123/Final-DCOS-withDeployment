@extends('layouts.app')
@section('content')

    {{-- Update and Back button --}}
    <div class="p-10 mb-3">
        <div class="float-right mr-10">

            <a class="bg-white hover:bg-red-500 hover:text-white border border-red-500 py-2 px-5 rounded-lg font-bold text-red-500"
                href="{{ route('patients') }}">Back</a>
        </div>
    </div>

    <div class="flex mt-5 gap-10 mb-5">
        {{-- Title --}}
        <div class="w-full">
            <div class=" flex mb-10">
                <h1 class="ml-10 font-bold text-3xl">Patient's Record</h1>

                <a class="ml-80 bg-white hover:bg-green-500 hover:text-white border border-green-500 mr-2 py-2 px-4 rounded-lg font-bold text-green-500 "
                    href="{{ route('patients.edit', $patient->id) }}">Update</a>
            </div>


            @if ($message = Session::get('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
                    <p>{{ $message }}</p>
                </div>
                <br>
            @endif


            {{-- Patients Information --}}
            <table class="mx-auto w-10/12 shadow">
                <tr class="shadow ">
                    <td class="px-3 py-7">Patient's Name</td>
                    <td class="font-semibold text-xl">{{ $patient->fullName }}</td>
                </tr>
                <tr class="">
                    <td class="px-3 py-7">Contact Number</td>
                    <td class="font-semibold text-xl">{{ $patient->contactNum }}</td>
                </tr>
                <tr class="shadow">
                    <td class="px-3 py-7">Date of Birth</td>
                    <td class="font-semibold text-xl">{{ date('F d, Y', strtotime($patient->dateOfBirth)) }}</td>
                </tr>
                <tr class="">
                    <td class="px-3 py-7">Address</td>
                    <td class="font-semibold text-xl">{{ $patient->address }}</td>
                </tr>
                <tr class="shadow">
                    <td class="px-3 py-7">Date Created</td>
                    <td class="font-semibold text-xl"> {{ date('M d, Y l h:i a', strtotime($patient->created_at)) }}</td>
                </tr>
                <tr class="">
                    <td class="px-3 py-7 ">Date Updated</td>
                    <td class="font-semibold text-xl"> {{ date('M d, Y l h:i a', strtotime($patient->updated_at)) }}</td>
                </tr>
            </table>
        </div>

        {{-- Add Session --}}
        <div class="w-full">
            {{-- ERROR DISPLAY --}}
            @if ($errors->any())
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">Whoops!</div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700"> There were some
                    problems
                    with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br>
            @endif

            @if ($message = Session::get('addsuccess'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
                <p>{{ $message }}</p>
            </div>
            <br>
             @endif

            <form action="{{ route('sessions.store') }}" method="POST">
                @csrf

                <h1 class="font-bold text-3xl mb-7">Add Session for {{ $patient->fullName }}</h1>
                <div class="w-full">
                    <div class=" mr-16">

                        <div class="">
                            <div class="">
                                <input type="hidden" name="patient_id" value="{{ $patient->id }}" />
                            </div>
                        </div>

                        <div class="flex gap-10">
                            <div class="w-full">
                                <div class="block uppercase text-gray-700 font-bold mb-2">Procedure:</div>
                                <input type="text" name="dentalProcedure"
                                    class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3"
                                    placeholder="Procedure">
                            </div>
                            <div class="w-full">
                                <div class="block uppercase text-gray-700 font-bold mb-2">Complain:</div>
                                <input type="text" name="complain"
                                    class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3"
                                    placeholder="Complain">
                            </div>
                        </div>

                        <div class="flex gap-10">
                            <div class="w-full">
                                <div class="block uppercase text-gray-700 font-bold mb-2">Tooth Number</div>
                                <input type="text" name="toothNum"
                                    class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3"
                                    placeholder="Tooth Number">
                            </div>
                            <div class="w-full">
                                <div class="block uppercase text-gray-700 font-bold mb-2">Amount to be Paid:</div>
                                <input type="text" name="payment"
                                    class="w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3"
                                    placeholder="Amount">
                            </div>
                        </div>
                        {{-- Image --}}
                        <div class="mt-5 mb-5">
                            <div class="">
                                <img class="w-full" src="{{ url('/images/teeth.png') }}" alt="Image" />
                            </div>
                        </div>


                        <div class="text-center mt-10 mb-10">
                            <button type="submit"
                                class="bg-white hover:bg-green-500 hover:text-white
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
        </div>

    </div>





    {{-- DISPLAY SESSIONS --}}
    <div class="display-session mb-10">
        <div class="w-full">
            <h1 class="font-bold text-4xl ml-10 mb-10">{{ $patient->fullName }}'s Session</h1>
        </div>

        @if ($message = Session::get('successs'))
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
                {{-- <th class="py-3">Session Date</th> --}}
                <th class="py-3">Tooth Number</th>
                <th class="py-3">Total Amount</th>
                <th class="py-3">Date Created</th>
                <th class="py-3">Action</th>
            </tr>
            @foreach ($sessions as $session)
                <tr class="odd:bg-white even:bg-slate-100 text-center">
                    {{-- <td>{{ ++$i }}</td> --}}
                    <td>{{ $session->dentalProcedure }}</td>
                    <td>{{ $session->complain }}</td>
                    {{-- <td>{{ $session->presentDate }}</td> --}}
                    <td>{{ $session->toothNum }}</td>
                    <td>{{ $session->payment }}</td>
                    <td class="">{{ date('F d, Y h:i a', strtotime($session->created_at)) }}</td>
                    <td>
                        <a class="" href="{{ route('sessions.edit', $session->id) }}"><i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>




@endsection
