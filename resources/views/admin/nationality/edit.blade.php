@extends('layouts.master')
@section('title')
Department Management
@endsection
@section('page-title')
Department Management
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Update Nationality</h4>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Nationality Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Department Code">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Seq No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Seq No">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="" id="" class="form-control">
                                            <option value="">Active</option>
                                            <option value="">In-Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="" rows="2" class="form-control" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
