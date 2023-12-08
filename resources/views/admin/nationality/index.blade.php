@extends('layouts.master')
@section('title')
Nationality Management
@endsection
@section('page-title')
Nationality Management
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Nationality Table</h4>
                    <div class="text-end">
                        <a href="#" class="btn btn-sm btn-info">Create New</a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Here place table --}}
                </div>
            </div>
        </div>
    </div>
    @endsection
