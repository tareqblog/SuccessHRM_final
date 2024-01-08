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
                        <h4 class="card-title mb-0">Job Summary Table</h4>
                        <div class="text-end">
                            <a href="{{ route('job.create') }}" class="btn btn-sm btn-success">Create New</a>
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
                                @forelse ($datas as $data)
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
                                            {{ $data->owner->name }}
                                        </td>
                                        <td>
                                            {{ $data->job_status == 1 ? 'Active' : 'Close' }}
                                        </td>
                                        <td>
                                            {{ $data?->job_type?->jobtype_code }}
                                        </td>
                                        <td>
                                            {{ $data->created_at->format('d-M-Y') }}
                                        </td>
                                        <td>
                                            {{ App\Helpers\FileHelper::modify_name($data->modify_by) }}
                                        </td>
                                        <td>
                                            {!! $data->remark !!}
                                        </td>
                                        <td style="display: flex;">
                                            <a href="{{ route('job.edit', $data->id) }}"
                                                class="btn btn-info btn-sm me-3"><i class="fas fa-pen"></i></a>
                                            <form id="deleteForm" action="{{ route('job.destroy', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this item?')"
                                                    class="btn btn-sm btn-danger"> <i class="fas fa fa-trash"></i> </a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty

                                    <tr>
                                        <td colspan="50" class="text-center text-warning">
                                            No Data found!
                                        </td>
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
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    @endsection
