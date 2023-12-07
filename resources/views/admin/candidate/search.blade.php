@extends('layouts.master')
@section('title')
Search Function
@endsection
@section('page-title')
Search Candidate Detail
@endsection
@section('body')
<body>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Search Table</h4>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Keyword</label>
                                <div class="col-sm-9">
                                    <input type="text" name="Keyword" class="form-control" placeholder="Keyword">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Grouping</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Keyword</label>
                                <div class="col-sm-9"><input type="text" name="daterange" value="01/01/2018 - 01/15/2018" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Existing Folder</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Create New</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-5 text-center">
                            <button type="submit" class="btn btn-info btn-sm">Search</button>
                            <button type="submit" class="btn btn-warning btn-sm">Save to Profile</button>
                            <button type="submit" class="btn btn-success btn-sm">Save All</button>
                        </div>

                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Candidate</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Resume Detail</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Candidate</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Resume Detail</th>
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
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(function() {
          $('input[name="daterange"]').daterangepicker({
            opens: 'left'
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
          });
        });
    </script>
@endsection
