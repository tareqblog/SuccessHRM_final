@extends('layouts.master')
@section('title')
    Attendence Management
@endsection
@section('page-title')
    Attendence Management
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
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
                        <h4 class="card-title mb-0">Filter </h4>
                        <hr>
                        <form method="GET" action="{{ route('attendence.index') }}" id="attendanceFilter">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-3 row mb-2 align-items-center">
                                </div>
                                <div class="col-sm-12 col-md-6 row mb-2 align-items-center">
                                    <label for="one" class="col-sm-3 col-form-label fw-bold">Filter Date</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="daterange" name="daterange" value="{{ old('daterange', '2023-12-01 - 2024-01-25') }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 row mb-2 align-items-center">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card p-3">
                    <div class="card-header">
                        <h4 class="card-title mb-2">Attendence Table</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Client</th>
                                    <th>Attendence Month</th>
                                    <th>Approved Date & Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->candidate?->candidate_name }}</td>
                                        <td>{{ $data->client?->client_name }}</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($data->month_year)->format('M, Y') }}
                                        </td>
                                        <td>{{ $data->updated_at }}</td>
                                        <td style="display: flex;">
                                            <a href="{{ route('attendence.edit', $data->id) }}"
                                                class="btn btn-danger btn-sm me-2">Resubmit</a>
                                            <a href="{{ route('attendence.print', $data->id) }}"
                                                class="btn btn-warning btn-sm me-2">Print</a>
                                            <a disable href="#" class="btn btn-success btn-sm me-2">Download Attachments</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection


    @section('scripts')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });

            $('#daterange').on('apply.daterangepicker', function(ev, picker) {
                var startDate = picker.startDate.format('YYYY-MM-DD');
                var endDate = picker.endDate.format('YYYY-MM-DD');

                var url = "{{ route('attendence.index') }}?start_date=" + startDate + "&end_date=" + endDate;

                window.location.href = url;
            });

            $(function() {
                $('input[name="daterange"]').daterangepicker({
                    opens: 'left',
                    locale: {
                        format: 'YYYY-MM-DD'
                    },
                    endDate: moment().format('YYYY-MM-DD')
                }, function(start, end, label) {
                    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                });
            });
        </script>
    @endsection
