@extends('layouts.master')
@section('title')
    Client Management
@endsection
@section('page-title')
    Client Management
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
                        <h4 class="card-title mb-0">Client Table</h4>
                        @if (App\Helpers\FileHelper::usr()->can('clients.create'))
                            <div class="text-end">
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target=".bs-example-modal-lg-create">Import</button>
                                <a href="{{ route('clients.create') }}" class="btn btn-sm btn-success">Create New</a>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0 bg-light" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Client Name</th>
                                    <th>Account Holder</th>
                                    <th>Industry</th>
                                    <th>Status</th>
                                    <th>Payroll PIC</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->client_name }}</td>
                                        <td>
                                            @if ($data->employees_id)
                                                {{ $data->Employee->employee_code }}
                                            @endif
                                        </td>
                                        <td>{{ $data->industry_type?->industry_code }}</td>
                                        <td>{{ $data->clients_status == 1 ? 'Active' : 'In-Active' }}</td>

                                        <td>
                                            @if ($data->payroll_employees_id)
                                                {{ $data->Employee_Payroll->employee_code }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->latestFollowUp()?->description)
                                                <u>{{ $data->latestFollowUp()->created_at }}</u><br />
                                                {!! $data->latestFollowUp()->description !!}
                                            @endif
                                        </td>
                                        <td style="display: flex;">
                                            @if (App\Helpers\FileHelper::usr()->can('client.file.upload'))
                                                <a href="{{ route('clients.edit', $data->id) }}#upload_file"
                                                    class="btn btn-secondary btn-sm me-3">Upload File</a>
                                            @endif

                                            @if (App\Helpers\FileHelper::usr()->can('client.followup'))
                                                <a href="{{ route('clients.edit', $data->id) }}#follow_up"
                                                    class="btn btn-warning btn-sm me-3">Follow Up</a>
                                            @endif

                                            @if (App\Helpers\FileHelper::usr()->can('clients.edit'))
                                                <a href="{{ route('clients.edit', $data->id) }}"
                                                    class="btn btn-info btn-sm me-3"><i class="fas fa-pen"></i></a>
                                            @endif

                                            @if (App\Helpers\FileHelper::usr()->can('clients.destroy'))
                                                <form id="deleteForm" action="{{ route('clients.destroy', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this item?')"
                                                        class="btn btn-sm btn-danger"><i class="fas fa fa-trash"></i></a>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    {{-- empty data --}}
                                    <tr>
                                        <td class="text-center text-warning" colspan="5">
                                            No data found!
                                        </td>
                                    </tr>
                                    {{-- empty data --}}
                                @endforelse


                            </tbody>
                        </table>

                            <!--  Create modal example -->
                            <div class="modal fade bs-example-modal-lg-create" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myLargeModalLabel">Import Candidate</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('client.import')}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="row mb-4">
                                                            <label for="one" class="col-sm-4 col-form-label">Import Candidate</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="client_import_file" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <button type="button"  data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                            class="btn btn-sm btn-secondary me-3">Cancel</a>
                                                        <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
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
