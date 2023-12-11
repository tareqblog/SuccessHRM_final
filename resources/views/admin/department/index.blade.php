@extends('layouts.master')
@section('title')
Department Management
@endsection
@section('page-title')
Department Management
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/css/datatables.min.css') }}">
@endsection
@section('body')
<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Department Table</h4>
                    <div class="text-end">
                        <a href="{{route('department.create')}}" class="btn btn-sm btn-info">Create New</a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Here place table --}}
                    <table class="table table-bordered" id="datatable1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Department Code</th>
                                <th>Description</th>
                                <th>Seq No</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $data->department_code }}</td>
                                <td>{{ $data->department_desc }}</td>
                                <td>{{ $data->department_seqno }}</td>
                                <td>{{ $data->department_status == '1' ? 'Active' : 'In-Active' }}</td>
                                <td class="d-flex">
                                    <a href="{{route('department.edit', $data->id)}}" class="btn btn-sm btn-info me-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{route('department.destroy', $data->id)}}" method="POST">
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
    @section('scripts')
        <script src="{{URL::asset('build/css/datatables.min.css')}}"></script>
        <script>
            let table = new DataTable('#tables');
        </script>
    @endsection
