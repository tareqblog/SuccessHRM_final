@extends('layouts.master')
@section('title')
    Attendence Management
@endsection
@section('page-title')
    Attendence Management
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <style>

        .table th, td{
            padding-left: 5px !important;
        }
        .print_table {
            overflow-x: scroll;
        }
    </style>
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                @if($errors->any())
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                          <strong>{{$errors->first()}}</strong>
                        </div>
                    </div>
                @endif

                <div class="card p-3">
                    <div class="card-header">
                        <h4 class="card-title mb-2">Attendence Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="print_table">
                            <table class="table table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th colspan="11"> <h4>SUCCESS RESOURCE CENTRE PTE LTD</h4> </th>
                                        <th colspan="3">
                                            <div class="text-center bg-secondary fs-6 text-white">TIMESHEET</div>
                                            <div>Month: {{ Carbon\Carbon::parse($parent->month_year)->format('F') }}</div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="5">Company: {{ $parent->client->client_name }}</th>
                                        <th colspan="5">DEPT: ---</th>
                                        <th colspan="4">POSITION: ---</th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Full Name: {{ $parent->candidate->candidate_name }}</th>
                                        <th colspan="5">Mobile No: {{ $parent->candidate->candidate_home_phone }}</th>
                                        <th colspan="3"></th>
                                    </tr>
                                    <tr>
                                        <th colspan="14">Official Working Hours: Mon to Fri : 09:00 - 18:00</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Day</th>
                                        <th scope="col">Time In</th>
                                        <th scope="col">Time Out</th>
                                        <th scope="col">Lunch Break</th>
                                        <th scope="col">Total Hours Worked</th>
                                        <th scope="col">Overtime Hours (1.5)</th>
                                        <th scope="col">Overtime Hours (2.0)</th>
                                        <th scope="col">Remarks</th>
                                        <th scope="col">PH</th>
                                        <th scope="col">Type of Leave</th>
                                        <th scope="col">Leave Days</th>
                                        <th scope="col">Type of Reimbursement</th>
                                        <th scope="col">Amount of Reimbursement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $day => $attendance)
                                    @php
                                        ++$day;
                                    @endphp
                                    <tr>
                                        <td>{{ $attendance->date }}</td>
                                        <td>{{ $attendance->day }}</td>
                                        <td>{{ $attendance->in_time }}</td>
                                        <td>{{ $attendance->out_time }}</td>
                                        <td>{{ $attendance->lunch_hour }}</td>
                                        <td>{{ $attendance->total_hour_min }}</td>
                                        <td>{{ $attendance->ot_hour_min }}</td>
                                        <td>---</td>
                                        <td>{{ $attendance->remark }}</td>
                                        <td>{{ $attendance->ph }}</td>
                                        <td>
                                            @foreach ($leaveTypes as $type)
                                                <span style="display: {{$type->id == $attendance->type_of_leave ? '' : 'none'}}">{{$type->leavetype_code}}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $attendance->leave_day }}</td>
                                        <td>{{ $attendance->type_of_reimbursement }}</td>
                                        <td>{{ $attendance->amount_of_reimbursement }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                $('#start_date, #end_date').on('change', function () {
                    var startDateValue = $('#start_date').val();
                    var endDateValue = $('#end_date').val();

                    var newUrl = "{{ route('attendence.index') }}?start_date=" + startDateValue + "&end_date=" + endDateValue;
                    window.location.href = newUrl;
                });
            });
        </script>
    @endsection
