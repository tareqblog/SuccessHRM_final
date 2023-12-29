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
                <div class="col-lg-12">
                    <form action="{{ route('upload.files') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row mb-4">
                            <label for="one" class="col-sm-12 col-form-label">Upload Resume (max 10 file)<br/> <small>(Please use PDF, MicrosoftWord.docx/doc, html, xls, xlsx or txt file)</small></label>
                            <div class="col-sm-6">
                                <input type="file" name="files[]" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx"  multiple>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-info">Import Resume</button>
                    </form>
                </div>
                <div class="col-lg-4 card-body mt-4">
                     <input type="checkbox" > Select All
                     @if(isset($uploadedFiles) && count($uploadedFiles) > 0)
                    <h2>Uploaded Files:</h2>
                    <form action="{{ route('extract.info') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul>
                            @foreach($uploadedFiles as $file)
                                <li>
                                    <input type="checkbox" name="selectedFiles[]" value="{{ $file }}">
                                    {{ $file }}
                                </li>
                            @endforeach
                        </ul>
                        <button type="submit">Select Files</button>
                    </form>
                    
                    <div id="fileViewer"></div> <!-- This is where the file viewer will be placed -->
                @else
                    <p>No files uploaded yet.</p>
                @endif
                     <button type="submit" class="btn btn-sm btn-info">Save</button>
                     <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </div>
                <div class="col-lg-6 card-body mt-4>
                @if(isset($info) && count($info) > 0)
                    <h2>Extracted Information:</h2>
                    <form>
                        @foreach($info as $data)
                            <!-- Display extracted email, name, phone in text fields -->
                            <input type="text" name="email" value="{{ $data['email'] }}">
                            <input type="text" name="name" value="{{ $data['name'] }}">
                            <input type="text" name="phone" value="{{ $data['phone'] }}">
                            <!-- You can add more fields as per your extracted information -->
                        @endforeach
                    </form>
                @else
                    <p>No information extracted yet.</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
