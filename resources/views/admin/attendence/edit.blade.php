@extends('layouts.master')
@section('title')
    Attendence
@endsection
@section('page-title')
    Attendence
@endsection
@section('css')
    <!-- choices css -->
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('body')
    <body>
    @endsection
        @include('admin.attendence.inc.included_js_css')
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Attendence</h4>
                    </div>

                    <div class="card-body" style="overflow-x: hidden;">
                        <!-- Nav tabs -->
                        <div class="row">
                            <div class="col-lg-1">
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#General" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Attendence</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="General" role="tabpanel">
                                <div class="row">
                                    <div class="row col-lg-6 mb-4">
                                        <label for="thirteen" class="col-sm-3 col-form-label">Select Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="date" id="dateInput" class="form-control"
                                                value="{{$parent->month_year}}" required>
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="eleven" class="col-sm-3 col-form-label">Candidate</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{$parent->candidate->candidate_name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="eleven" class="col-sm-3 col-form-label">Company</label>
                                        <div class="col-sm-9">
                                            <input type="text" readonly value="{{$parent->company->name}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row col-lg-6 mb-4">
                                        <label for="thirteen" class="col-sm-3 col-form-label">Invoice Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="invoice_no" class="form-control invoice"
                                                value="{{$parent->invoice_no}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p style="color:red">
                                            Reminders:<br>
                                            1 Indicate actual working hours if you are on half day leave (example: 9am -
                                            1pm)<br>
                                            2 Indicate lunch hours properly. Non-working days must be "no lunch".<br>
                                            3 Do not upload attachments with special character on file name (example: /
                                            \ : * " ? &lt; &gt; ')<br>
                                            4 Wrong / incomplete attendance submission will result to delay in
                                            payment.<br>
                                        </p>
                                        <form  method="POST" action="{{ route('attendence.update', $parent->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group" style="max-width: 100%; overflow: auto;">
                                                <div style="display:flex">
                                                    <label class="control-label">Date</label>
                                                    <label class="control-label" style="margin-left: 90px">Day</label>
                                                    <label class="control-label" style="margin-left: 100px;">Time
                                                        In</label>
                                                    <label class="control-label" style="margin-left:90px;">Time
                                                        Out</label>
                                                    <label class="control-label" style="margin-left: 90px;">Next
                                                        Day</label>
                                                    <label class="control-label" style="margin-left: 20px;">Lunch
                                                        Hour</label>
                                                    <label class="control-label" style="margin-left: 80px;">Total
                                                        Hour /
                                                        Minute</label>
                                                    <label class="control-label" style="margin-left: 80px;">Normal Hour /
                                                        Minute</label>
                                                    <label class="control-label" style="margin-left: 70px;">OT
                                                        Hour / Minute</label>
                                                    <label class="control-label" style="margin-left: 65px;">OT
                                                        Calculation</label>
                                                    <label class="control-label" style="margin-left: 60px;">OT
                                                        Edit</label>
                                                    <label style="margin-left: 70px;" class="control-label"><input
                                                            type="checkbox" id="allCheckB" name="work_checkbox"
                                                            class="work_checkbox_parent" onclick="allWork()">
                                                        Work</label>
                                                    <label class="control-label" style="margin-left: 30px;">PH</label>
                                                    <label class="control-label" style="margin-left: 40px;">PH
                                                        Pay</label>
                                                    <label class="control-label"
                                                        style="margin-left: 20px;">Remarks</label>
                                                    <label class="control-label" style="margin-left: 100px;">Type of
                                                        Leave</label>
                                                    <label class="control-label" style="margin-left: 70px;">Leave
                                                        Days</label>
                                                    <label class="control-label" style="margin-left: 80px;">Leave
                                                        Attachment</label>
                                                    <label class="control-label" style="margin-left: 220px;">Claim
                                                        Attachment</label>
                                                    <label class="control-label" style="margin-left: 220px;">Type of
                                                        Reimbursement</label>
                                                    <label class="control-label" style="margin-left: 100px;">Amount of
                                                        Reimbursement</label>
                                                </div>
                                                @foreach ($attendances as $day => $attendance)
                                                @php
                                                    ++$day;
                                                @endphp
                                                <div style="display:flex">
                                                    <div
                                                        style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                        <input type="text" class="form-control bg-{{$day}}"
                                                            readonly
                                                            placeholder="Date" readonly=""
                                                            name="group[{{$day}}][date]" placeholder="Date"
                                                            value="{{$attendance->date}}">
                                                    </div>
                                                    <div
                                                        style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                        <input type="text" class="form-control bg-{{$day}}" readonly=""
                                                            name="group[{{$day}}][day]"
                                                            value="{{$attendance->day}}"
                                                            placeholder="Title">
                                                    </div>
                                                    <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">

                                                        {{-- @dump($in_time) --}}
                                                        <input type="time" style=" "
                                                            class="form-control hi-{{$day}} inTime-{{$day}}"
                                                            name="group[{{$day}}][in_time]"
                                                            value="{{$attendance->in_time}}"
                                                            placeholder="time" onchange="timeCalculation({{$day}})">
                                                    </div>
                                                    <div
                                                        style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                        <input type="time" style=" "
                                                            class="form-control hi-{{$day}}  outTime-{{$day}}"
                                                            name="group[{{$day}}][out_time]"
                                                            value="{{$attendance->out_time}}"
                                                            placeholder="time" onchange="timeCalculation({{$day}})">
                                                    </div>
                                                    <!--next-->
                                                    <div style="flex:0 0 50px;text-align:center">
                                                        <input type="checkbox" class="attendance_next_day1 change"
                                                            data-line="1" value="1" {{$attendance->next_day == 1 ? 'checked' : '' }}
                                                            name="group[{{$day}}][next_day]">
                                                    </div>
                                                    <!--lunch-->
                                                    <div style="flex:0 0 120px;">
                                                        <select class="form-control change hi-{{$day}} lunch_val-{{$day}}" data-line="1" onchange="timeCalculation({{$day}})"
                                                            id="attendance_lunch" name="group[{{$day}}][lunch_hour]"
                                                            data-content="" style="width:100%;  ">
                                                            <option value="">Select One</option>
                                                            <option value="30 minutes" {{ $attendance->lunch_hour == '30 minutes' ? 'selected' : ''}}>30 minutes</option>
                                                            <option value="45 minutes"  {{ $attendance->lunch_hour == '45 minutes' ? 'selected' : ''}}>45 minutes</option>
                                                            <option value="1 hour" {{ $attendance->lunch_hour == '1 hour' ? 'selected' : ''}}>1 hour</option>
                                                            <option value="No Lunch" {{ $attendance->lunch_hour == 'No Lunch' ? 'selected' : ''}}>No Lunch</option>
                                                            <option value="1.5 hour" {{ $attendance->lunch_hour == '1.5 hour' ? 'selected' : ''}}>1.5 hour</option>
                                                            <option value="2 hour" {{ $attendance->lunch_hour == '2 hour' ? 'selected' : ''}}>2 hour</option>
                                                        </select>
                                                    </div>
                                                    <!--total-->
                                                    <div style="flex:0 0 120px;">
                                                        <input type="text" style="text-align:center;  "
                                                            class="form-control week_1 hi-{{$day}} totla_time-{{$day}}" data-week="1"
                                                            readonly="" name="group[{{$day}}][total_hour_min]"
                                                            data-content="-1 h "
                                                            value="{{$attendance->total_hour_min}}">
                                                    </div>
                                                    <!--normal-->
                                                    <div style="flex:0 0 120px;">
                                                        <input type="text" style="text-align:center;  "
                                                            class="form-control hi-{{$day}} normal_time-{{$day}}" name="group[{{$day}}][normal_hour_min]"
                                                            value="{{$attendance->normal_hour_min}}">
                                                    </div>
                                                    <!--ot-->
                                                    <div style="flex:0 0 120px;">
                                                        <input type="text" style="text-align:center" name="group[{{$day}}][ot_hour_min]"
                                                            class="form-control ot-{{$day}}" data-week="1" value="{{$attendance->ot_hour_min}}">
                                                    </div>
                                                    <!--ot hidden-->
                                                    <div style="flex:0 0 120px;">
                                                        <input type="text" style="text-align:center"
                                                            class="form-control"
                                                            name="group[{{$day}}][ot_calculation]" value="{{$attendance->ot_calculation}}">
                                                    </div>
                                                    <!--edit-->
                                                    <div style="flex:0 0 80px;text-align:center">
                                                        <input type="checkbox" class="attendance_edit1" data-line="1" value="1" name="group[{{$day}}][ot_edit]" {{$attendance->ot_edit == 1 ? 'checked' : ''}}>
                                                    </div>
                                                    <!--work-->
                                                    <div style="flex:0 0 100px;text-align:center">
                                                            <input type="checkbox" id="workCheB-" {{$attendance->work == 1 ? 'checked' : ''}} class="work attendance_work1" data-line="1" value="1" name="group[{{$day}}][work]" onclick="work_check('')">


                                                    </div>
                                                    <!--ph-->
                                                    <div style="flex:0 0 50px;text-align:center">
                                                        <input type="checkbox" class="work attendance_ph1" {{$attendance->ph == 1 ? 'checked' : ''}} data-line="1" value="1" name="group[{{$day}}][ph]">
                                                    </div>
                                                    <!--ph pay-->
                                                    <div style="flex:0 0 50px;text-align:center">
                                                        <input type="checkbox" class="work attendance_ph_pay1"
                                                            data-line="1" value="1"
                                                            name="group[{{$day}}][ph_pay]" {{$attendance->ph_pay == 1 ? 'checked' : ''}}>
                                                    </div>
                                                    <!--remark-->
                                                    <div style="flex:0 0 150px;">
                                                        <textarea class="form-control hi-{{$day}}" rows="1" name="group[{{$day}}][remark]"
                                                        placeholder="Remarks">{{ $attendance->remark }}</textarea>
                                                    </div>
                                                    <div style="flex:0 0 120px;">
                                                        <select class="form-control change leave_type hi-{{$day}}"
                                                            data-line="1"
                                                            name="group[{{$day}}][type_of_leave]" style="width:100%;  ;">
                                                            <option value="">Select One</option>
                                                            @foreach ($leaveTypes as $type)
                                                                <option value="{{ $type->id }}">{{$type->leavetype_code}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!--attendance leave day-->
                                                    <div style="flex:0 0 120px;">
                                                        <select class="form-control change leave_days hi-{{$day}}" onchange="timeCalculation({{$day}})"
                                                            data-line="1"
                                                            name="group[{{$day}}][leave_day]" style="width:100%;  ">
                                                            <option value="0">Select One</option>
                                                            <option value="Full Day Leave" {{ $attendance->leave_day == 'Full Day Leave' ? 'selected' : '' }}>
                                                                Full Day Leave</option>
                                                            <option value="Half Day AM"{{ $attendance->leave_day == 'Half Day AM' ? 'selected' : '' }}>
                                                                Half Day AM</option>
                                                            <option value="Half Day PM"{{ $attendance->leave_day == 'Half Day PM' ? 'selected' : '' }}>
                                                                Half Day PM</option>
                                                        </select>
                                                    </div>
                                                    <!--attendance leave file-->
                                                    <div style="flex:0 0 235px;">
                                                        <input type="file" class="attendance_leave_file-{{$day}}" name="group[{{$day}}][leave_attachment][]" multiple onchange="hasFile({{$day}})">
                                                        <label class="remove-label remove-label-" onclick="removeFile('{{$day}}')"><i class="fas fa-trash text-danger"></i></label>
                                                        <div class="hi-{{$day}}">
                                                            @php $attachments = json_decode($attendance->leave_attachment); @endphp
                                                            @if ($attachments)
                                                                @foreach ($attachments as $attachment)
                                                                    <a href="{{ asset('storage/' . $attachment) }}" target="_blank">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{-- claim_attachment --}}
                                                    <div style="flex:0 0 235px;">
                                                        <input type="file" class="attendance_claim_file-{{$day}}" name="group[{{$day}}][claim_attachment][]" multiple onchange="hasFile({{$day}})">
                                                        <label class="remove-label remove-label-" onclick="removeClaim('{{$day}}')"><i class="fas fa-trash text-danger"></i></label>
                                                        <div class="hi-{{$day}}">
                                                            @php $attachments = json_decode($attendance->claim_attachment); @endphp
                                                            @if ($attachments)
                                                                @foreach ($attachments as $attachment)
                                                                    <a href="{{ asset('storage/' . $attachment) }}" target="_blank">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!--reimbursement-->
                                                    <div style="flex:0 0 200px;">
                                                        <select
                                                            class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                            data-line="1"
                                                            multiple="" name="group[{{$day}}][type_of_reimbursement]"
                                                            style="width:100%" tabindex="-1" aria-hidden="true">

                                                            <option value="1">Transport Reimbursement</option>
                                                            <option value="2">Medical Reimbursement</option>
                                                            <option value="4">Meal Reimbursement</option>
                                                            <option value="3">Other</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--default"
                                                            dir="ltr" style="width: 100%;"><span
                                                                class="selection"><span
                                                                    class="select2-selection select2-selection--multiple"
                                                                    role="combobox" aria-autocomplete="list"
                                                                    aria-haspopup="true" aria-expanded="false"
                                                                    tabindex="0">
                                                                    <ul class="select2-selection__rendered">
                                                                        <li
                                                                            class="select2-search select2-search--inline">
                                                                            <input class="select2-search__field"
                                                                                type="search" tabindex="-1"
                                                                                autocomplete="off"
                                                                                autocorrect="off"
                                                                                autocapitalize="off"
                                                                                spellcheck="false" role="textbox"
                                                                                placeholder=""
                                                                                style="width: 0.75em;">
                                                                        </li>
                                                                    </ul>
                                                                </span></span><span class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                    <!--reimbursement amount-->
                                                    <div style="flex:0 0 150px;">
                                                        <input type="text" style="text-align:center"
                                                            class="form-control" value="{{$attendance->amount_of_reimbursement}}" data-week="1"
                                                            name="group[{{$day}}][amount_of_reimbursement]">
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-sm-9">
                                                    <div>
                                                        <a href="{{ route('clients.index') }}"
                                                            class="btn btn-sm btn-secondary w-md">Cancel</a>
                                                        <button type="submit"
                                                            class="btn btn-sm btn-info w-md">Submit</button>
                                                        <a href="#" class="btn btn-sm btn-primary w-md">Print TNC
                                                            SRC</a>
                                                        <a href="#" class="btn btn-sm btn-primary w-md">Print TNC
                                                            SHRC</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div>
    @endsection

    @section('scripts')
        <!-- choices js -->
        <script src="{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-advanced.init.js') }}"></script>

        <script>
            $(document).ready(function() {

                // Listen for changes in the candidate dropdown
                $('#candidateDropdown').change(function() {
                    var selectedCandidateId = $(this).val();
                    $.ajax({
                        type: 'GET',
                        url: '/ATS/get/candidate/company/' + selectedCandidateId,
                        success: function(response) {
                            updateCompanyDropdown(response);

                            submitForm();

                        },
                        error: function(error) {
                            $('#companyDropdown').empty();
                            $('#companyDropdown').append(
                                '<option value="" disabled selected>No Company Available</option>'
                            );
                            $('#candidateId').val('');
                        }
                    });
                });

                function updateCompanyDropdown(response) {
                    $('#companyDropdown').empty();

                    if (response.company && response.candidateId) {
                        $('#companyDropdown').append('<option value="' + response.company.id + '">' + response.company
                            .name + '</option>');
                        $('#candidateId').val(response.candidateId);
                    } else {
                        $('#companyDropdown').append(
                            '<option value="" disabled selected>No Company Available</option>');
                    }
                }

                $(".invoice").on('keyup', function() {
                    var inp = $(this).val();
                    $("#invoice").val(inp);
                });

                function submitForm() {
                    $('#attendenceForm').submit();
                }

            });
        </script>
    @endsection
