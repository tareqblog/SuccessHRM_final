@extends('layouts.master')
@section('title')
    Leave Management
@endsection
@section('page-title')
    Leave Management
@endsection
@section('css')
    <!-- quill css -->
    <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
        @include('admin.include.select2')
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <h6 class="card-title mb-0">Update Leave</h6>
                            </div>
                            <div class="p-2 bd-highlight">
                                <a href="{{ route('leave.create') }}" class="btn btn-sm btn-success">Create New</a>
                                <a href="{{ route('leave.index') }}" class="btn btn-sm btn-success">Search</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <form action="{{ route('leave.update', $leave->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="row">
                                <div class="col-lg-12 row">
                                    <div class="row mb-1 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Group</label>
                                        <div class="col-sm-9">
                                            <select id="leave_empl_type" name="leave_empl_type" class="form-control single-select-field" disabled>
                                            <option value="0" {{ $leave->leave_empl_type == 0 ? 'selected' : '' }}>Candidate</option>
                                                <option value="1" {{ $leave->leave_empl_type == 1 ? 'selected' : '' }}>
                                                    Employee</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-1 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Employee Name</label>
                                        <div class="col-sm-9">
                                            <select name="employees_id" id="employees_id" class="form-control single-select-field">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-1 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Type of Leave</label>
                                        <div class="col-sm-9">
                                            <select name="leave_types_id" class="form-control single-select-field">
                                                <option value="">Select One</option>
                                                @foreach ($leaveType as $type)
                                                    <option value="{{ $type->id }}"
                                                        {{ old('leave_types_id',$leave->leave_types_id) == $type->id ? 'selected' : '' }}>
                                                        {{ $type->leavetype_code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-1 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Leave Duration</label>
                                        <div class="col-sm-9">
                                            <select name="leave_duration" class="form-control single-select-field">
                                                <option value="Full Day Leave"
                                                    {{ old('leave_duration',$leave->leave_duration) == 'Full Day Leave' ? 'selected' : '' }}>Full
                                                    Day Leave</option>
                                                <option value="Half Day AM"
                                                    {{ old('leave_duration',$leave->leave_duration) == 'Half Day AM' ? 'selected' : '' }}>Half
                                                    Day
                                                    AM</option>
                                                <option value="Half Day PM"
                                                    {{ old('leave_duration',$leave->leave_duration) == 'Half Day PM' ? 'selected' : '' }}>Half
                                                    Day
                                                    PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-1 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Date (From)</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="leave_datefrom" class="form-control"
                                                placeholder="Date (From)" value="{{ $leave->leave_datefrom }}">
                                        </div>
                                    </div>
                                    <div class="row mb-1 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Date (To)</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="leave_dateto"
                                                placeholder="Date (To)" value="{{ $leave->leave_dateto }}">
                                        </div>
                                    </div>
                                    <div class="row mb-1 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Total Days</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Total Hours"
                                                name="leave_total_day" value="{{ $leave->leave_total_day }}">
                                        </div>
                                    </div>
                                    <div class="row mb-1 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Upload File</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" placeholder="Upload File"
                                                name="leave_file_path">

                                                @if ($leave->leave_file_path)
                                                <a href="{{ asset('storage') }}/{{ $leave->leave_file_path }}"
                                                    target="_blank">
                                                    <i class="fas fa fa-eye"></i>
                                                </a>
                                                @endif

                                        </div>
                                    </div>
                                    <div class="row mb-1 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Remarks</label>
                                        <div class="col-sm-9">
                                            <textarea rows="2" name="leave_reason" class="form-control" placeholder="Remarks"> {{ $leave->leave_reason }} </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{ route('leave.index') }}" class="btn btn-sm btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        @include('admin.include.select2js')
        <!-- ckeditor -->
        <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
        <script>
            function job_link() {
                // Get the text field
                var copyText = document.getElementById("job_link");
                copyText.select();
                copyText.setSelectionRange(0, 99999);

                navigator.clipboard.writeText(copyText.value);
            }

            $(document).ready(function() {
                $('#leave_empl_type').trigger('change');
                $('#leave_empl_type').change(function() {
                    var selectedGroupType = $(this).val();

                    // Check if a group type is selected
                    if (selectedGroupType == 1) {
                        if (selectedGroupType) {
                            $.ajax({
                                type: 'GET',
                                url: '/ATS/leave/get/employee/' + selectedGroupType,
                                success: function(response) {
                                    updateEmployee(response);
                                },
                                error: function(error) {
                                    console.error('Error fetching employee data:', error);
                                    $('#employees_id').empty();
                                    $('#employees_id').append(
                                        '<option value="" disabled selected>No Employee Available</option>'
                                    );
                                }
                            });
                        } else {
                            // If no group type is selected, clear the employees dropdown
                            $('#employees_id').empty();
                            $('#employees_id').append(
                                '<option value="" disabled selected>Select a Group Type first</option>');
                        }
                    } else if (selectedGroupType == 0) {
                        if (selectedGroupType) {
                            $.ajax({
                                type: 'GET',
                                url: '/ATS/leave/get/candidate/' + selectedGroupType,
                                success: function(response) {
                                    updateCandidate(response);
                                },
                                error: function(error) {
                                    console.error('Error fetching candidate data:', error);
                                    $('#candidate_id').empty();
                                    $('#candidate_id').append(
                                        '<option value="" disabled selected>No Candidate Available</option>'
                                    );
                                }
                            });
                        } else {
                           $('#candidate_id').empty();
                            $('#candidate_id').append(
                                '<option value="" disabled selected>Select a Group Type first</option>');
                        }
                    }
                });

                function updateEmployee(response) {
                    let selected_employe_id = {{ $leave->employees_id ?? 0 }};
                    $('#employees_id').empty();
                    response.employees.forEach(function(employee) {
                        $('#employees_id').append($('<option>', {
                            value: employee.id,
                            text: employee.employee_name,
                            selected: employee.id == selected_employe_id
                        }));
                    });
                }

                function updateCandidate(response) {
                let selected_candidate_id = {{ $leave->candidate_id ?? 0 }};
                    $('#employees_id').empty();
                    console.log(response);
                    response.candidates.forEach(function(candidate) {
                        $('#employees_id').append($('<option>', {
                            value: candidate.id,
                            text: candidate.candidate_name,
                            selected: candidate.id == selected_candidate_id
                        }));
                    });
                }
                $('#leave_empl_type').trigger('change');
            });

            $(document).ready(function(){
                $(document).on('change', '#dateFrom', function(){
                    var value2=$('#dateFrom').val();
                    $('#dateTo').attr('min', value2);
                    $('#dateTo').prop("disabled", false);
                    $('.end').prop("disabled", false);
                });
            });
        </script>
    @endsection
