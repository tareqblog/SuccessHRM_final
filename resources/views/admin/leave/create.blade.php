@extends('layouts.master')
@section('title')
    Leave Management
@endsection
@section('page-title')
    Leave Management
@endsection
@section('body')

    <body>
    @endsection
    @section('css')
        <!-- quill css -->
        <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Create Leave</h4>
                        <div class="text-end">
                            <a href="{{ route('leave.index') }}" class="btn btn-sm btn-success">Search</a>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <form action="{{ route('leave.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 row">
                                    <div class="row mb-4 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Group</label>
                                        <div class="col-sm-9">
                                            <select name="leave_empl_type" id="leave_empl_type" class="form-control">
                                                <option value="">Select One</option>
                                                <option value="0">Candidate</option>
                                                <option value="1">Employee</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Employee Name</label>
                                        <div class="col-sm-9">
                                            <select name="employees_id" id="employees_id" class="form-control">
                                                <option value="">Select One</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}">
                                                        {{ $employee->employee_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Type of Leave</label>
                                        <div class="col-sm-9">
                                            <select name="leave_types_id" class="form-control">
                                                <option value="">Select One</option>
                                                @foreach ($leaveType as $type)
                                                    <option value="{{ $type->id }}">
                                                        {{ $type->leavetype_code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Leave Duration</label>
                                        <div class="col-sm-9">
                                            <select name="leave_duration" class="form-control">
                                                <option value="Full Day Leave" {{ old('leave_duration') }}>Full
                                                    Day Leave</option>
                                                <option value="Half Day AM" {{ old('leave_duration') }}>Half
                                                    Day
                                                    AM</option>
                                                <option value="Half Day PM" {{ old('leave_duration') }}>Half
                                                    Day
                                                    PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Date (From)</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="leave_datefrom" class="form-control"
                                                placeholder="Date (From)" value="{{ old('leave_datefrom') }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Date (To)</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="leave_dateto"
                                                placeholder="Date (To)" value="{{ old('leave_dateto') }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Total Days</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Total Days"
                                                name="leave_total_day" value="{{ old('leave_total_day') }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Upload File</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" placeholder="Upload File"
                                                name="leave_file_path">

                                        </div>
                                    </div>
                                    <div class="row mb-4 col-lg-6">
                                        <label for="one" class="col-sm-3 col-form-label">Remarks</label>
                                        <div class="col-sm-9">
                                            <textarea rows="2" name="leave_reason" class="form-control" placeholder="Remarks"> {{ old('leave_reason') }} </textarea>
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
        <!-- ckeditor -->
        <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
        <script>
            function job_link() {
                // Get the text field
                var copyText = document.getElementById("job_link");

                // Select the text field
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(copyText.value);

                // Alert the copied text
                //   alert("Copied the text: " + copyText.value);
            }
        </script>
        <!-- <script type="text/javascript">
        $(document).ready(function () {
            $('#leave_empl_type').on('change', function () {
                var empName = this.value;
                
                $("#employees_id").html('');
                $.ajax({
                    url: "{{route('leave.searchapi')}}",
                    type: "POST",
                    data: {
                        type: empName,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $.each(result.id, function (key, value) {
                            $("#email").val(value.employee_email);
                        });
                    }
                });
            });
             });
  </script> -->
    @endsection
