@extends('layouts.master')
@section('title')
    Leave Management
@endsection
@section('page-title')
    Leave Management
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
                        <h4 class="card-title mb-0">Leave Table</h4>
                        <div class="text-end">
                            <a href="{{ route('leave.create') }}" class="btn btn-sm btn-success">Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Employee Type</th>
                                    <th>Employee</th>
                                    <th>Type Of Leave</th>
                                    <th>Remark</th>
                                    <th>Leave Start Date</th>
                                    <th>Leave End Date</th>
                                    <th>Leave Days</th>
                                    <th>Approved/Rejected By </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->leave_empl_type == 0 ? 'Candidate' : 'Employee' }}</td>
                                        <td>{{ $data->employee->employee_name }}</td>
                                        <td>{{ $data->leaveType->leavetype_code }}</td>
                                        <td>{{ $data->leave_reason }}</td>
                                        <td>{{ $data->leave_datefrom }}</td>
                                        <td>{{ $data->leave_dateto }}</td>
                                        <td>{{ $data->leave_total_day }}</td>
                                        <td>--</td>
                                        <td>--</td>
                                        <td style="display: flex;">
                                            <a href="{{ route('leave.edit', $data->id) }}" class="btn btn-info btn-sm me-3"><i
                                                    class="fas fa-pen"></i></a>
                                            <form action="{{ route('leave.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this item?')"><i
                                                        class="fa-solid fa-trash"></i></button>
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
