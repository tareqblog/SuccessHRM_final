@extends('layouts.master')
@section('title')
Attendence
@endsection
@section('page-title')
Attendence
@endsection
@section('css')
<!-- choices css -->
<link
    href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}"
    rel="stylesheet" type="text/css" />
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Attendence</h4>
                </div>

                <div class="card-body">
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
                    <form action="{{ route('clients.store') }}" method="POST">
                        @csrf
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="General" role="tabpanel">
                                <div class="row">
                                    <div class="row col-lg-6  mb-4">
                                        <label for="eleven" class="col-sm-3 col-form-label">Company</label>
                                        <div class="col-sm-9">
                                            <select name="company_id" id="" class="form-control">
                                                <option value="">Select One</option>
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="eleven" class="col-sm-3 col-form-label">Candidate</label>
                                        <div class="col-sm-9">
                                            <select name="candidate_id" id="" class="form-control">
                                                <option value="">Select One</option>
                                                @foreach($candidates as $candidate)
                                                    <option value="{{ $candidate->id }}">
                                                        {{ $candidate->candidate_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row col-lg-6 mb-4">
                                        <label for="thirteen" class="col-sm-3 col-form-label">Invoice Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="invoice_no" class="form-control"
                                                placeholder="Invoice no">
                                        </div>
                                    </div>
                                    <div class="row col-lg-6 mb-4">
                                        <label for="thirteen" class="col-sm-3 col-form-label">Remarks</label>
                                        <div class="col-sm-9">
                                            <textarea name="remarks" rows="4" class="form-control"></textarea>
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

                                        <div class="form-group" style="max-width: 100%;overflow: auto;">
                                            <div style="display:flex">
                                                <label class="control-label"
                                                    style="flex:0 0 120px;text-align:center;">Date</label>
                                                <label class="control-label"
                                                    style="flex:0 0 120px;text-align:center;">Day</label>
                                                <label class="control-label"
                                                    style="flex:0 0 120px;text-align:center;">Time In</label>
                                                <label class="control-label"
                                                    style="flex:0 0 120px;text-align:center;">Time Out</label>
                                                <label class="control-label"
                                                    style="flex:0 0 50px;text-align:center;">Next Day</label>
                                                <label class="control-label"
                                                    style="flex:0 0 120px;text-align:center;">Lunch Hour</label>
                                                <label class="control-label"
                                                    style="flex:0 0 120px;text-align:center;">Total Hour /
                                                    Minute</label>
                                                <label class="control-label"
                                                    style="flex:0 0 120px;text-align:center;">Normal Hour /
                                                    Minute</label>
                                                <label class="control-label"
                                                    style="flex:0 0 120px;text-align:center;">OT Hour / Minute</label>
                                                <label class="control-label"
                                                    style="flex:0 0 120px;text-align:center;">OT Calculation</label>
                                                <label class="control-label" style="flex:0 0 80px;text-align:center;">OT
                                                    Edit</label>
                                                <label class="control-label"
                                                    style="flex:0 0 100px;text-align:center;"><input type="checkbox"
                                                        name="work_checkbox" class="work_checkbox_parent"> Work</label>
                                                <label class="control-label"
                                                    style="flex:0 0 50px;text-align:center;">PH</label>
                                                <label class="control-label" style="flex:0 0 50px;text-align:center;">PH
                                                    Pay</label>
                                                <label class="control-label"
                                                    style="flex:0 0 150px;text-align:center;">Remarks</label>
                                                <!--<label class="control-label" style="flex:0 0 120px;text-align:center;">Date</label>
                                                    <label class="control-label" style="flex:0 0 120px;text-align:center;">Day</label>-->
                                                <label class="control-label"
                                                    style="flex:0 0 120px;text-align:center;">Type of Leave</label>
                                                <label class="control-label"
                                                    style="flex:0 0 120px;text-align:center;">Leave Days</label>
                                                <label class="control-label"
                                                    style="flex:0 0 235px;text-align:center;">Leave Attachment</label>
                                                <label class="control-label"
                                                    style="flex:0 0 235px;text-align:center;">Claim Attachment</label>
                                                <label class="control-label"
                                                    style="flex:0 0 200px;text-align:center;">Type of
                                                    Reimbursement</label>
                                                <label class="control-label"
                                                    style="flex:0 0 150px;text-align:center;">Amount of
                                                    Reimbursement</label>
                                            </div>

                                            @php
                                                $currentMonth = Carbon\Carbon::now();
                                                $daysInMonth = $currentMonth->daysInMonth;
                                            @endphp

                                            @for ($day = 1; $day <= $daysInMonth; $day++)
                                            @php
                                                $currentDay = $currentMonth->copy()->day($day);
                                            @endphp
                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="date" class="form-control" readonly="" name="attendance_date1" placeholder="Date" value="{{$currentDay->toDateString()}}">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control" readonly="" name="attendance_day1" value="{{$currentDay->format('l')}}" placeholder="Title">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="time" class="form-control" name="attendance_day1" value="" placeholder="time">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="time" class="form-control" name="attendance_day1" value="" placeholder="time">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day1 change"
                                                        data-line="1" value="1" name="attendance_next_day1">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="1"
                                                        id="attendance_lunch1" name="attendance_lunch1" data-content=""
                                                        style="width:100%">
                                                        <option value="1">30 minutes</option>
                                                        <option value="2">45 minutes</option>
                                                        <option value="3">1 hour</option>
                                                        <option value="4">No Lunch</option>
                                                        <option value="5">1.5 hour</option>
                                                        <option value="6">2 hour</option>
                                                    </select>
                                                </div>
                                                <!--total-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center"
                                                        class="form-control week_1" data-week="1" readonly=""
                                                        id="attendance_total1" name="attendance_total1"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_normal1" name="attendance_normal1">
                                                    <input type="hidden" id="attendance_normal_hidden1"
                                                        name="attendance_normal_hidden1" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_ot1" value=""
                                                        name="attendance_ot1">
                                                    <!--<input type="hidden" id="attendance_ot_hidden1" name="attendance_ot_hidden1" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate1"
                                                        name="attendance_ot_rate1" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum1"
                                                        name="attendance_allowance_minimum1" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum1"
                                                        name="attendance_allowance_maximum1" value="">
                                                    <input type="hidden" id="attendance_allowance1"
                                                        name="attendance_allowance1" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden1" name="attendance_ot_hidden1"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit1" value="1"
                                                        name="attendance_edit1">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work1" data-line="1"
                                                        value="1" name="work1">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph1" data-line="1"
                                                        value="1" name="attendance_ph1" checked="">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay1" data-line="1"
                                                        value="1" name="attendance_ph_pay1" checked="">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks1" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date1" readonly name="attendance_date1" value = "01-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day1" id="attendance_day" readonly name="attendance_day1" value = "Monday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="1"
                                                        id="attendance_leave1" name="attendance_leave1"
                                                        style="width:100%">
                                                        <option value="" selected="SELECTED">Select One</option>
                                                        <option value="1">Annual Leave</option>
                                                        <option value="2">Medical Leave</option>
                                                        <option value="3">Hospitalisation Leave</option>
                                                        <option value="8">Off In Lieu</option>
                                                        <option value="4">Childcare Leave</option>
                                                        <option value="5">Maternity/Paternity Leave</option>
                                                        <option value="11">Reservist</option>
                                                        <option value="12">Compassionate Leave</option>
                                                        <option value="7">Marriage Leave</option>
                                                        <option value="9">Unpaid Annual Leave</option>
                                                        <option value="14">Unpaid Medical Leave</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave day-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_days" data-line="1"
                                                        id="attendance_leave_day1" name="attendance_leave_day1"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file1"
                                                        name="attendance_leave_file1[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file1"
                                                        name="attendance_leave_existing_file1" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file1"
                                                        name="attendance_claim_file1[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="1" id="attendance_reimbursement1" multiple=""
                                                        name="attendance_reimbursement1[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="1" id="attendance_reimbursement1" name="attendance_reimbursement1[]" style = 'width:100%'>-->
                                                        <option value="1">Transport Reimbursement</option>
                                                        <option value="2">Medical Reimbursement</option>
                                                        <option value="4">Meal Reimbursement</option>
                                                        <option value="3">Other</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" style="width: 100%;"><span class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-autocomplete="list"
                                                                aria-haspopup="true" aria-expanded="false" tabindex="0">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="-1"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="off" spellcheck="false"
                                                                            role="textbox" placeholder=""
                                                                            style="width: 0.75em;"></li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <!--reimbursement amount-->
                                                <div style="flex:0 0 150px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        value="" data-week="1" id="attendance_reimbursement_amount1"
                                                        name="attendance_reimbursement_amount1">
                                                </div>
                                            </div>
                                            @endfor

                                            <input type="hidden" name="attendance_total_day" value="31">
                                            <input type="hidden" name="date" value="2024-01-06">
                                            <input type="hidden" name="empl" value="">
                                            <input type="hidden" name="supervisor_name" class="supervisor_name"
                                                value="">
                                            <input type="hidden" name="supervisor_email" class="supervisor_email"
                                                value="">
                                            <input type="hidden" name="submit_type" class="submit_type" value="">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div>
                        <a href="{{ route('clients.index') }}"
                            class="btn btn-sm btn-secondary w-md">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                        <a href="#" class="btn btn-sm btn-primary w-md">Print TNC SRC</a>
                        <a href="#" class="btn btn-sm btn-primary w-md">Print TNC SHRC</a>
                    </div>
                </div>
            </div>
            </form>
        </div><!-- end card-body -->
    </div><!-- end card -->
    </div>
    </div>
    @endsection

    @section('scripts')
    <!-- choices js -->
    <script
        src="{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}">
    </script>
    <!-- init js -->
    <script src="{{ URL::asset('build/js/pages/form-advanced.init.js') }}"></script>
    @endsection