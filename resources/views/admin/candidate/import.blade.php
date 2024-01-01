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
                                    <form id="extractInfoForm" enctype="multipart/form-data">
                                        @csrf
                                        <ul
                                            style="list-style: none; width: 100%; height: 500px;overflow: scroll; background: #f1f1f1;">
                                            @foreach ($uploadedFiles as $file)
                                                <li class="d-flex">
                                                    <input type="checkbox" name="selectedFiles[]"
                                                        value="{{ $file }}">
                                                    @php
                                                        $parts = explode('_', $file);
                                                        $originalFilename = $parts[1];
                                                    @endphp
                                                    {{ $originalFilename }}
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
                                @if (isset($name))
                                    <h2>Extracted Information:</h2>
                                    <form>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $name }}" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ $email }}" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Phone No</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="phone_no"
                                                    class="form-control"value="{{ $phone_no }}" placeholder="Phone no">
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                            <div class="col-lg-5 card-body mt-4">
                                <div id="fileViewer"></div>
                                <div id="extractedInfoSection">
                                    <!-- Extracted information will be displayed here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <!-- Include jQuery (you can use a CDN or download it and host it locally) -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

        <script>
            // Add this script to handle the form submission via Ajax
            $(document).ready(function() {
                $('#extractInfoForm').submit(function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('extract.info') }}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            // Update the section with the extracted information
                            $('#extractedInfoSection').html(response);
                        },
                        error: function(error) {
                            console.log('Error:', error);
                        }
                    });
                });
            });
        </script>


        <script>
            // JavaScript code to load the PDF into the div
            const pdfContainer = document.getElementById('fileViewer');
            const iframe = document.createElement('iframe');

            // URL to your PDF file in Laravel (replace 'your-pdf-file-path.pdf' with the actual file path)
            const pdfUrl = "{{ isset($myPath) ? $myPath : '' }}";

            // Set iframe attributes
            iframe.src = pdfUrl;
            iframe.width = "100%";
            iframe.height = "600px"; // Set height as required

            // Append the iframe to the div
            pdfContainer.appendChild(iframe);
        </script>
    @endsection
