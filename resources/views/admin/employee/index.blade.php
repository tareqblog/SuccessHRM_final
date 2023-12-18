@extends('layouts.master')
@section('title')
Employee Management
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
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
                        <a href="{{route('employee.create')}}" class="btn btn-sm btn-success">Create New</a>
                    </div>
                </div>
                <div class="card-body">
                <table class="table table-bordered mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>User Role</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->employee_name }}</td>
                                        <td>{{ $data->role_data->name }}</td>
                                        <td>{{ $data->employee_email }}</td>
                                        <td>{{ $data->employee_mobile }}</td>
                                        <td>{{ $data->employee_status == 1 ? 'Active' : 'In-Active' }}</td>
                                        <td style="display: flex;">

                                            <a href="{{ route('employee.edit', $data->id) }}"
                                                class="btn btn-info btn-sm me-3">Edit</a>

                                            <form id="deleteForm" action="{{ route('employee.destroy', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this item?')"
                                                    class="btn btn-sm btn-danger">Delete</a>
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
        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>

        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>

        <!-- Employee DataGride --->
        <script src="{{ URL::asset('build/js/employee.js') }}"></script>

        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection