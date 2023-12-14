@extends('layouts.master')
@section('title')
    Job Posting
@endsection
@section('page-title')
    Job Posting
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
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target=".bs-example-modal-lg-create">Create new</button>
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
                        <h6>Create Jobs Category</h6>
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <table class="table table-bordered mb-0" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category Name</th>
                                            <th>Category Parent</th>
                                            <th>Category Seq No</th>
                                            <th>Category Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="50" class="text-center text-warning">
                                                No Data found!
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--  Create modal example -->
                            <div class="modal fade bs-example-modal-lg-create" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myLargeModalLabel">Create Leave Type</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('job-category.store') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="row mb-4">
                                                            <label for="one" class="col-sm-3 col-form-label">Category
                                                                Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="leavetype_code"
                                                                    class="form-control" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="one" class="col-sm-3 col-form-label">Category
                                                                Parent</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="jobcategory_parent"
                                                                    class="form-control" placeholder="Default Leave Days">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="one" class="col-sm-3 col-form-label">Seq
                                                                No</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    name="industry_seqno" placeholder="Seq No">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row mb-4">
                                                            <label for="one" class="col-sm-3 col-form-label">Block
                                                                Candidate</label>
                                                            <div class="col-sm-9">
                                                                <select name="leavetype_block" id=""
                                                                    class="form-control">
                                                                    <option value="">Select One</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="0">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="one"
                                                                class="col-sm-3 col-form-label">Description</label>
                                                            <div class="col-sm-9">
                                                                <textarea name="leavetype_desc" rows="2" placeholder="Description" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <a href="{{ route('leave-type.index') }}"
                                                            class="btn btn-sm btn-secondary">Cancel</a>
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
                                            <h5 class="modal-title" id="myLargeModalLabel">Update Department</h5>
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
                $.get("leave-type/" + id + "/edit",
                    function(data) {
                        $('#editSection').html(data);
                    })
            });
        </script>
    @endsection
