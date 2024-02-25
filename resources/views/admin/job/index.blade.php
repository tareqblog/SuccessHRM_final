@extends('layouts.master')
@section('title')
    Job Management
@endsection
@section('page-title')
    Job Management
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight">
                                {{-- <h6 class="card-title mb-0">Job Summary Table</h6> --}}
                            </div>
                            <div class="p-2 bd-highlight">
                                @if (App\Helpers\FileHelper::usr()->can('job.create'))
                                    <a href="{{ route('job.create') }}" class="btn btn-sm btn-success">Create New</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Owner</th>
                                    <th>Status</th>
                                    <th>Job Type</th>
                                    <th>Create Date</th>
                                    <th>Last Updated By</th>
                                    <th style="width:100px">Internal Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>
                                            {{ $data->job_title }}
                                        </td>
                                        <td>
                                            {{ $data->job_category->jobcategory_name }}
                                        </td>
                                        <td>
                                            {{ $data->client->client_name }}
                                        </td>
                                        <td>
                                            {{ $data->job_status == 1 ? 'Active' : 'Close' }}
                                        </td>
                                        <td>
                                            {{ $data?->job_type?->jobtype_code }}
                                        </td>
                                        <td>
                                            {{ $data->created_at }}
                                        </td>
                                        <td>
                                            {{ App\Helpers\FileHelper::modify_name($data->modify_by) }}
                                        </td>
                                        <td>
                                            {!! $data->remark !!}
                                        </td>
                                        <td style="display: flex;">
                                            @if (App\Helpers\FileHelper::usr()->can('job.edit'))
                                            <a href="{{ route('job.edit', $data->id) }}"
                                                class="btn btn-info btn-sm me-3"><i class="fas fa-pen"></i></a>
                                            @endif
                                            @if (App\Helpers\FileHelper::usr()->can('job.destroy'))
                                            <form id="deleteForm" action="{{ route('job.destroy', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this item?')"
                                                    class="btn btn-sm btn-danger"> <i class="fas fa fa-trash"></i> </a>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    @endsection
