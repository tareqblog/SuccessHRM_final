@extends('layouts.master')
@section('title')
    Employee Management
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endsection
@section('page-title')
    Employee Management
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Employee Table</h4>
                        <div class="text-end">
                            <a href="{{ route('employee.create') }}" class="btn btn-sm btn-success">Create New</a>
                        </div>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered mb-0 mt-0 bg-light" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>User Role</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Initialize</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->employee_name }}</td>
                                        <td>{{ $data->role_data?->name }}</td>
                                        <td>{{ $data->employee_email }}</td>
                                        <td>{{ $data->employee_phone }}</td>
                                        <td>{{ $data->employee_code }}</td>
                                        <td>{{ $data->employee_status == 1 ? 'Active' : 'In-Active' }}</td>
                                        <td style="display: flex;">

                                            <a href="{{ route('employee.edit', $data->id) }}"
                                                class="btn btn-info btn-sm me-3"><i class="fas fa-pen"></i></a>

                                            <form id="deleteForm" action="{{ route('employee.destroy', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this item?')"
                                                    class="btn btn-sm btn-danger"><i class="fas fa fa-trash"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    {{-- empty data --}}
                                    <tr>
                                        <td class="text-center text-warning" colspan="5">
                                            No data found!
                                        </td>
                                    </tr>
                                    {{-- empty data --}}
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
