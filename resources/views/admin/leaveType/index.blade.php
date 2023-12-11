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
                    <h4 class="card-title mb-0">Leave Type Table</h4>
                    <div class="text-end">
                        <a href="{{route('leave-type.create')}}" class="btn btn-sm btn-info">Create New</a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Here place table --}}
                    <table class="table table-bordered" id="datatable1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Leave Type</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $data->leavetype_code }}</td>
                                <td>{{ $data->leavetype_desc }}</td>
                                <td>{{ $data->industry_status == 1 ? 'Active' : 'In-Active' }}</td>
                                <td class="d-flex">
                                    <a href="{{route('leave-type.edit', $data->id)}}" class="btn btn-sm btn-info me-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{route('leave-type.destroy', $data->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="50" class="text-center text-warning">No data found!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
