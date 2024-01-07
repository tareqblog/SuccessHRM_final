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
                                        <small>(Please use PDF, MicrosoftWord.docx orxlsx file)</small></label>
                                    <div class="col-sm-6">
                                        <input type="file" name="files[]" class="form-control"
                                            accept=".pdf,.docx,.xlsx" multiple>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-info">Import Resume</button>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 card-body mt-4">
                                <input type="checkbox" id="selectAll"> Select All
                                @if (isset($importData) && count($importData) > 0)
                                    <form action="{{ route('delete.uploaded.data') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <ul
                                            style="list-style: none; width: 100%; height: 500px;overflow: scroll; background: #f1f1f1;">
                                            @foreach ($importData as $resume)
                                                <li class="d-flex">
                                                    <input type="radio" name="selectedFiles[]"
                                                        value="{{ $resume->resume_path }}">
                                                    <input type="hidden" name="itemIds[]" value="{{ $resume->id }}">
                                                    @php
                                                        $parts = explode('_', $resume->resume_path);
                                                        $originalFilename = $parts[1];
                                                    @endphp
                                                    {{ $originalFilename }}
                                                </li>
                                            @endforeach
                                        </ul>
                                        {{-- <button type="submit">Select Files</button> --}}
                                        {{-- <button type="submit" class="btn btn-sm btn-info">Save</button> --}}
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @else
                                    <p>No files uploaded yet.</p>
                                @endif
                            </div>

                            <div class="col-lg-4 card-body mt-4">
                                {{-- @if (isset($name))
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
                            <input type="text" name="email" class="form-control" value="{{ $email }}"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="one" class="col-sm-4 col-form-label">Phone No</label>
                        <div class="col-sm-8">
                            <input type="text" name="phone_no" class="form-control" value="{{ $phone_no }}"
                                placeholder="Phone no">
                        </div>
                    </div>
                    </form>
                    @endif --}}
                                <h2>Extracted Information:</h2>
                                <form action="{{ route('temporary.data.save') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="resume_path" name="resume_path" value="">
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
                                            <input type="text" id="gender" name="gender" class="form-control"
                                                value="" placeholder="Gender" required>
                                        </div>
                                    </div>
                                    <button type="submit" id="" class="btn btn-info">Add to list</button>
                                </form>
                            </div>
                            <div class="col-lg-5 card-body mt-4">
                                {{-- <div id="fileViewer"></div> --}}
                                <iframe id="pdfViewer"></iframe>
                                <!-- Extracted information will be displayed here -->
                            </div>
                        </div>
                    </div>
                    @if (isset($temporary_data))
                        <div class="col-lg-11 m-auto">
                            <table class="table table-bordered dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Resume</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($temporary_data as $data)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->phone_no }}</td>
                                            <td><a target="_blank" href="{{ asset('storage') }}/{{ $data->resume_path }}"
                                                    class="btn btn-info"><i class="fa fa-eye"></i></a></td>
                                            <td>
                                                <form action="{{ route('temporary.data.delete', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-end mb-5">
                                <form
                                    action="{{ route('import.candidate.data', ['temporary_data' => json_encode($temporary_data)]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Proceed to candidate</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            @endsection
            @section('scripts')
            <script>
                // JavaScript
                document.getElementById('selectAll').addEventListener('click', function () {
                    // Get all radio buttons with the name 'selectedFiles'
                    var radioButtons = document.querySelectorAll('input[name="selectedFiles"]');

                    // Clear the selection of all radio buttons
                    radioButtons.forEach(function (radio) {
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
                                        $('input[name="gender"]').val(result.gender);
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
                </script>
            @endsection
