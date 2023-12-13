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
                        <div js-hook-url="{{ route('employee.fetch') }}" js-hook-table-client></div>
                        <div id="table-ecommerce-customers"></div>
                       
                        @include('vendor.laravel-datagrid.datagrid')
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