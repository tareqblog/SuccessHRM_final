@extends('layouts.master')
@section('title')
    Outlet
@endsection
@section('page-title')
    Outlet
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
                        <h4 class="card-title mb-0">Outlet Table</h4>
                        {{-- @if (App\Helpers\FileHelper::usr()->can('outlets.create')) --}}
                        <div class="text-end">
                            <a href="{{ route('outlets.create') }}" class="btn btn-sm btn-success">Create new</a>
                        </div>
                        {{-- @endif --}}
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">

                        <table class="table table-bordered mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Company Name</th>
                                    <th>Country</th>
                                    <th>Tel No</th>
                                    <th>Website</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->outlet_name }}</td>
                                        <td>{{ $data->nationality->en_country_name }}</td>
                                        <td>{{ $data->outlet_tel }}</td>
                                        <td>{{ $data->outlet_website }}</td>
                                        <td>{{ $data->outlet_description }}</td>
                                        <td style="display: flex;">
                                            {{-- @if (App\Helpers\FileHelper::usr()->can('outlets.edit')) --}}
                                            <a href="{{route('outlets.edit', $data->id)}}" class="btn btn-sm btn-info me-2"><i class="fa fa-pen"></i></a>
                                            {{-- @endif
                                            @if (App\Helpers\FileHelper::usr()->can('outlets.destroy')) --}}
                                            <form id="deleteForm" action="{{ route('outlets.destroy', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this item?')"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </form>
                                            {{-- @endif --}}
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
