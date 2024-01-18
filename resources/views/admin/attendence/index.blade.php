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
                                    {{-- <th>AR No</th> --}}
                                    <th>Attendence Month</th>
                                    <th>Approved Date & Time</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>{{ $data->candidate->candidate_name }}</td>
                                        <td>{{ $data->company_id }}</td>
                                        <td>{{ $data->candidate_email }}</td>
                                        <td>{{ $data->candidate_mobile }}</td>
                                        <td>{{ $data->updated_at }}</td>
                                        <td><a href="{{ route('attendence.edit', $data->id) }}"
                                                class="btn btn-success btn-sm me-3">Assigned</a></td>
                                        <td></td>
                                        <td>{{ $data->candidate_status == 1 ? 'Active' : 'In-Active' }}</td>
                                        <td style="display: flex;">
                                            <a href="{{ route('candidate.edit', $data->id) }}#remark"
                                                class="btn btn-warning btn-sm me-2"></i>Remarks</a>
                                            <a href="{{ route('candidate.edit', $data->id) }}"
                                                class="btn btn-info btn-sm me-2"><i class="fas fa-pen"></i></a>
                                            <form id="deleteForm" action="{{ route('candidate.destroy', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this item?')"
                                                    class="btn btn-sm btn-danger"> <i class="fas fa fa-trash"></i> </a>
                                            </form>
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
