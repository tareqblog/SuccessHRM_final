@extends('layouts.master')
@section('title')
    Candidate Management
@endsection
@section('page-title')
    Candidate Management
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
                        <h4 class="card-title mb-0">Candidate Table</h4>
                        <div class="text-end">
                            @if (App\Helpers\FileHelper::usr()->can('candidate.create'))
                            <a href="{{ route('candidate.create') }}" class="btn btn-sm btn-success">Create New</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>NRIC</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Last Update Date</th>
                                    <th>Job Assign</th>
                                    <th>Group</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                {{-- @dump($data) --}}
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->candidate_nric }}</td>
                                        <td>{{ $data->candidate_name }}</td>
                                        <td>{{ $data->candidate_email }}</td>
                                        <td>{{ $data->candidate_mobile }}</td>
                                        <td>{{ $data->updated_at }}</td>
                                        <td><a href="{{ route('candidate.edit', $data->id) }}"
                                                class="btn btn-success btn-sm me-3">Assigned</a></td>
                                        <td></td>
                                        <td class="text-{{\App\Enums\Status::from($data->candidate_status)->message()}}">{{\App\Enums\Status::from($data->candidate_status)->title()}}
                                        </td>
                                        {{-- <td>{{ $data->candidate_status == 1 ? 'Active' : 'In-Active' }}</td> --}}
                                        <td style="display: flex;">
                                            {{-- @if (App\Helpers\FileHelper::usr()->can('candidate.remark')) --}}
                                            <a href="" class="btn btn-info btn-sm me-2"><i class="fab fa-dyalog"></i></a>
                                            <a href="" class="btn btn-secondary btn-sm me-2">Resume</a>
                                            {{-- @endif --}}
                                            @if (App\Helpers\FileHelper::usr()->can('candidate.remark'))
                                            <a href="{{ route('candidate.edit', $data->id) }}#remark"
                                                class="btn btn-warning btn-sm me-2">Remarks</a>
                                            @endif
                                            @if (App\Helpers\FileHelper::usr()->can('candidate.update'))
                                            <a href="{{ route('candidate.edit', $data->id) }}"
                                                class="btn btn-info btn-sm me-2"><i class="fas fa-pen"></i></a>
                                            @endif
                                            @if (App\Helpers\FileHelper::usr()->can('candidate.destroy'))
                                            <form id="deleteForm" action="{{ route('candidate.destroy', $data->id) }}"
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

