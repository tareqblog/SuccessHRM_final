@extends('layouts.master')
@section('title')
    Import Candidate
@endsection
@section('page-title')
    Show Import Data
@endsection
@section('css')
    @include('admin.include.select2')
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
                        <h4 class="card-title ms-3 mt-2">Import Applicant Table</h4>
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
                                        <ul
                                            style="list-style: none; width: 100%; height: 500px;overflow: scroll; background: #f1f1f1;">
                                            @foreach ($importData as $key => $resume)
                                                <li class="d-flex">
                                                    @php
                                                        $parts = explode('_', $resume->resume_path);
                                                        $originalFilename = $parts[1];
                                                    @endphp

                                                    <input style="margin-bottom: 8px; margin-right: 10px" type="radio"
                                                        id="selectedFile-{{ $key }}" name="selectedFile"
                                                        value="{{ $resume->resume_path }}">
                                                    <label
                                                        for="selectedFile-{{ $key }}">{{ $originalFilename }}</label>
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
                                            <label for="one" class="col-sm-4 col-form-label">Name<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" id="name" name="name" class="form-control"
                                                    value="" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Email<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" id="email" name="email" class="form-control"
                                                    value="" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Phone No<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" id="phone_no" name="phone_no" class="form-control"
                                                    value="" placeholder="Phone no" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Gender</label>
                                            <div class="col-sm-8">
                                                <select name="gender" class="form-control single-select-field" id="gender">
                                                    <option value="">Select One</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        @php
                                            $auth = Auth::user()->employe;
                                        @endphp
                                        @if($auth->roles_id != 8)
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-4 col-form-label">Assaign To<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <select name="assaign_to" required class="form-control single-select-field">
                                                    <option value="">Select One</option>
                                                    @foreach ($assaignPerson as $assaign)
                                                        <option value="{{ $assaign->id }}">{{ $assaign->employee_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @else
                                            <input type="hidden" name="assaign_to" value="{{ $auth->id }}">
                                        @endif
                                        <button type="submit" id="" class="btn btn-info btn-sm">Add to list</button>
                                    </form>
                                @endif
                            </div>
                            <div class="col-lg-5 card-body mt-4">
                                <iframe id="pdfViewer"></iframe>
                            </div>
                        </div>
                    </div>
                    @if ($temporary_data->isNotEmpty())
                        <div class="col-lg-12 px-2">
                            <h4>Temporary Imported Data</h4>
                            @include('admin.candidate.inc.partial-table', ['items' => $temporary_data])
                            {{ $temporary_data->links() }}
                            <div class="text-end mb-5">
                                <form
                                    action="{{ route('import.candidate.data') }}"
                                    method="POST">
                                    @csrf
                                        <input type="hidden" name="temporary_data" value="{{json_encode($temporary_data)}}">
                                    <button type="submit" class="btn btn-success btn-sm">Proceed to candidate</button>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-12 px-2">
                        <form method="GET" action="{{ route('import.index') }}" id="attendanceFilter">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-sm-12 col-md-6">
                                    <h4>History Imported Data</h4>
                                </div>
                                <div class="col-sm-12 col-md-6 row">
                                    <div class="col-sm-12 col-md-3 text-end">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        @include('admin.partials.daterang')
                                    </div>
                                    <div class="col-sm-12 col-md-3 text-end">
                                        <button onclick="filterHistoryImport(event)" class="btn btn-info btn-sm py-2" type="submit">Filter Data</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @include('admin.candidate.inc.partial-table', ['items' => $history_data])
                        {{ $history_data->links() }}
                    </div>
                </div>
            @endsection

            @section('scripts')
                <script src="https://code.jquery.com/jquery-3.6.3.min.js"
                    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
                @include('admin.include.select2js')
                <script>
                    function filterHistoryImport(event) {
                        event.preventDefault();
                        let daterange = document.getElementById('daterangeInput').value;
                        let newUrl = "{{ route('import.index') }}?daterange=" + encodeURIComponent(daterange);
                        window.location.href = newUrl;
                    }

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
                                success: function(result) {

                                    // Clear all input values
                                    $('input[name="name"]').val('');
                                    $('input[name="email"]').val('');
                                    $('input[name="phone_no"]').val('');
                                    $('input[name="resume_path"]').val('');
                                    $('textarea[name="resume_text"]').val('');
                                    console.log(result);

                                    // Iterate over each field in the result object
                                    for (const field in result) {
                                        if (result[field].includes("not found")) {
                                            // If the field value contains "not found", set placeholder
                                            $(`input[name="${field}"], textarea[name="${field}"]`).attr(
                                                'placeholder', result[field]);
                                        } else {
                                            // Otherwise, set the field value
                                            $(`input[name="${field}"], textarea[name="${field}"]`).val(
                                                result[field]);
                                        }
                                    }

                                    // Set resume path separately
                                    $('input[name="resume_path"]').val(result.myPath);

                                    const iframe = document.getElementById('pdfViewer');
                                    const pdfUrl = result.myPath;
                                    iframe.src = pdfUrl;
                                    iframe.width = "100%";
                                    iframe.height = "600px";
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error:', error);
                                }
                            });
                        });
                    });
                </script>
            @endsection
