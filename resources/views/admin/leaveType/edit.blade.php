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
                    <h4 class="card-title mb-0">Update Leave Type</h4>
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
                    <form action="{{route('leave-type.update', $leave_type->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Leave Type Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="leavetype_code" placeholder="Leave Type Code" value="{{$leave_type->leavetype_code}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Default Leave Days</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="leavetype_default" placeholder="Default Leave Days" value="{{$leave_type->leavetype_default}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="industry_status" id="" class="form-control">
                                            <option value="1" {{$leave_type->industry_status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$leave_type->industry_status == 0 ? 'selected' : ''}}>In-Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Seq No</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="industry_seqno" class="form-control" value="{{$leave_type->industry_seqno}}" placeholder="Seq No">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Block Candidate</label>
                                    <div class="col-sm-9">
                                        <select name="leavetype_block" id="" class="form-control">
                                            <option value="1"{{$leave_type->leavetype_block == 1 ? 'selected' : ''}}>Yes</option>
                                            <option value="0"{{$leave_type->leavetype_block == 0 ? 'selected' : ''}}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="leavetype_desc" rows="2" placeholder="Description" class="form-control"> {{$leave_type->leavetype_desc}} </textarea>
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
