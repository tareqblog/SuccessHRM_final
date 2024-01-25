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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Import Applicant Table</h4>
                    </div>
                    <div class="card-body">
                        @if (App\Helpers\FileHelper::usr()->can('upload.files'))
                            <div class="col-lg-12">
                                <form action="{{ route('upload.files') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-12 col-form-label">Upload Resume (max 10
                                            file)<br />
                                            <small>(Please use PDF, MicrosoftWord.docx orxlsx file)</small></label>
                                        <div class="col-sm-6">
                                            <input type="file" name="files[]" class="form-control"
                                                accept=".pdf,.docx,.xlsx" multiple>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-info">Import Resume</button>
                                </form>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-3 card-body mt-4">
                                @if (isset($importData) && count($importData) > 0)
                                    <form action="{{ route('delete.uploaded.data') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <ul style="list-style: none; width: 100%; height: 500px;overflow: scroll; background: #f1f1f1;">
                                            @foreach ($importData as $key => $resume)
                                                <li class="d-flex">
                                                    @php
                                                        $parts = explode('_', $resume->resume_path);
                                                        $originalFilename = $parts[1];
                                                    @endphp

                                                    <input style="margin-bottom: 8px; margin-right: 10px" type="radio" id="selectedFile-{{$key}}" name="selectedFile" value="{{ $resume->resume_path }}">
                                                    <label for="selectedFile-{{$key}}">{{ $originalFilename }}</label>


                                                </li>
                                            @endforeach
                                        </ul>
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @else
                                    <p>No files uploaded yet.</p>
                                @endif
                            </div>

                            <div class="col-lg-4 card-body mt-4">
                                @if (isset($importData) && count($importData) > 0)
                                    <h2>Extracted Information:</h2>
                                    <form action="{{ route('temporary.data.save') }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="resume_path" name="resume_path" value="">
                                        <textarea name="resume_text" hidden></textarea>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="name" name="name" class="form-control"
                                                    value="" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="email" name="email" class="form-control"
                                                    value="" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Phone No</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="phone_no" name="phone_no" class="form-control"
                                                    value="" placeholder="Phone no" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Gender</label>
                                            <div class="col-sm-8">
                                                <select name="gender" class="form-control" id="gender">
                                                    <option value="">Select One</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Assaign To</label>
                                            <div class="col-sm-8">
                                                <select name="assaign_to" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($assaignPerson as $assaign)
                                                        <option value="{{ $assaign->id }}">{{ $assaign->employee_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" id="" class="btn btn-info">Add to list</button>
                                    </form>
                                @endif
                            </div>
                            <div class="col-lg-5 card-body mt-4">
                                {{-- <div id="fileViewer"></div> --}}
                                <iframe id="pdfViewer"></iframe>
                                <!-- Extracted information will be displayed here -->
                            </div>
                        </div>
                    </div>
                    @if ($temporary_data->isNotEmpty())
                        <div class="col-lg-11 m-auto">
                                <h4>Temporary Imported Data</h4>
                                @include('admin.candidate.inc.partial-table', ['items' => $temporary_data])
                                {{ $temporary_data->links() }}
                                <div class="text-end mb-5">
                                    <form action="{{ route('import.candidate.data', ['temporary_data' => json_encode($temporary_data)]) }}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-success">Proceed to candidate</button>
                                    </form>
                                </div>
                        </div>
                    @endif
                    <div class="col-lg-11 m-auto">
                        <form method="GET" action="{{ route('import.index') }}" id="attendanceFilter">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-sm-12 col-md-6">
                                    <h4>History Imported Data</h4>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                    <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date" value="{{ $start ?? old('start_date')}}">
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <input type="date" class="form-control" name="end_date" id="end_date" placeholder="End Date" value="{{ $end ?? old('end_date')}}">
                                </div>
                            </div>
                        </form>
                        @include('admin.candidate.inc.partial-table', ['items' => $history_data])
                        {{ $history_data->links() }}
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.3.min.js"
                    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

                <script>
                     $(document).ready(function () {
                        $('#start_date, #end_date').on('change', function () {
                            var start_date = $('#start_date').val();
                            var end_date = $('#end_date').val();

                            if (start_date > end_date) {
                                alert('Start date cannot be greater than end date');
                                return false;
                            }
                            var newUrl = "{{ route('import.index') }}?start_date=" + start_date + "&end_date=" + end_date;
                            window.location.href = newUrl;

                        });
                    });

                    $(document).ready(function() {
                        $('input[name="selectedFile"]').on('change', function() {
                            var selectedFile = $(this).val();

                            $.ajax({
                                url: "{{ route('extract.info') }}",
                                type: "POST",
                                data: {
                                    selectedFile: selectedFile,
                                    _token: '{{ csrf_token() }}'
                                },
                                // dataType: 'json',
                                success: function(result) {
                                    // console.log(result);
                                    // Update the form fields with the extracted information
                                    $('textarea[name="resume_text"]').val(result.text);
                                    $('input[name="name"]').val(result.name);
                                    $('input[name="email"]').val(result.email);
                                    $('input[name="phone_no"]').val(result.phone_no);
                                    $('input[name="resume_path"]').val(result.myPath);
                                    const iframe = document.getElementById('pdfViewer');
                                    const pdfUrl = result.myPath;
                                    iframe.src = pdfUrl;
                                    iframe.width = "100%";
                                    iframe.height = "600px"; // Set height as required

                                    // Append the iframe to the div
                                    // pdfContainer.appendChild(iframe);

                                    // $('#fileViewer').text(result.myPath);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error:', error);
                                }
                            });
                        });
                    });
                </script>
            @endsection
            @section('scripts')
                {{-- <script>
                    // JavaScript
                    document.getElementById('selectAll').addEventListener('click', function() {
                        // Get all radio buttons with the name 'selectedFiles'
                        var radioButtons = document.querySelectorAll('input[name="selectedFiles"]');

                        // Clear the selection of all radio buttons
                        radioButtons.forEach(function(radio) {
                            radio.checked = false;
                        });
                    });
                </script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('input[name="selectedFiles[]"]').on('change', function() {
                            var selectedFiles = $('input[name="selectedFiles[]"]:checked').map(function() {
                                return $(this).val();
                            }).get();

                            if (selectedFiles.length > 0) {
                                $.ajax({
                                    url: "{{ route('extract.info') }}",
                                    type: "POST",
                                    data: {
                                        selectedFiles: selectedFiles,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    dataType: 'json',
                                    success: function(result) {
                                        console.log(result);
                                        // Update the form fields with the extracted information
                                        $('input[name="name"]').val(result.name);
                                        $('input[name="email"]').val(result.email);
                                        $('input[name="phone_no"]').val(result.phone_no);
                                        $('input[name="resume_path"]').val(result.myPath);
                                        const iframe = document.getElementById('pdfViewer');
                                        const pdfUrl = result.myPath;

                                        iframe.src = pdfUrl;
                                        iframe.width = "100%";
                                        iframe.height = "600px"; // Set height as required

                                        // Append the iframe to the div
                                        // pdfContainer.appendChild(iframe);

                                        // $('#fileViewer').text(result.myPath);
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error:', error);
                                    }
                                });
                            } else {
                                // Handle the case where no file is selected
                                console.log('No file selected');
                            }
                        });
                    });
                </script> --}}
            @endsection
