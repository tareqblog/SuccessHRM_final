@extends('layouts.master')
@section('title')
TNC Template Management
@endsection
@section('page-title')
TNC Template Management
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Create TNC Template</h4>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Title">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Start Point X</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Start Point X">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Header</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="100">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Left</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="100">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Upload Template (pdf)</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" placeholder="Upload Template (pdf)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Start Point Y</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="10">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Footer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="100">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Right</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <a href="#" class="btn btn-sm btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
