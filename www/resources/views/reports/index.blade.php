@extends('layouts.app')
@section('content')

    <div class="mt-8 mb-10">
        <div class="mt-5 pt-2 w-full">
            <div class="ml-10 font-bold text-4xl"> Financial Report</div>


            <div class="flex gap-16">
                {{-- Date Selection --}}
                <div class="mt-6 ml-16 w-full">
                    <form action="" method="GET">
                        @csrf
                        <div class="">
                            <div class="block uppercase text-gray-700 font-bold mb-2">Select Date From:</div>
                            <input type="date" name="fromdate"
                                class="bg-gray-200 text-gray-700 border rounded w-full py-3 px-4 mb-3">
                        </div>

                        <div class="">
                            <div class="block uppercase text-gray-700 font-bold mb-2">Select Date To:</div>
                            <input type="date" name="todate"
                                class=" bg-gray-200 text-gray-700 border rounded w-full py-3 px-4 mb-3">
                        </div>

                        {{-- <button
                            class="bg-white hover:bg-green-500 hover:text-white
                            float-right
                            mt-3
                            border
                            border-green-500
                            py-2
                            px-5
                            rounded-lg
                            font-bold
                            text-green-500"
                             type="submit"><input  value="{{ date('now')}}"  name="today" 
                                class=" bg-gray-200 text-gray-700 border rounded w-full py-3 px-4 mb-3"> Today REPORTS</button> --}}
                                {{-- value="{{ date('Y-m-d', strtotime('now')) }}" --}}
                           
                           
                        <button
                            class="bg-white hover:bg-green-500 hover:text-white
                            float-right
                            mt-3
                            border
                            border-green-500
                            py-2
                            px-5
                            rounded-lg
                            font-bold
                            text-green-500"
                            type="submit">SHOW REPORTS</button>
                            
                    </form>
                </div>

                {{-- Show Sum of all Session --}}
                <div class="w-full">
                    <div class="mt-10 mr-16">
                        {{-- @foreach ($sessions as $session) --}}
                        <div class="text-3xl font-bold mb-6">Total Revenue as of Selected Date:</div>
                        {{-- @endforeach --}}
                        <div class="w-6/6 shadow ml-5 rounded py-10 px-4 mb-3">
                            <p class="ml-5 font-bold">₱ {{ $sum }}.00</p>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>

    {{-- Session Table --}}
    <div class="flex w-10/12 mx-auto">
        <div class="w-full flex items-center">
            <h1 class="font-bold text-2xl">Patient's Session(s)</h1>
        </div>
    </div>

    <table class="flex table shadow w-11/12 mx-auto">
        <tr>
            {{-- <th class="py-3">No</th> --}}
            <th class="py-3">Procedure</th>
            <th class="py-3">Complain</th>
            <th class="py-3">Session Date</th>
            <th class="py-3">Tooth Number</th>
            <th class="py-3">Total Amount</th>
        </tr>
        @if ($sessions->isNotEmpty())
            @foreach ($sessions as $session)
                <tr class="odd:bg-white even:bg-slate-100 text-center">
                    {{-- <td>{{ ++$i }}</td> --}}
                    {{-- <td>{{ $patient->fullName }}</td> --}}
                    <td>{{ $session->dentalProcedure }}</td>
                    <td>{{ $session->complain }}</td>
                    <td>{{ date('M d, Y - l', strtotime($session->created_at)) }}</td>
                    <td>{{ $session->toothNum }}</td>
                    <td>{{ $session->payment }}</td>
                    {{-- <td>{{ $session->total }}</td> --}}
            @endforeach

            </tr>
    </table>
@else
    <div class="odd:bg-white even:bg-slate-100 text-center">
        <div>No Sessions found yet, please select a date range</div>
    </div>
    @endif
    {{-- {!! $sessions->links() !!} --}}

@endsection
