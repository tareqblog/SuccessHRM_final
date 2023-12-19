@extends('layouts.master')
@section('title')
    Religion Management
@endsection
@section('page-title')
Religion Management
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
                        <h4 class="card-title mb-0">Religion Table</h4>
                        <div class="text-end">

                            <button data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-create"
                                class="btn btn-sm btn-info">Create New</button>
                        </div>
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
                        {{-- Here place table --}}

                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Religion Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($datas as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->religion_code }}</td>
                                        <td>{{ $data->religion_status == '1' ? 'Active' : 'In-Active' }}</td>
                                        <td class="d-flex">
                                            <button data-id="{{ $data->id }}" data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-lg-edit"
                                                class="btn btn-sm btn-info edit me-3"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>
                                            <form action="{{ route('religion.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this item?')"><i
                                                        class="fa-solid fa-trash"></i></button>
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


                    <!--  Create modal example -->
                    <div class="modal fade bs-example-modal-lg-create" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tncCreate">Create Religion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('religion.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Religion Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="religion_code" class="form-control"
                                                            placeholder="Title" value="{{ old('religion_code') }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Religion Description</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="religion_desc" rows="2" class="form-control" placeholder="Descriptin"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">

                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Seq No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="religion_seqno" class="form-control"
                                                            placeholder="Seq no" value="{{ old('religion_seqno') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-lg-12">
                                                <a href="#" class="btn btn-sm btn-secondary">Cancel</a>
                                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!--  Edit modal example -->
                    <div class="modal fade bs-example-modal-lg-edit" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tncCreate">Update Religion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="editSection">

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
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

        <script>
            //edit modal show and after submit
            $('body').on('click', '.edit', function() {
                var id = $(this).data('id'); //i or 2 categoryid
                $.get("/admin/religion/" + id + "/edit",
                    function(data) {
                        $('#editSection').html(data);
                    })
            });
        </script>
    @endsection