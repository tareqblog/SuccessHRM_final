@extends('layouts.master')
@section('title')
Candidate Management
@endsection
@section('page-title')
Candidate Management
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Candidate Table</h4>
                    <div class="text-end">
                        <a href="#" class="btn btn-sm btn-success">Create New</a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Here place table --}}
                </div>
            </div>
        </div>
    </div>
    @endsection
