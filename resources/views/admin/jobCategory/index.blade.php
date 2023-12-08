@extends('layouts.master')
@section('title')
Job Posting
@endsection
@section('page-title')
Job Posting
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
                </div>
                <div class="card-body">
                    <h6>Create Jobs Category</h6>
                    <form action="#">
                        <div class="row mb-5">
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Category Parent</label>
                                    <div class="col-sm-9">
                                        <select name="" id="" class="form-control">
                                            <option value="">Select One</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-info btn-sm">Save</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category</th>
                                        <th>Category Parent</th>
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
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Category</th>
                                        <th>Category Parent</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
