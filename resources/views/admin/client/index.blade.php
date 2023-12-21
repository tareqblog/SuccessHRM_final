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
                        <div class="text-end">
                            <a href="{{ route('clients.create') }}" class="btn btn-sm btn-success">Create New</a>
                        </div>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->client_name }}</td>
                                        <td>
                                            @if ($data->employee_id)
                                                {{ $data->Employee->employee_code }}
                                            @endif
                                        </td>
                                        <td>{{ $data->industry_type->industry_code }}</td>
                                        <td>{{ $data->clients_status == 1 ? 'Active' : 'In-Active' }}</td>

                                        <td>
                                            @if ($data->payroll_employees_id)
                                                {{ $data->Employee_Payroll->employee_code }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->latestFollowUp()->description)
                                                <u>{{ $data->latestFollowUp()->created_at }}</u><br />
                                                {!! $data->latestFollowUp()->description !!}
                                            @endif
                                        </td>
                                        <td style="display: flex;">
                                            <a href="{{ route('clients.edit', $data->id) }}#upload_file"
                                                class="btn btn-secondary btn-sm me-3">Upload File</a>

                                            <a href="{{ route('clients.edit', $data->id) }}#follow_up"
                                                class="btn btn-warning btn-sm me-3">Follow Up</a>

                                            <a href="{{ route('clients.edit', $data->id) }}"
                                                class="btn btn-info btn-sm me-3"><i class="fas fa-pen"></i></a>

                                            <form id="deleteForm" action="{{ route('clients.destroy', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this item?')"
                                                    class="btn btn-sm btn-danger"><i class="fas fa fa-trash"></i></a>
                                            </form>
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
