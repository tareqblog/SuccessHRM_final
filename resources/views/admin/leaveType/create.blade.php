@extends('layouts.master')
@section('title')
Leave Type Management
@endsection
@section('page-title')
Leave Type Management
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Create New Leave Type</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('leave-type.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Leave Type Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="leavetype_code" class="form-control" placeholder="Leave Type Code">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Default Leave Days</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="leavetype_default" class="form-control" placeholder="Default Leave Days">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="industry_status" id="" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">In-Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Seq No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="industry_seqno" placeholder="Seq No">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Block Candidate</label>
                                    <div class="col-sm-9">
                                        <select name="leavetype_block" id="" class="form-control">
                                            <option value="">Select One</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="leavetype_desc" rows="2" placeholder="Description" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{route('leave-type.index')}}" class="btn btn-sm btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
