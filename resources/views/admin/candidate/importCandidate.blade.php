@extends('layouts.master')
@section('title')
Import Candidate
@endsection
@section('page-title')
Show Import Data
@endsection
@section('body')
<body>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Import Applicant Table</h4>
            </div>
            <div class="card-body">
                <div class="col-lg-4">
                    <form action="">
                        <div class="row mb-4">
                            <label for="one" class="col-sm-4 col-form-label">Upload Resume (max 20 file) (Please use PDF, MicrosoftWord.docx/doc, html, xls, xlsx or txt file)</label>
                            <div class="col-sm-8">
                                <input type="file" name="resume" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-info">Import</button>
                    </form>
                </div>
                <div class="col-lg-4">
                     <input type="checkbox" > Select All
                     <textarea rows="4" class="form-control mb-3"></textarea>
                     <button type="submit" class="btn btn-sm btn-info">Save</button>
                     <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
