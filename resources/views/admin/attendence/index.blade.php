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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Attendence Table</h4>
                        {{-- <div class="text-end">
                            <a href="{{ route('candidate.create') }}" class="btn btn-sm btn-success">Create New</a>
                        </div> --}}
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
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->candidate?->candidate_name }}</td>
                                        <td>{{ $data->company?->name }}</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($data->month_year)->format('M, Y') }}
                                        </td>
                                        <td>{{ $data->updated_at }}</td>
                                        <td style="display: flex;">
                                            <a href="{{ route('attendence.edit', $data->id) }}"
                                                class="btn btn-info btn-sm me-2"><i class="fas fa-pen"></i></a>
                                            <a href="{{ route('attendence.edit', $data->id) }}"
                                                class="btn btn-primary btn-sm me-2">Resubmit</a>
                                        </td>
                                    </tr>
                                @empty

                                    <tr>
                                        <td colspan="50" class="text-center text-warning">
                                            No Data found!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection


    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    @endsection
