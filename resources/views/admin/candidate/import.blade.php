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
                                    <label for="one" class="col-sm-12 col-form-label">Upload Resume (max 10 file)<br />
                                        <small>(Please use PDF, MicrosoftWord.docx/doc, html, xls, xlsx or txt
                                            file)</small></label>
                                    <div class="col-sm-6">
                                        <input type="file" name="files[]" class="form-control"
                                            accept=".pdf,.doc,.docx,.xls,.xlsx" multiple>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-info">Import Resume</button>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 card-body mt-4">
                                <input type="checkbox"> Select All
                                @if (isset($uploadedFiles) && count($uploadedFiles) > 0)
                                    <form action="{{ route('extract.info') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <ul
                                            style="list-style: none; width: 100%; height: 500px;overflow: scroll; background: #f1f1f1;">
                                            @foreach ($uploadedFiles as $file)
                                                <li class="d-flex">
                                                    <input type="checkbox" name="selectedFiles[]"
                                                        value="{{ $file }}">
                                                    {{ $file }}
                                                </li>
                                            @endforeach
                                        </ul>
                                        {{-- <button type="submit">Select Files</button> --}}
                                        <button type="submit" class="btn btn-sm btn-info">Save</button>
                                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @else
                                    <p>No files uploaded yet.</p>
                                @endif
                            </div>

                            <div class="col-lg-4 card-body mt-4">
                                <h2>Extracted Information:</h2>
                                <form>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-4 col-form-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control" value="" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-4 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="email" class="form-control" value="" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-4 col-form-label">Phone No</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="phone_no" class="form-control"value="" placeholder="Phone no">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 card-body mt-4">
                                @if (isset($name))
                                    <div id="myDiv">{{ $myPath }}</div>
                                    <h2>Extracted Information:</h2>
                                    <div class="card">
                                        <form>
                                            {{-- @foreach ($info as $data) --}}
                                            <!-- Display extracted email, name, phone in text fields -->
                                            <input class="form-control" type="text" name="email"
                                                value="{{ $name }}">
                                            <input class="form-control" type="text" name="name"
                                                value="{{ $email }}">
                                            <input class="form-control" type="text" name="phone"
                                                value="{{ $phone_no }}">
                                            <!-- You can add more fields as per your extracted information -->
                                            {{-- @endforeach --}}
                                        </form>
                                    </div>
                                @else
                                    <p>No information extracted yet.</p>
                                @endif
                            </div>
                            <div class="col-lg-5 card-body mt-4">
                                <div id="fileViewer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            // JavaScript code to load the PDF into the div
            const pdfContainer = document.getElementById('fileViewer');
            const iframe = document.createElement('iframe');

            // URL to your PDF file in Laravel (replace 'your-pdf-file-path.pdf' with the actual file path)
            const pdfUrl = "{{ isset($myPath) }}";

            // Set iframe attributes
            iframe.src = pdfUrl;
            iframe.width = "100%";
            iframe.height = "600px"; // Set height as required

            // Append the iframe to the div
            pdfContainer.appendChild(iframe);
        </script>
    @endsection
