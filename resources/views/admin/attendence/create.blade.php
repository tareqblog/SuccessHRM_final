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
                                        <label for="eleven" class="col-sm-3 col-form-label">Client</label>
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


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight1"
                                                        name="attendance_highlight1">
                                                    <input type="text" class="form-control" id="attendance_date1"
                                                        readonly="" name="attendance_date1" value="01-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day1"
                                                        id="attendance_day" readonly="" name="attendance_day1"
                                                        value="Monday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="1"
                                                        id="attendance_start_1" name="attendance_start_1" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_1"
                                                        name="attendance_normal_start_1" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="1"
                                                        id="attendance_end_1" name="attendance_end_1" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_1"
                                                        name="attendance_normal_end_1" value="">
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


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight2"
                                                        name="attendance_highlight2">
                                                    <input type="text" class="form-control" id="attendance_date2"
                                                        readonly="" name="attendance_date2" value="02-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day2"
                                                        id="attendance_day" readonly="" name="attendance_day2"
                                                        value="Tuesday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="2"
                                                        id="attendance_start_2" name="attendance_start_2" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_2"
                                                        name="attendance_normal_start_2" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="2"
                                                        id="attendance_end_2" name="attendance_end_2" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_2"
                                                        name="attendance_normal_end_2" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day2 change"
                                                        data-line="2" value="1" name="attendance_next_day2">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="2"
                                                        id="attendance_lunch2" name="attendance_lunch2" data-content=""
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
                                                        id="attendance_total2" name="attendance_total2"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_normal2" name="attendance_normal2">
                                                    <input type="hidden" id="attendance_normal_hidden2"
                                                        name="attendance_normal_hidden2" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_ot2" value=""
                                                        name="attendance_ot2">
                                                    <!--<input type="hidden" id="attendance_ot_hidden2" name="attendance_ot_hidden2" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate2"
                                                        name="attendance_ot_rate2" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum2"
                                                        name="attendance_allowance_minimum2" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum2"
                                                        name="attendance_allowance_maximum2" value="">
                                                    <input type="hidden" id="attendance_allowance2"
                                                        name="attendance_allowance2" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden2" name="attendance_ot_hidden2"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit2" value="1"
                                                        name="attendance_edit2">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work2" data-line="2"
                                                        value="1" name="work2">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph2" data-line="2"
                                                        value="1" name="attendance_ph2">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay2" data-line="2"
                                                        value="1" name="attendance_ph_pay2">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks2" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date2" readonly name="attendance_date2" value = "02-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day2" id="attendance_day" readonly name="attendance_day2" value = "Tuesday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="2"
                                                        id="attendance_leave2" name="attendance_leave2"
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
                                                    <select class="form-control change leave_days" data-line="2"
                                                        id="attendance_leave_day2" name="attendance_leave_day2"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file2"
                                                        name="attendance_leave_file2[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file2"
                                                        name="attendance_leave_existing_file2" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file2"
                                                        name="attendance_claim_file2[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="2" id="attendance_reimbursement2" multiple=""
                                                        name="attendance_reimbursement2[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="2" id="attendance_reimbursement2" name="attendance_reimbursement2[]" style = 'width:100%'>-->
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
                                                        value="" data-week="1" id="attendance_reimbursement_amount2"
                                                        name="attendance_reimbursement_amount2">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight3"
                                                        name="attendance_highlight3">
                                                    <input type="text" class="form-control" id="attendance_date3"
                                                        readonly="" name="attendance_date3" value="03-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day3"
                                                        id="attendance_day" readonly="" name="attendance_day3"
                                                        value="Wednesday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="3"
                                                        id="attendance_start_3" name="attendance_start_3" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_3"
                                                        name="attendance_normal_start_3" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="3"
                                                        id="attendance_end_3" name="attendance_end_3" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_3"
                                                        name="attendance_normal_end_3" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day3 change"
                                                        data-line="3" value="1" name="attendance_next_day3">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="3"
                                                        id="attendance_lunch3" name="attendance_lunch3" data-content=""
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
                                                        id="attendance_total3" name="attendance_total3"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_normal3" name="attendance_normal3">
                                                    <input type="hidden" id="attendance_normal_hidden3"
                                                        name="attendance_normal_hidden3" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_ot3" value=""
                                                        name="attendance_ot3">
                                                    <!--<input type="hidden" id="attendance_ot_hidden3" name="attendance_ot_hidden3" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate3"
                                                        name="attendance_ot_rate3" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum3"
                                                        name="attendance_allowance_minimum3" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum3"
                                                        name="attendance_allowance_maximum3" value="">
                                                    <input type="hidden" id="attendance_allowance3"
                                                        name="attendance_allowance3" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden3" name="attendance_ot_hidden3"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit3" value="1"
                                                        name="attendance_edit3">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work3" data-line="3"
                                                        value="1" name="work3">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph3" data-line="3"
                                                        value="1" name="attendance_ph3">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay3" data-line="3"
                                                        value="1" name="attendance_ph_pay3">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks3" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date3" readonly name="attendance_date3" value = "03-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day3" id="attendance_day" readonly name="attendance_day3" value = "Wednesday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="3"
                                                        id="attendance_leave3" name="attendance_leave3"
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
                                                    <select class="form-control change leave_days" data-line="3"
                                                        id="attendance_leave_day3" name="attendance_leave_day3"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file3"
                                                        name="attendance_leave_file3[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file3"
                                                        name="attendance_leave_existing_file3" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file3"
                                                        name="attendance_claim_file3[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="3" id="attendance_reimbursement3" multiple=""
                                                        name="attendance_reimbursement3[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="3" id="attendance_reimbursement3" name="attendance_reimbursement3[]" style = 'width:100%'>-->
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
                                                        value="" data-week="1" id="attendance_reimbursement_amount3"
                                                        name="attendance_reimbursement_amount3">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight4"
                                                        name="attendance_highlight4">
                                                    <input type="text" class="form-control" id="attendance_date4"
                                                        readonly="" name="attendance_date4" value="04-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day4"
                                                        id="attendance_day" readonly="" name="attendance_day4"
                                                        value="Thursday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="4"
                                                        id="attendance_start_4" name="attendance_start_4" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_4"
                                                        name="attendance_normal_start_4" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="4"
                                                        id="attendance_end_4" name="attendance_end_4" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_4"
                                                        name="attendance_normal_end_4" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day4 change"
                                                        data-line="4" value="1" name="attendance_next_day4">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="4"
                                                        id="attendance_lunch4" name="attendance_lunch4" data-content=""
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
                                                        id="attendance_total4" name="attendance_total4"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_normal4" name="attendance_normal4">
                                                    <input type="hidden" id="attendance_normal_hidden4"
                                                        name="attendance_normal_hidden4" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_ot4" value=""
                                                        name="attendance_ot4">
                                                    <!--<input type="hidden" id="attendance_ot_hidden4" name="attendance_ot_hidden4" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate4"
                                                        name="attendance_ot_rate4" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum4"
                                                        name="attendance_allowance_minimum4" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum4"
                                                        name="attendance_allowance_maximum4" value="">
                                                    <input type="hidden" id="attendance_allowance4"
                                                        name="attendance_allowance4" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden4" name="attendance_ot_hidden4"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit4" value="1"
                                                        name="attendance_edit4">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work4" data-line="4"
                                                        value="1" name="work4">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph4" data-line="4"
                                                        value="1" name="attendance_ph4">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay4" data-line="4"
                                                        value="1" name="attendance_ph_pay4">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks4" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date4" readonly name="attendance_date4" value = "04-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day4" id="attendance_day" readonly name="attendance_day4" value = "Thursday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="4"
                                                        id="attendance_leave4" name="attendance_leave4"
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
                                                    <select class="form-control change leave_days" data-line="4"
                                                        id="attendance_leave_day4" name="attendance_leave_day4"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file4"
                                                        name="attendance_leave_file4[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file4"
                                                        name="attendance_leave_existing_file4" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file4"
                                                        name="attendance_claim_file4[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="4" id="attendance_reimbursement4" multiple=""
                                                        name="attendance_reimbursement4[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="4" id="attendance_reimbursement4" name="attendance_reimbursement4[]" style = 'width:100%'>-->
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
                                                        value="" data-week="1" id="attendance_reimbursement_amount4"
                                                        name="attendance_reimbursement_amount4">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight5"
                                                        name="attendance_highlight5">
                                                    <input type="text" class="form-control" id="attendance_date5"
                                                        readonly="" name="attendance_date5" value="05-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day5"
                                                        id="attendance_day" readonly="" name="attendance_day5"
                                                        value="Friday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="5"
                                                        id="attendance_start_5" name="attendance_start_5" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_5"
                                                        name="attendance_normal_start_5" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="5"
                                                        id="attendance_end_5" name="attendance_end_5" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_5"
                                                        name="attendance_normal_end_5" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day5 change"
                                                        data-line="5" value="1" name="attendance_next_day5">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="5"
                                                        id="attendance_lunch5" name="attendance_lunch5" data-content=""
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
                                                        id="attendance_total5" name="attendance_total5"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_normal5" name="attendance_normal5">
                                                    <input type="hidden" id="attendance_normal_hidden5"
                                                        name="attendance_normal_hidden5" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_ot5" value=""
                                                        name="attendance_ot5">
                                                    <!--<input type="hidden" id="attendance_ot_hidden5" name="attendance_ot_hidden5" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate5"
                                                        name="attendance_ot_rate5" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum5"
                                                        name="attendance_allowance_minimum5" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum5"
                                                        name="attendance_allowance_maximum5" value="">
                                                    <input type="hidden" id="attendance_allowance5"
                                                        name="attendance_allowance5" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden5" name="attendance_ot_hidden5"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit5" value="1"
                                                        name="attendance_edit5">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work5" data-line="5"
                                                        value="1" name="work5">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph5" data-line="5"
                                                        value="1" name="attendance_ph5">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay5" data-line="5"
                                                        value="1" name="attendance_ph_pay5">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks5" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date5" readonly name="attendance_date5" value = "05-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day5" id="attendance_day" readonly name="attendance_day5" value = "Friday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="5"
                                                        id="attendance_leave5" name="attendance_leave5"
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
                                                    <select class="form-control change leave_days" data-line="5"
                                                        id="attendance_leave_day5" name="attendance_leave_day5"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file5"
                                                        name="attendance_leave_file5[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file5"
                                                        name="attendance_leave_existing_file5" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file5"
                                                        name="attendance_claim_file5[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="5" id="attendance_reimbursement5" multiple=""
                                                        name="attendance_reimbursement5[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="5" id="attendance_reimbursement5" name="attendance_reimbursement5[]" style = 'width:100%'>-->
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
                                                        value="" data-week="1" id="attendance_reimbursement_amount5"
                                                        name="attendance_reimbursement_amount5">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight6"
                                                        name="attendance_highlight6">
                                                    <input type="text" class="form-control" id="attendance_date6"
                                                        readonly="" name="attendance_date6" value="06-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day6"
                                                        id="attendance_day" readonly="" name="attendance_day6"
                                                        value="Saturday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="6"
                                                        id="attendance_start_6" name="attendance_start_6" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_6"
                                                        name="attendance_normal_start_6" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="6"
                                                        id="attendance_end_6" name="attendance_end_6" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_6"
                                                        name="attendance_normal_end_6" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day6 change"
                                                        data-line="6" value="1" name="attendance_next_day6">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="6"
                                                        id="attendance_lunch6" name="attendance_lunch6" data-content=""
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
                                                        id="attendance_total6" name="attendance_total6"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_normal6" name="attendance_normal6">
                                                    <input type="hidden" id="attendance_normal_hidden6"
                                                        name="attendance_normal_hidden6" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_ot6" value=""
                                                        name="attendance_ot6">
                                                    <!--<input type="hidden" id="attendance_ot_hidden6" name="attendance_ot_hidden6" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate6"
                                                        name="attendance_ot_rate6" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum6"
                                                        name="attendance_allowance_minimum6" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum6"
                                                        name="attendance_allowance_maximum6" value="">
                                                    <input type="hidden" id="attendance_allowance6"
                                                        name="attendance_allowance6" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden6" name="attendance_ot_hidden6"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit6" value="1"
                                                        name="attendance_edit6">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work6" data-line="6"
                                                        value="1" name="work6">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph6" data-line="6"
                                                        value="1" name="attendance_ph6">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay6" data-line="6"
                                                        value="1" name="attendance_ph_pay6">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks6" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date6" readonly name="attendance_date6" value = "06-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day6" id="attendance_day" readonly name="attendance_day6" value = "Saturday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="6"
                                                        id="attendance_leave6" name="attendance_leave6"
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
                                                    <select class="form-control change leave_days" data-line="6"
                                                        id="attendance_leave_day6" name="attendance_leave_day6"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file6"
                                                        name="attendance_leave_file6[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file6"
                                                        name="attendance_leave_existing_file6" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file6"
                                                        name="attendance_claim_file6[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="6" id="attendance_reimbursement6" multiple=""
                                                        name="attendance_reimbursement6[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="6" id="attendance_reimbursement6" name="attendance_reimbursement6[]" style = 'width:100%'>-->
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
                                                        value="" data-week="1" id="attendance_reimbursement_amount6"
                                                        name="attendance_reimbursement_amount6">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight7"
                                                        name="attendance_highlight7">
                                                    <input type="text" class="form-control" id="attendance_date7"
                                                        readonly="" name="attendance_date7" value="07-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day7"
                                                        id="attendance_day" readonly="" name="attendance_day7"
                                                        value="Sunday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="7"
                                                        id="attendance_start_7" name="attendance_start_7" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_7"
                                                        name="attendance_normal_start_7" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="7"
                                                        id="attendance_end_7" name="attendance_end_7" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_7"
                                                        name="attendance_normal_end_7" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day7 change"
                                                        data-line="7" value="1" name="attendance_next_day7">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="7"
                                                        id="attendance_lunch7" name="attendance_lunch7" data-content=""
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
                                                        id="attendance_total7" name="attendance_total7"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_normal7" name="attendance_normal7">
                                                    <input type="hidden" id="attendance_normal_hidden7"
                                                        name="attendance_normal_hidden7" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="1" id="attendance_ot7" value=""
                                                        name="attendance_ot7">
                                                    <!--<input type="hidden" id="attendance_ot_hidden7" name="attendance_ot_hidden7" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate7"
                                                        name="attendance_ot_rate7" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum7"
                                                        name="attendance_allowance_minimum7" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum7"
                                                        name="attendance_allowance_maximum7" value="">
                                                    <input type="hidden" id="attendance_allowance7"
                                                        name="attendance_allowance7" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden7" name="attendance_ot_hidden7"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit7" value="1"
                                                        name="attendance_edit7">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work7" data-line="7"
                                                        value="1" name="work7" data-content="1">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph7" data-line="7"
                                                        value="1" name="attendance_ph7">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay7" data-line="7"
                                                        value="1" name="attendance_ph_pay7">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks7" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date7" readonly name="attendance_date7" value = "07-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day7" id="attendance_day" readonly name="attendance_day7" value = "Sunday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="7"
                                                        id="attendance_leave7" name="attendance_leave7"
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
                                                    <select class="form-control change leave_days" data-line="7"
                                                        id="attendance_leave_day7" name="attendance_leave_day7"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file7"
                                                        name="attendance_leave_file7[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file7"
                                                        name="attendance_leave_existing_file7" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file7"
                                                        name="attendance_claim_file7[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="7" id="attendance_reimbursement7" multiple=""
                                                        name="attendance_reimbursement7[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="7" id="attendance_reimbursement7" name="attendance_reimbursement7[]" style = 'width:100%'>-->
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
                                                        value="" data-week="1" id="attendance_reimbursement_amount7"
                                                        name="attendance_reimbursement_amount7">
                                                </div>
                                            </div>
                                            <div style="display:flex">
                                                <div style="flex:0 0 850px"></div>
                                                <div style="text-align:left;flex:0 0 120px">
                                                    <p><b>Total Hour (Week): </b></p>
                                                </div>
                                                <div class="week_text_1 = " style="text-align:left;flex:0 0 200px">
                                                    <p>
                                                        <b>
                                                            0 hour </b>
                                                    </p>
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight8"
                                                        name="attendance_highlight8">
                                                    <input type="text" class="form-control" id="attendance_date8"
                                                        readonly="" name="attendance_date8" value="08-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day8"
                                                        id="attendance_day" readonly="" name="attendance_day8"
                                                        value="Monday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="8"
                                                        id="attendance_start_8" name="attendance_start_8" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_8"
                                                        name="attendance_normal_start_8" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="8"
                                                        id="attendance_end_8" name="attendance_end_8" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_8"
                                                        name="attendance_normal_end_8" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day8 change"
                                                        data-line="8" value="1" name="attendance_next_day8">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="8"
                                                        id="attendance_lunch8" name="attendance_lunch8" data-content=""
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
                                                        class="form-control week_2" data-week="2" readonly=""
                                                        id="attendance_total8" name="attendance_total8"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_normal8" name="attendance_normal8">
                                                    <input type="hidden" id="attendance_normal_hidden8"
                                                        name="attendance_normal_hidden8" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_ot8" value=""
                                                        name="attendance_ot8">
                                                    <!--<input type="hidden" id="attendance_ot_hidden8" name="attendance_ot_hidden8" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate8"
                                                        name="attendance_ot_rate8" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum8"
                                                        name="attendance_allowance_minimum8" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum8"
                                                        name="attendance_allowance_maximum8" value="">
                                                    <input type="hidden" id="attendance_allowance8"
                                                        name="attendance_allowance8" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden8" name="attendance_ot_hidden8"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit8" value="1"
                                                        name="attendance_edit8">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work8" data-line="8"
                                                        value="1" name="work8">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph8" data-line="8"
                                                        value="1" name="attendance_ph8">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay8" data-line="8"
                                                        value="1" name="attendance_ph_pay8">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks8" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date8" readonly name="attendance_date8" value = "08-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day8" id="attendance_day" readonly name="attendance_day8" value = "Monday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="8"
                                                        id="attendance_leave8" name="attendance_leave8"
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
                                                    <select class="form-control change leave_days" data-line="8"
                                                        id="attendance_leave_day8" name="attendance_leave_day8"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file8"
                                                        name="attendance_leave_file8[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file8"
                                                        name="attendance_leave_existing_file8" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file8"
                                                        name="attendance_claim_file8[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="8" id="attendance_reimbursement8" multiple=""
                                                        name="attendance_reimbursement8[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="8" id="attendance_reimbursement8" name="attendance_reimbursement8[]" style = 'width:100%'>-->
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
                                                        value="" data-week="2" id="attendance_reimbursement_amount8"
                                                        name="attendance_reimbursement_amount8">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight9"
                                                        name="attendance_highlight9">
                                                    <input type="text" class="form-control" id="attendance_date9"
                                                        readonly="" name="attendance_date9" value="09-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day9"
                                                        id="attendance_day" readonly="" name="attendance_day9"
                                                        value="Tuesday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="9"
                                                        id="attendance_start_9" name="attendance_start_9" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_9"
                                                        name="attendance_normal_start_9" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="9"
                                                        id="attendance_end_9" name="attendance_end_9" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_9"
                                                        name="attendance_normal_end_9" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day9 change"
                                                        data-line="9" value="1" name="attendance_next_day9">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="9"
                                                        id="attendance_lunch9" name="attendance_lunch9" data-content=""
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
                                                        class="form-control week_2" data-week="2" readonly=""
                                                        id="attendance_total9" name="attendance_total9"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_normal9" name="attendance_normal9">
                                                    <input type="hidden" id="attendance_normal_hidden9"
                                                        name="attendance_normal_hidden9" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_ot9" value=""
                                                        name="attendance_ot9">
                                                    <!--<input type="hidden" id="attendance_ot_hidden9" name="attendance_ot_hidden9" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate9"
                                                        name="attendance_ot_rate9" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum9"
                                                        name="attendance_allowance_minimum9" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum9"
                                                        name="attendance_allowance_maximum9" value="">
                                                    <input type="hidden" id="attendance_allowance9"
                                                        name="attendance_allowance9" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden9" name="attendance_ot_hidden9"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit9" value="1"
                                                        name="attendance_edit9">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work9" data-line="9"
                                                        value="1" name="work9">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph9" data-line="9"
                                                        value="1" name="attendance_ph9">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay9" data-line="9"
                                                        value="1" name="attendance_ph_pay9">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks9" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date9" readonly name="attendance_date9" value = "09-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day9" id="attendance_day" readonly name="attendance_day9" value = "Tuesday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="9"
                                                        id="attendance_leave9" name="attendance_leave9"
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
                                                    <select class="form-control change leave_days" data-line="9"
                                                        id="attendance_leave_day9" name="attendance_leave_day9"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file9"
                                                        name="attendance_leave_file9[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file9"
                                                        name="attendance_leave_existing_file9" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file9"
                                                        name="attendance_claim_file9[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="9" id="attendance_reimbursement9" multiple=""
                                                        name="attendance_reimbursement9[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="9" id="attendance_reimbursement9" name="attendance_reimbursement9[]" style = 'width:100%'>-->
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
                                                        value="" data-week="2" id="attendance_reimbursement_amount9"
                                                        name="attendance_reimbursement_amount9">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight10"
                                                        name="attendance_highlight10">
                                                    <input type="text" class="form-control" id="attendance_date10"
                                                        readonly="" name="attendance_date10" value="10-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day10"
                                                        id="attendance_day" readonly="" name="attendance_day10"
                                                        value="Wednesday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="10"
                                                        id="attendance_start_10" name="attendance_start_10" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_10"
                                                        name="attendance_normal_start_10" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="10"
                                                        id="attendance_end_10" name="attendance_end_10" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_10"
                                                        name="attendance_normal_end_10" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day10 change"
                                                        data-line="10" value="1" name="attendance_next_day10">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="10"
                                                        id="attendance_lunch10" name="attendance_lunch10"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_2" data-week="2" readonly=""
                                                        id="attendance_total10" name="attendance_total10"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_normal10"
                                                        name="attendance_normal10">
                                                    <input type="hidden" id="attendance_normal_hidden10"
                                                        name="attendance_normal_hidden10" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_ot10" value=""
                                                        name="attendance_ot10">
                                                    <!--<input type="hidden" id="attendance_ot_hidden10" name="attendance_ot_hidden10" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate10"
                                                        name="attendance_ot_rate10" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum10"
                                                        name="attendance_allowance_minimum10" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum10"
                                                        name="attendance_allowance_maximum10" value="">
                                                    <input type="hidden" id="attendance_allowance10"
                                                        name="attendance_allowance10" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden10" name="attendance_ot_hidden10"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit10" value="1"
                                                        name="attendance_edit10">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work10" data-line="10"
                                                        value="1" name="work10">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph10" data-line="10"
                                                        value="1" name="attendance_ph10">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay10"
                                                        data-line="10" value="1" name="attendance_ph_pay10">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks10" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date10" readonly name="attendance_date10" value = "10-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day10" id="attendance_day" readonly name="attendance_day10" value = "Wednesday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="10"
                                                        id="attendance_leave10" name="attendance_leave10"
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
                                                    <select class="form-control change leave_days" data-line="10"
                                                        id="attendance_leave_day10" name="attendance_leave_day10"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file10"
                                                        name="attendance_leave_file10[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file10"
                                                        name="attendance_leave_existing_file10" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file10"
                                                        name="attendance_claim_file10[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="10" id="attendance_reimbursement10" multiple=""
                                                        name="attendance_reimbursement10[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="10" id="attendance_reimbursement10" name="attendance_reimbursement10[]" style = 'width:100%'>-->
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
                                                        value="" data-week="2" id="attendance_reimbursement_amount10"
                                                        name="attendance_reimbursement_amount10">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight11"
                                                        name="attendance_highlight11">
                                                    <input type="text" class="form-control" id="attendance_date11"
                                                        readonly="" name="attendance_date11" value="11-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day11"
                                                        id="attendance_day" readonly="" name="attendance_day11"
                                                        value="Thursday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="11"
                                                        id="attendance_start_11" name="attendance_start_11" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_11"
                                                        name="attendance_normal_start_11" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="11"
                                                        id="attendance_end_11" name="attendance_end_11" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_11"
                                                        name="attendance_normal_end_11" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day11 change"
                                                        data-line="11" value="1" name="attendance_next_day11">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="11"
                                                        id="attendance_lunch11" name="attendance_lunch11"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_2" data-week="2" readonly=""
                                                        id="attendance_total11" name="attendance_total11"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_normal11"
                                                        name="attendance_normal11">
                                                    <input type="hidden" id="attendance_normal_hidden11"
                                                        name="attendance_normal_hidden11" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_ot11" value=""
                                                        name="attendance_ot11">
                                                    <!--<input type="hidden" id="attendance_ot_hidden11" name="attendance_ot_hidden11" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate11"
                                                        name="attendance_ot_rate11" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum11"
                                                        name="attendance_allowance_minimum11" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum11"
                                                        name="attendance_allowance_maximum11" value="">
                                                    <input type="hidden" id="attendance_allowance11"
                                                        name="attendance_allowance11" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden11" name="attendance_ot_hidden11"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit11" value="1"
                                                        name="attendance_edit11">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work11" data-line="11"
                                                        value="1" name="work11">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph11" data-line="11"
                                                        value="1" name="attendance_ph11">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay11"
                                                        data-line="11" value="1" name="attendance_ph_pay11">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks11" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date11" readonly name="attendance_date11" value = "11-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day11" id="attendance_day" readonly name="attendance_day11" value = "Thursday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="11"
                                                        id="attendance_leave11" name="attendance_leave11"
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
                                                    <select class="form-control change leave_days" data-line="11"
                                                        id="attendance_leave_day11" name="attendance_leave_day11"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file11"
                                                        name="attendance_leave_file11[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file11"
                                                        name="attendance_leave_existing_file11" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file11"
                                                        name="attendance_claim_file11[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="11" id="attendance_reimbursement11" multiple=""
                                                        name="attendance_reimbursement11[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="11" id="attendance_reimbursement11" name="attendance_reimbursement11[]" style = 'width:100%'>-->
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
                                                        value="" data-week="2" id="attendance_reimbursement_amount11"
                                                        name="attendance_reimbursement_amount11">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight12"
                                                        name="attendance_highlight12">
                                                    <input type="text" class="form-control" id="attendance_date12"
                                                        readonly="" name="attendance_date12" value="12-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day12"
                                                        id="attendance_day" readonly="" name="attendance_day12"
                                                        value="Friday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="12"
                                                        id="attendance_start_12" name="attendance_start_12" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_12"
                                                        name="attendance_normal_start_12" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="12"
                                                        id="attendance_end_12" name="attendance_end_12" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_12"
                                                        name="attendance_normal_end_12" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day12 change"
                                                        data-line="12" value="1" name="attendance_next_day12">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="12"
                                                        id="attendance_lunch12" name="attendance_lunch12"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_2" data-week="2" readonly=""
                                                        id="attendance_total12" name="attendance_total12"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_normal12"
                                                        name="attendance_normal12">
                                                    <input type="hidden" id="attendance_normal_hidden12"
                                                        name="attendance_normal_hidden12" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_ot12" value=""
                                                        name="attendance_ot12">
                                                    <!--<input type="hidden" id="attendance_ot_hidden12" name="attendance_ot_hidden12" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate12"
                                                        name="attendance_ot_rate12" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum12"
                                                        name="attendance_allowance_minimum12" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum12"
                                                        name="attendance_allowance_maximum12" value="">
                                                    <input type="hidden" id="attendance_allowance12"
                                                        name="attendance_allowance12" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden12" name="attendance_ot_hidden12"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit12" value="1"
                                                        name="attendance_edit12">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work12" data-line="12"
                                                        value="1" name="work12">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph12" data-line="12"
                                                        value="1" name="attendance_ph12">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay12"
                                                        data-line="12" value="1" name="attendance_ph_pay12">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks12" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date12" readonly name="attendance_date12" value = "12-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day12" id="attendance_day" readonly name="attendance_day12" value = "Friday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="12"
                                                        id="attendance_leave12" name="attendance_leave12"
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
                                                    <select class="form-control change leave_days" data-line="12"
                                                        id="attendance_leave_day12" name="attendance_leave_day12"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file12"
                                                        name="attendance_leave_file12[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file12"
                                                        name="attendance_leave_existing_file12" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file12"
                                                        name="attendance_claim_file12[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="12" id="attendance_reimbursement12" multiple=""
                                                        name="attendance_reimbursement12[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="12" id="attendance_reimbursement12" name="attendance_reimbursement12[]" style = 'width:100%'>-->
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
                                                        value="" data-week="2" id="attendance_reimbursement_amount12"
                                                        name="attendance_reimbursement_amount12">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight13"
                                                        name="attendance_highlight13">
                                                    <input type="text" class="form-control" id="attendance_date13"
                                                        readonly="" name="attendance_date13" value="13-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day13"
                                                        id="attendance_day" readonly="" name="attendance_day13"
                                                        value="Saturday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="13"
                                                        id="attendance_start_13" name="attendance_start_13" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_13"
                                                        name="attendance_normal_start_13" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="13"
                                                        id="attendance_end_13" name="attendance_end_13" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_13"
                                                        name="attendance_normal_end_13" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day13 change"
                                                        data-line="13" value="1" name="attendance_next_day13">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="13"
                                                        id="attendance_lunch13" name="attendance_lunch13"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_2" data-week="2" readonly=""
                                                        id="attendance_total13" name="attendance_total13"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_normal13"
                                                        name="attendance_normal13">
                                                    <input type="hidden" id="attendance_normal_hidden13"
                                                        name="attendance_normal_hidden13" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_ot13" value=""
                                                        name="attendance_ot13">
                                                    <!--<input type="hidden" id="attendance_ot_hidden13" name="attendance_ot_hidden13" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate13"
                                                        name="attendance_ot_rate13" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum13"
                                                        name="attendance_allowance_minimum13" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum13"
                                                        name="attendance_allowance_maximum13" value="">
                                                    <input type="hidden" id="attendance_allowance13"
                                                        name="attendance_allowance13" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden13" name="attendance_ot_hidden13"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit13" value="1"
                                                        name="attendance_edit13">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work13" data-line="13"
                                                        value="1" name="work13">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph13" data-line="13"
                                                        value="1" name="attendance_ph13">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay13"
                                                        data-line="13" value="1" name="attendance_ph_pay13">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks13" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date13" readonly name="attendance_date13" value = "13-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day13" id="attendance_day" readonly name="attendance_day13" value = "Saturday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="13"
                                                        id="attendance_leave13" name="attendance_leave13"
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
                                                    <select class="form-control change leave_days" data-line="13"
                                                        id="attendance_leave_day13" name="attendance_leave_day13"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file13"
                                                        name="attendance_leave_file13[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file13"
                                                        name="attendance_leave_existing_file13" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file13"
                                                        name="attendance_claim_file13[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="13" id="attendance_reimbursement13" multiple=""
                                                        name="attendance_reimbursement13[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="13" id="attendance_reimbursement13" name="attendance_reimbursement13[]" style = 'width:100%'>-->
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
                                                        value="" data-week="2" id="attendance_reimbursement_amount13"
                                                        name="attendance_reimbursement_amount13">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight14"
                                                        name="attendance_highlight14">
                                                    <input type="text" class="form-control" id="attendance_date14"
                                                        readonly="" name="attendance_date14" value="14-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day14"
                                                        id="attendance_day" readonly="" name="attendance_day14"
                                                        value="Sunday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="14"
                                                        id="attendance_start_14" name="attendance_start_14" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_14"
                                                        name="attendance_normal_start_14" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="14"
                                                        id="attendance_end_14" name="attendance_end_14" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_14"
                                                        name="attendance_normal_end_14" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day14 change"
                                                        data-line="14" value="1" name="attendance_next_day14">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="14"
                                                        id="attendance_lunch14" name="attendance_lunch14"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_2" data-week="2" readonly=""
                                                        id="attendance_total14" name="attendance_total14"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_normal14"
                                                        name="attendance_normal14">
                                                    <input type="hidden" id="attendance_normal_hidden14"
                                                        name="attendance_normal_hidden14" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="2" id="attendance_ot14" value=""
                                                        name="attendance_ot14">
                                                    <!--<input type="hidden" id="attendance_ot_hidden14" name="attendance_ot_hidden14" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate14"
                                                        name="attendance_ot_rate14" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum14"
                                                        name="attendance_allowance_minimum14" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum14"
                                                        name="attendance_allowance_maximum14" value="">
                                                    <input type="hidden" id="attendance_allowance14"
                                                        name="attendance_allowance14" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden14" name="attendance_ot_hidden14"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit14" value="1"
                                                        name="attendance_edit14">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work14" data-line="14"
                                                        value="1" name="work14" data-content="1">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph14" data-line="14"
                                                        value="1" name="attendance_ph14">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay14"
                                                        data-line="14" value="1" name="attendance_ph_pay14">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks14" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date14" readonly name="attendance_date14" value = "14-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day14" id="attendance_day" readonly name="attendance_day14" value = "Sunday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="14"
                                                        id="attendance_leave14" name="attendance_leave14"
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
                                                    <select class="form-control change leave_days" data-line="14"
                                                        id="attendance_leave_day14" name="attendance_leave_day14"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file14"
                                                        name="attendance_leave_file14[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file14"
                                                        name="attendance_leave_existing_file14" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file14"
                                                        name="attendance_claim_file14[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="14" id="attendance_reimbursement14" multiple=""
                                                        name="attendance_reimbursement14[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="14" id="attendance_reimbursement14" name="attendance_reimbursement14[]" style = 'width:100%'>-->
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
                                                        value="" data-week="2" id="attendance_reimbursement_amount14"
                                                        name="attendance_reimbursement_amount14">
                                                </div>
                                            </div>
                                            <div style="display:flex">
                                                <div style="flex:0 0 850px"></div>
                                                <div style="text-align:left;flex:0 0 120px">
                                                    <p><b>Total Hour (Week): </b></p>
                                                </div>
                                                <div class="week_text_2 = " style="text-align:left;flex:0 0 200px">
                                                    <p>
                                                        <b>
                                                            0 hour </b>
                                                    </p>
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight15"
                                                        name="attendance_highlight15">
                                                    <input type="text" class="form-control" id="attendance_date15"
                                                        readonly="" name="attendance_date15" value="15-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day15"
                                                        id="attendance_day" readonly="" name="attendance_day15"
                                                        value="Monday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="15"
                                                        id="attendance_start_15" name="attendance_start_15" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_15"
                                                        name="attendance_normal_start_15" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="15"
                                                        id="attendance_end_15" name="attendance_end_15" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_15"
                                                        name="attendance_normal_end_15" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day15 change"
                                                        data-line="15" value="1" name="attendance_next_day15">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="15"
                                                        id="attendance_lunch15" name="attendance_lunch15"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_3" data-week="3" readonly=""
                                                        id="attendance_total15" name="attendance_total15"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_normal15"
                                                        name="attendance_normal15">
                                                    <input type="hidden" id="attendance_normal_hidden15"
                                                        name="attendance_normal_hidden15" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_ot15" value=""
                                                        name="attendance_ot15">
                                                    <!--<input type="hidden" id="attendance_ot_hidden15" name="attendance_ot_hidden15" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate15"
                                                        name="attendance_ot_rate15" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum15"
                                                        name="attendance_allowance_minimum15" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum15"
                                                        name="attendance_allowance_maximum15" value="">
                                                    <input type="hidden" id="attendance_allowance15"
                                                        name="attendance_allowance15" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden15" name="attendance_ot_hidden15"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit15" value="1"
                                                        name="attendance_edit15">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work15" data-line="15"
                                                        value="1" name="work15">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph15" data-line="15"
                                                        value="1" name="attendance_ph15">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay15"
                                                        data-line="15" value="1" name="attendance_ph_pay15">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks15" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date15" readonly name="attendance_date15" value = "15-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day15" id="attendance_day" readonly name="attendance_day15" value = "Monday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="15"
                                                        id="attendance_leave15" name="attendance_leave15"
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
                                                    <select class="form-control change leave_days" data-line="15"
                                                        id="attendance_leave_day15" name="attendance_leave_day15"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file15"
                                                        name="attendance_leave_file15[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file15"
                                                        name="attendance_leave_existing_file15" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file15"
                                                        name="attendance_claim_file15[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="15" id="attendance_reimbursement15" multiple=""
                                                        name="attendance_reimbursement15[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="15" id="attendance_reimbursement15" name="attendance_reimbursement15[]" style = 'width:100%'>-->
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
                                                        value="" data-week="3" id="attendance_reimbursement_amount15"
                                                        name="attendance_reimbursement_amount15">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight16"
                                                        name="attendance_highlight16">
                                                    <input type="text" class="form-control" id="attendance_date16"
                                                        readonly="" name="attendance_date16" value="16-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day16"
                                                        id="attendance_day" readonly="" name="attendance_day16"
                                                        value="Tuesday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="16"
                                                        id="attendance_start_16" name="attendance_start_16" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_16"
                                                        name="attendance_normal_start_16" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="16"
                                                        id="attendance_end_16" name="attendance_end_16" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_16"
                                                        name="attendance_normal_end_16" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day16 change"
                                                        data-line="16" value="1" name="attendance_next_day16">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="16"
                                                        id="attendance_lunch16" name="attendance_lunch16"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_3" data-week="3" readonly=""
                                                        id="attendance_total16" name="attendance_total16"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_normal16"
                                                        name="attendance_normal16">
                                                    <input type="hidden" id="attendance_normal_hidden16"
                                                        name="attendance_normal_hidden16" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_ot16" value=""
                                                        name="attendance_ot16">
                                                    <!--<input type="hidden" id="attendance_ot_hidden16" name="attendance_ot_hidden16" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate16"
                                                        name="attendance_ot_rate16" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum16"
                                                        name="attendance_allowance_minimum16" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum16"
                                                        name="attendance_allowance_maximum16" value="">
                                                    <input type="hidden" id="attendance_allowance16"
                                                        name="attendance_allowance16" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden16" name="attendance_ot_hidden16"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit16" value="1"
                                                        name="attendance_edit16">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work16" data-line="16"
                                                        value="1" name="work16">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph16" data-line="16"
                                                        value="1" name="attendance_ph16">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay16"
                                                        data-line="16" value="1" name="attendance_ph_pay16">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks16" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date16" readonly name="attendance_date16" value = "16-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day16" id="attendance_day" readonly name="attendance_day16" value = "Tuesday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="16"
                                                        id="attendance_leave16" name="attendance_leave16"
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
                                                    <select class="form-control change leave_days" data-line="16"
                                                        id="attendance_leave_day16" name="attendance_leave_day16"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file16"
                                                        name="attendance_leave_file16[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file16"
                                                        name="attendance_leave_existing_file16" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file16"
                                                        name="attendance_claim_file16[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="16" id="attendance_reimbursement16" multiple=""
                                                        name="attendance_reimbursement16[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="16" id="attendance_reimbursement16" name="attendance_reimbursement16[]" style = 'width:100%'>-->
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
                                                        value="" data-week="3" id="attendance_reimbursement_amount16"
                                                        name="attendance_reimbursement_amount16">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight17"
                                                        name="attendance_highlight17">
                                                    <input type="text" class="form-control" id="attendance_date17"
                                                        readonly="" name="attendance_date17" value="17-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day17"
                                                        id="attendance_day" readonly="" name="attendance_day17"
                                                        value="Wednesday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="17"
                                                        id="attendance_start_17" name="attendance_start_17" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_17"
                                                        name="attendance_normal_start_17" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="17"
                                                        id="attendance_end_17" name="attendance_end_17" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_17"
                                                        name="attendance_normal_end_17" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day17 change"
                                                        data-line="17" value="1" name="attendance_next_day17">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="17"
                                                        id="attendance_lunch17" name="attendance_lunch17"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_3" data-week="3" readonly=""
                                                        id="attendance_total17" name="attendance_total17"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_normal17"
                                                        name="attendance_normal17">
                                                    <input type="hidden" id="attendance_normal_hidden17"
                                                        name="attendance_normal_hidden17" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_ot17" value=""
                                                        name="attendance_ot17">
                                                    <!--<input type="hidden" id="attendance_ot_hidden17" name="attendance_ot_hidden17" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate17"
                                                        name="attendance_ot_rate17" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum17"
                                                        name="attendance_allowance_minimum17" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum17"
                                                        name="attendance_allowance_maximum17" value="">
                                                    <input type="hidden" id="attendance_allowance17"
                                                        name="attendance_allowance17" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden17" name="attendance_ot_hidden17"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit17" value="1"
                                                        name="attendance_edit17">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work17" data-line="17"
                                                        value="1" name="work17">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph17" data-line="17"
                                                        value="1" name="attendance_ph17">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay17"
                                                        data-line="17" value="1" name="attendance_ph_pay17">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks17" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date17" readonly name="attendance_date17" value = "17-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day17" id="attendance_day" readonly name="attendance_day17" value = "Wednesday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="17"
                                                        id="attendance_leave17" name="attendance_leave17"
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
                                                    <select class="form-control change leave_days" data-line="17"
                                                        id="attendance_leave_day17" name="attendance_leave_day17"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file17"
                                                        name="attendance_leave_file17[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file17"
                                                        name="attendance_leave_existing_file17" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file17"
                                                        name="attendance_claim_file17[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="17" id="attendance_reimbursement17" multiple=""
                                                        name="attendance_reimbursement17[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="17" id="attendance_reimbursement17" name="attendance_reimbursement17[]" style = 'width:100%'>-->
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
                                                        value="" data-week="3" id="attendance_reimbursement_amount17"
                                                        name="attendance_reimbursement_amount17">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight18"
                                                        name="attendance_highlight18">
                                                    <input type="text" class="form-control" id="attendance_date18"
                                                        readonly="" name="attendance_date18" value="18-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day18"
                                                        id="attendance_day" readonly="" name="attendance_day18"
                                                        value="Thursday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="18"
                                                        id="attendance_start_18" name="attendance_start_18" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_18"
                                                        name="attendance_normal_start_18" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="18"
                                                        id="attendance_end_18" name="attendance_end_18" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_18"
                                                        name="attendance_normal_end_18" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day18 change"
                                                        data-line="18" value="1" name="attendance_next_day18">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="18"
                                                        id="attendance_lunch18" name="attendance_lunch18"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_3" data-week="3" readonly=""
                                                        id="attendance_total18" name="attendance_total18"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_normal18"
                                                        name="attendance_normal18">
                                                    <input type="hidden" id="attendance_normal_hidden18"
                                                        name="attendance_normal_hidden18" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_ot18" value=""
                                                        name="attendance_ot18">
                                                    <!--<input type="hidden" id="attendance_ot_hidden18" name="attendance_ot_hidden18" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate18"
                                                        name="attendance_ot_rate18" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum18"
                                                        name="attendance_allowance_minimum18" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum18"
                                                        name="attendance_allowance_maximum18" value="">
                                                    <input type="hidden" id="attendance_allowance18"
                                                        name="attendance_allowance18" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden18" name="attendance_ot_hidden18"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit18" value="1"
                                                        name="attendance_edit18">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work18" data-line="18"
                                                        value="1" name="work18">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph18" data-line="18"
                                                        value="1" name="attendance_ph18">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay18"
                                                        data-line="18" value="1" name="attendance_ph_pay18">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks18" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date18" readonly name="attendance_date18" value = "18-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day18" id="attendance_day" readonly name="attendance_day18" value = "Thursday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="18"
                                                        id="attendance_leave18" name="attendance_leave18"
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
                                                    <select class="form-control change leave_days" data-line="18"
                                                        id="attendance_leave_day18" name="attendance_leave_day18"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file18"
                                                        name="attendance_leave_file18[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file18"
                                                        name="attendance_leave_existing_file18" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file18"
                                                        name="attendance_claim_file18[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="18" id="attendance_reimbursement18" multiple=""
                                                        name="attendance_reimbursement18[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="18" id="attendance_reimbursement18" name="attendance_reimbursement18[]" style = 'width:100%'>-->
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
                                                        value="" data-week="3" id="attendance_reimbursement_amount18"
                                                        name="attendance_reimbursement_amount18">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight19"
                                                        name="attendance_highlight19">
                                                    <input type="text" class="form-control" id="attendance_date19"
                                                        readonly="" name="attendance_date19" value="19-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day19"
                                                        id="attendance_day" readonly="" name="attendance_day19"
                                                        value="Friday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="19"
                                                        id="attendance_start_19" name="attendance_start_19" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_19"
                                                        name="attendance_normal_start_19" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="19"
                                                        id="attendance_end_19" name="attendance_end_19" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_19"
                                                        name="attendance_normal_end_19" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day19 change"
                                                        data-line="19" value="1" name="attendance_next_day19">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="19"
                                                        id="attendance_lunch19" name="attendance_lunch19"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_3" data-week="3" readonly=""
                                                        id="attendance_total19" name="attendance_total19"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_normal19"
                                                        name="attendance_normal19">
                                                    <input type="hidden" id="attendance_normal_hidden19"
                                                        name="attendance_normal_hidden19" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_ot19" value=""
                                                        name="attendance_ot19">
                                                    <!--<input type="hidden" id="attendance_ot_hidden19" name="attendance_ot_hidden19" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate19"
                                                        name="attendance_ot_rate19" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum19"
                                                        name="attendance_allowance_minimum19" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum19"
                                                        name="attendance_allowance_maximum19" value="">
                                                    <input type="hidden" id="attendance_allowance19"
                                                        name="attendance_allowance19" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden19" name="attendance_ot_hidden19"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit19" value="1"
                                                        name="attendance_edit19">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work19" data-line="19"
                                                        value="1" name="work19">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph19" data-line="19"
                                                        value="1" name="attendance_ph19">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay19"
                                                        data-line="19" value="1" name="attendance_ph_pay19">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks19" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date19" readonly name="attendance_date19" value = "19-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day19" id="attendance_day" readonly name="attendance_day19" value = "Friday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="19"
                                                        id="attendance_leave19" name="attendance_leave19"
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
                                                    <select class="form-control change leave_days" data-line="19"
                                                        id="attendance_leave_day19" name="attendance_leave_day19"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file19"
                                                        name="attendance_leave_file19[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file19"
                                                        name="attendance_leave_existing_file19" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file19"
                                                        name="attendance_claim_file19[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="19" id="attendance_reimbursement19" multiple=""
                                                        name="attendance_reimbursement19[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="19" id="attendance_reimbursement19" name="attendance_reimbursement19[]" style = 'width:100%'>-->
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
                                                        value="" data-week="3" id="attendance_reimbursement_amount19"
                                                        name="attendance_reimbursement_amount19">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight20"
                                                        name="attendance_highlight20">
                                                    <input type="text" class="form-control" id="attendance_date20"
                                                        readonly="" name="attendance_date20" value="20-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day20"
                                                        id="attendance_day" readonly="" name="attendance_day20"
                                                        value="Saturday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="20"
                                                        id="attendance_start_20" name="attendance_start_20" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_20"
                                                        name="attendance_normal_start_20" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="20"
                                                        id="attendance_end_20" name="attendance_end_20" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_20"
                                                        name="attendance_normal_end_20" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day20 change"
                                                        data-line="20" value="1" name="attendance_next_day20">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="20"
                                                        id="attendance_lunch20" name="attendance_lunch20"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_3" data-week="3" readonly=""
                                                        id="attendance_total20" name="attendance_total20"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_normal20"
                                                        name="attendance_normal20">
                                                    <input type="hidden" id="attendance_normal_hidden20"
                                                        name="attendance_normal_hidden20" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_ot20" value=""
                                                        name="attendance_ot20">
                                                    <!--<input type="hidden" id="attendance_ot_hidden20" name="attendance_ot_hidden20" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate20"
                                                        name="attendance_ot_rate20" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum20"
                                                        name="attendance_allowance_minimum20" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum20"
                                                        name="attendance_allowance_maximum20" value="">
                                                    <input type="hidden" id="attendance_allowance20"
                                                        name="attendance_allowance20" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden20" name="attendance_ot_hidden20"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit20" value="1"
                                                        name="attendance_edit20">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work20" data-line="20"
                                                        value="1" name="work20">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph20" data-line="20"
                                                        value="1" name="attendance_ph20">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay20"
                                                        data-line="20" value="1" name="attendance_ph_pay20">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks20" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date20" readonly name="attendance_date20" value = "20-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day20" id="attendance_day" readonly name="attendance_day20" value = "Saturday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="20"
                                                        id="attendance_leave20" name="attendance_leave20"
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
                                                    <select class="form-control change leave_days" data-line="20"
                                                        id="attendance_leave_day20" name="attendance_leave_day20"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file20"
                                                        name="attendance_leave_file20[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file20"
                                                        name="attendance_leave_existing_file20" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file20"
                                                        name="attendance_claim_file20[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="20" id="attendance_reimbursement20" multiple=""
                                                        name="attendance_reimbursement20[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="20" id="attendance_reimbursement20" name="attendance_reimbursement20[]" style = 'width:100%'>-->
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
                                                        value="" data-week="3" id="attendance_reimbursement_amount20"
                                                        name="attendance_reimbursement_amount20">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight21"
                                                        name="attendance_highlight21">
                                                    <input type="text" class="form-control" id="attendance_date21"
                                                        readonly="" name="attendance_date21" value="21-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day21"
                                                        id="attendance_day" readonly="" name="attendance_day21"
                                                        value="Sunday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="21"
                                                        id="attendance_start_21" name="attendance_start_21" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_21"
                                                        name="attendance_normal_start_21" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="21"
                                                        id="attendance_end_21" name="attendance_end_21" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_21"
                                                        name="attendance_normal_end_21" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day21 change"
                                                        data-line="21" value="1" name="attendance_next_day21">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="21"
                                                        id="attendance_lunch21" name="attendance_lunch21"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_3" data-week="3" readonly=""
                                                        id="attendance_total21" name="attendance_total21"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_normal21"
                                                        name="attendance_normal21">
                                                    <input type="hidden" id="attendance_normal_hidden21"
                                                        name="attendance_normal_hidden21" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="3" id="attendance_ot21" value=""
                                                        name="attendance_ot21">
                                                    <!--<input type="hidden" id="attendance_ot_hidden21" name="attendance_ot_hidden21" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate21"
                                                        name="attendance_ot_rate21" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum21"
                                                        name="attendance_allowance_minimum21" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum21"
                                                        name="attendance_allowance_maximum21" value="">
                                                    <input type="hidden" id="attendance_allowance21"
                                                        name="attendance_allowance21" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden21" name="attendance_ot_hidden21"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit21" value="1"
                                                        name="attendance_edit21">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work21" data-line="21"
                                                        value="1" name="work21" data-content="1">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph21" data-line="21"
                                                        value="1" name="attendance_ph21">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay21"
                                                        data-line="21" value="1" name="attendance_ph_pay21">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks21" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date21" readonly name="attendance_date21" value = "21-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day21" id="attendance_day" readonly name="attendance_day21" value = "Sunday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="21"
                                                        id="attendance_leave21" name="attendance_leave21"
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
                                                    <select class="form-control change leave_days" data-line="21"
                                                        id="attendance_leave_day21" name="attendance_leave_day21"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file21"
                                                        name="attendance_leave_file21[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file21"
                                                        name="attendance_leave_existing_file21" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file21"
                                                        name="attendance_claim_file21[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="21" id="attendance_reimbursement21" multiple=""
                                                        name="attendance_reimbursement21[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="21" id="attendance_reimbursement21" name="attendance_reimbursement21[]" style = 'width:100%'>-->
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
                                                        value="" data-week="3" id="attendance_reimbursement_amount21"
                                                        name="attendance_reimbursement_amount21">
                                                </div>
                                            </div>
                                            <div style="display:flex">
                                                <div style="flex:0 0 850px"></div>
                                                <div style="text-align:left;flex:0 0 120px">
                                                    <p><b>Total Hour (Week): </b></p>
                                                </div>
                                                <div class="week_text_3 = " style="text-align:left;flex:0 0 200px">
                                                    <p>
                                                        <b>
                                                            0 hour </b>
                                                    </p>
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight22"
                                                        name="attendance_highlight22">
                                                    <input type="text" class="form-control" id="attendance_date22"
                                                        readonly="" name="attendance_date22" value="22-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day22"
                                                        id="attendance_day" readonly="" name="attendance_day22"
                                                        value="Monday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="22"
                                                        id="attendance_start_22" name="attendance_start_22" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_22"
                                                        name="attendance_normal_start_22" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="22"
                                                        id="attendance_end_22" name="attendance_end_22" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_22"
                                                        name="attendance_normal_end_22" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day22 change"
                                                        data-line="22" value="1" name="attendance_next_day22">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="22"
                                                        id="attendance_lunch22" name="attendance_lunch22"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_4" data-week="4" readonly=""
                                                        id="attendance_total22" name="attendance_total22"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_normal22"
                                                        name="attendance_normal22">
                                                    <input type="hidden" id="attendance_normal_hidden22"
                                                        name="attendance_normal_hidden22" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_ot22" value=""
                                                        name="attendance_ot22">
                                                    <!--<input type="hidden" id="attendance_ot_hidden22" name="attendance_ot_hidden22" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate22"
                                                        name="attendance_ot_rate22" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum22"
                                                        name="attendance_allowance_minimum22" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum22"
                                                        name="attendance_allowance_maximum22" value="">
                                                    <input type="hidden" id="attendance_allowance22"
                                                        name="attendance_allowance22" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden22" name="attendance_ot_hidden22"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit22" value="1"
                                                        name="attendance_edit22">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work22" data-line="22"
                                                        value="1" name="work22">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph22" data-line="22"
                                                        value="1" name="attendance_ph22">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay22"
                                                        data-line="22" value="1" name="attendance_ph_pay22">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks22" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date22" readonly name="attendance_date22" value = "22-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day22" id="attendance_day" readonly name="attendance_day22" value = "Monday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="22"
                                                        id="attendance_leave22" name="attendance_leave22"
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
                                                    <select class="form-control change leave_days" data-line="22"
                                                        id="attendance_leave_day22" name="attendance_leave_day22"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file22"
                                                        name="attendance_leave_file22[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file22"
                                                        name="attendance_leave_existing_file22" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file22"
                                                        name="attendance_claim_file22[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="22" id="attendance_reimbursement22" multiple=""
                                                        name="attendance_reimbursement22[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="22" id="attendance_reimbursement22" name="attendance_reimbursement22[]" style = 'width:100%'>-->
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
                                                        value="" data-week="4" id="attendance_reimbursement_amount22"
                                                        name="attendance_reimbursement_amount22">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight23"
                                                        name="attendance_highlight23">
                                                    <input type="text" class="form-control" id="attendance_date23"
                                                        readonly="" name="attendance_date23" value="23-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day23"
                                                        id="attendance_day" readonly="" name="attendance_day23"
                                                        value="Tuesday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="23"
                                                        id="attendance_start_23" name="attendance_start_23" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_23"
                                                        name="attendance_normal_start_23" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="23"
                                                        id="attendance_end_23" name="attendance_end_23" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_23"
                                                        name="attendance_normal_end_23" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day23 change"
                                                        data-line="23" value="1" name="attendance_next_day23">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="23"
                                                        id="attendance_lunch23" name="attendance_lunch23"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_4" data-week="4" readonly=""
                                                        id="attendance_total23" name="attendance_total23"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_normal23"
                                                        name="attendance_normal23">
                                                    <input type="hidden" id="attendance_normal_hidden23"
                                                        name="attendance_normal_hidden23" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_ot23" value=""
                                                        name="attendance_ot23">
                                                    <!--<input type="hidden" id="attendance_ot_hidden23" name="attendance_ot_hidden23" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate23"
                                                        name="attendance_ot_rate23" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum23"
                                                        name="attendance_allowance_minimum23" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum23"
                                                        name="attendance_allowance_maximum23" value="">
                                                    <input type="hidden" id="attendance_allowance23"
                                                        name="attendance_allowance23" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden23" name="attendance_ot_hidden23"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit23" value="1"
                                                        name="attendance_edit23">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work23" data-line="23"
                                                        value="1" name="work23">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph23" data-line="23"
                                                        value="1" name="attendance_ph23">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay23"
                                                        data-line="23" value="1" name="attendance_ph_pay23">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks23" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date23" readonly name="attendance_date23" value = "23-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day23" id="attendance_day" readonly name="attendance_day23" value = "Tuesday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="23"
                                                        id="attendance_leave23" name="attendance_leave23"
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
                                                    <select class="form-control change leave_days" data-line="23"
                                                        id="attendance_leave_day23" name="attendance_leave_day23"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file23"
                                                        name="attendance_leave_file23[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file23"
                                                        name="attendance_leave_existing_file23" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file23"
                                                        name="attendance_claim_file23[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="23" id="attendance_reimbursement23" multiple=""
                                                        name="attendance_reimbursement23[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="23" id="attendance_reimbursement23" name="attendance_reimbursement23[]" style = 'width:100%'>-->
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
                                                        value="" data-week="4" id="attendance_reimbursement_amount23"
                                                        name="attendance_reimbursement_amount23">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight24"
                                                        name="attendance_highlight24">
                                                    <input type="text" class="form-control" id="attendance_date24"
                                                        readonly="" name="attendance_date24" value="24-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day24"
                                                        id="attendance_day" readonly="" name="attendance_day24"
                                                        value="Wednesday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="24"
                                                        id="attendance_start_24" name="attendance_start_24" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_24"
                                                        name="attendance_normal_start_24" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="24"
                                                        id="attendance_end_24" name="attendance_end_24" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_24"
                                                        name="attendance_normal_end_24" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day24 change"
                                                        data-line="24" value="1" name="attendance_next_day24">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="24"
                                                        id="attendance_lunch24" name="attendance_lunch24"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_4" data-week="4" readonly=""
                                                        id="attendance_total24" name="attendance_total24"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_normal24"
                                                        name="attendance_normal24">
                                                    <input type="hidden" id="attendance_normal_hidden24"
                                                        name="attendance_normal_hidden24" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_ot24" value=""
                                                        name="attendance_ot24">
                                                    <!--<input type="hidden" id="attendance_ot_hidden24" name="attendance_ot_hidden24" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate24"
                                                        name="attendance_ot_rate24" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum24"
                                                        name="attendance_allowance_minimum24" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum24"
                                                        name="attendance_allowance_maximum24" value="">
                                                    <input type="hidden" id="attendance_allowance24"
                                                        name="attendance_allowance24" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden24" name="attendance_ot_hidden24"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit24" value="1"
                                                        name="attendance_edit24">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work24" data-line="24"
                                                        value="1" name="work24">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph24" data-line="24"
                                                        value="1" name="attendance_ph24">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay24"
                                                        data-line="24" value="1" name="attendance_ph_pay24">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks24" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date24" readonly name="attendance_date24" value = "24-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day24" id="attendance_day" readonly name="attendance_day24" value = "Wednesday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="24"
                                                        id="attendance_leave24" name="attendance_leave24"
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
                                                    <select class="form-control change leave_days" data-line="24"
                                                        id="attendance_leave_day24" name="attendance_leave_day24"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file24"
                                                        name="attendance_leave_file24[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file24"
                                                        name="attendance_leave_existing_file24" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file24"
                                                        name="attendance_claim_file24[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="24" id="attendance_reimbursement24" multiple=""
                                                        name="attendance_reimbursement24[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="24" id="attendance_reimbursement24" name="attendance_reimbursement24[]" style = 'width:100%'>-->
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
                                                        value="" data-week="4" id="attendance_reimbursement_amount24"
                                                        name="attendance_reimbursement_amount24">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight25"
                                                        name="attendance_highlight25">
                                                    <input type="text" class="form-control" id="attendance_date25"
                                                        readonly="" name="attendance_date25" value="25-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day25"
                                                        id="attendance_day" readonly="" name="attendance_day25"
                                                        value="Thursday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="25"
                                                        id="attendance_start_25" name="attendance_start_25" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_25"
                                                        name="attendance_normal_start_25" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="25"
                                                        id="attendance_end_25" name="attendance_end_25" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_25"
                                                        name="attendance_normal_end_25" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day25 change"
                                                        data-line="25" value="1" name="attendance_next_day25">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="25"
                                                        id="attendance_lunch25" name="attendance_lunch25"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_4" data-week="4" readonly=""
                                                        id="attendance_total25" name="attendance_total25"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_normal25"
                                                        name="attendance_normal25">
                                                    <input type="hidden" id="attendance_normal_hidden25"
                                                        name="attendance_normal_hidden25" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_ot25" value=""
                                                        name="attendance_ot25">
                                                    <!--<input type="hidden" id="attendance_ot_hidden25" name="attendance_ot_hidden25" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate25"
                                                        name="attendance_ot_rate25" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum25"
                                                        name="attendance_allowance_minimum25" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum25"
                                                        name="attendance_allowance_maximum25" value="">
                                                    <input type="hidden" id="attendance_allowance25"
                                                        name="attendance_allowance25" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden25" name="attendance_ot_hidden25"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit25" value="1"
                                                        name="attendance_edit25">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work25" data-line="25"
                                                        value="1" name="work25">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph25" data-line="25"
                                                        value="1" name="attendance_ph25">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay25"
                                                        data-line="25" value="1" name="attendance_ph_pay25">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks25" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date25" readonly name="attendance_date25" value = "25-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day25" id="attendance_day" readonly name="attendance_day25" value = "Thursday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="25"
                                                        id="attendance_leave25" name="attendance_leave25"
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
                                                    <select class="form-control change leave_days" data-line="25"
                                                        id="attendance_leave_day25" name="attendance_leave_day25"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file25"
                                                        name="attendance_leave_file25[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file25"
                                                        name="attendance_leave_existing_file25" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file25"
                                                        name="attendance_claim_file25[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="25" id="attendance_reimbursement25" multiple=""
                                                        name="attendance_reimbursement25[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="25" id="attendance_reimbursement25" name="attendance_reimbursement25[]" style = 'width:100%'>-->
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
                                                        value="" data-week="4" id="attendance_reimbursement_amount25"
                                                        name="attendance_reimbursement_amount25">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight26"
                                                        name="attendance_highlight26">
                                                    <input type="text" class="form-control" id="attendance_date26"
                                                        readonly="" name="attendance_date26" value="26-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day26"
                                                        id="attendance_day" readonly="" name="attendance_day26"
                                                        value="Friday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="26"
                                                        id="attendance_start_26" name="attendance_start_26" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_26"
                                                        name="attendance_normal_start_26" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="26"
                                                        id="attendance_end_26" name="attendance_end_26" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_26"
                                                        name="attendance_normal_end_26" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day26 change"
                                                        data-line="26" value="1" name="attendance_next_day26">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="26"
                                                        id="attendance_lunch26" name="attendance_lunch26"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_4" data-week="4" readonly=""
                                                        id="attendance_total26" name="attendance_total26"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_normal26"
                                                        name="attendance_normal26">
                                                    <input type="hidden" id="attendance_normal_hidden26"
                                                        name="attendance_normal_hidden26" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_ot26" value=""
                                                        name="attendance_ot26">
                                                    <!--<input type="hidden" id="attendance_ot_hidden26" name="attendance_ot_hidden26" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate26"
                                                        name="attendance_ot_rate26" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum26"
                                                        name="attendance_allowance_minimum26" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum26"
                                                        name="attendance_allowance_maximum26" value="">
                                                    <input type="hidden" id="attendance_allowance26"
                                                        name="attendance_allowance26" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden26" name="attendance_ot_hidden26"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit26" value="1"
                                                        name="attendance_edit26">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work26" data-line="26"
                                                        value="1" name="work26">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph26" data-line="26"
                                                        value="1" name="attendance_ph26">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay26"
                                                        data-line="26" value="1" name="attendance_ph_pay26">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks26" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date26" readonly name="attendance_date26" value = "26-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day26" id="attendance_day" readonly name="attendance_day26" value = "Friday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="26"
                                                        id="attendance_leave26" name="attendance_leave26"
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
                                                    <select class="form-control change leave_days" data-line="26"
                                                        id="attendance_leave_day26" name="attendance_leave_day26"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file26"
                                                        name="attendance_leave_file26[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file26"
                                                        name="attendance_leave_existing_file26" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file26"
                                                        name="attendance_claim_file26[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="26" id="attendance_reimbursement26" multiple=""
                                                        name="attendance_reimbursement26[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="26" id="attendance_reimbursement26" name="attendance_reimbursement26[]" style = 'width:100%'>-->
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
                                                        value="" data-week="4" id="attendance_reimbursement_amount26"
                                                        name="attendance_reimbursement_amount26">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight27"
                                                        name="attendance_highlight27">
                                                    <input type="text" class="form-control" id="attendance_date27"
                                                        readonly="" name="attendance_date27" value="27-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day27"
                                                        id="attendance_day" readonly="" name="attendance_day27"
                                                        value="Saturday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="27"
                                                        id="attendance_start_27" name="attendance_start_27" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_27"
                                                        name="attendance_normal_start_27" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="27"
                                                        id="attendance_end_27" name="attendance_end_27" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_27"
                                                        name="attendance_normal_end_27" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day27 change"
                                                        data-line="27" value="1" name="attendance_next_day27">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="27"
                                                        id="attendance_lunch27" name="attendance_lunch27"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_4" data-week="4" readonly=""
                                                        id="attendance_total27" name="attendance_total27"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_normal27"
                                                        name="attendance_normal27">
                                                    <input type="hidden" id="attendance_normal_hidden27"
                                                        name="attendance_normal_hidden27" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_ot27" value=""
                                                        name="attendance_ot27">
                                                    <!--<input type="hidden" id="attendance_ot_hidden27" name="attendance_ot_hidden27" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate27"
                                                        name="attendance_ot_rate27" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum27"
                                                        name="attendance_allowance_minimum27" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum27"
                                                        name="attendance_allowance_maximum27" value="">
                                                    <input type="hidden" id="attendance_allowance27"
                                                        name="attendance_allowance27" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden27" name="attendance_ot_hidden27"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit27" value="1"
                                                        name="attendance_edit27">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work27" data-line="27"
                                                        value="1" name="work27">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph27" data-line="27"
                                                        value="1" name="attendance_ph27">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay27"
                                                        data-line="27" value="1" name="attendance_ph_pay27">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks27" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date27" readonly name="attendance_date27" value = "27-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day27" id="attendance_day" readonly name="attendance_day27" value = "Saturday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="27"
                                                        id="attendance_leave27" name="attendance_leave27"
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
                                                    <select class="form-control change leave_days" data-line="27"
                                                        id="attendance_leave_day27" name="attendance_leave_day27"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file27"
                                                        name="attendance_leave_file27[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file27"
                                                        name="attendance_leave_existing_file27" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file27"
                                                        name="attendance_claim_file27[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="27" id="attendance_reimbursement27" multiple=""
                                                        name="attendance_reimbursement27[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="27" id="attendance_reimbursement27" name="attendance_reimbursement27[]" style = 'width:100%'>-->
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
                                                        value="" data-week="4" id="attendance_reimbursement_amount27"
                                                        name="attendance_reimbursement_amount27">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight28"
                                                        name="attendance_highlight28">
                                                    <input type="text" class="form-control" id="attendance_date28"
                                                        readonly="" name="attendance_date28" value="28-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day28"
                                                        id="attendance_day" readonly="" name="attendance_day28"
                                                        value="Sunday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="28"
                                                        id="attendance_start_28" name="attendance_start_28" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_28"
                                                        name="attendance_normal_start_28" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="28"
                                                        id="attendance_end_28" name="attendance_end_28" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_28"
                                                        name="attendance_normal_end_28" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day28 change"
                                                        data-line="28" value="1" name="attendance_next_day28">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="28"
                                                        id="attendance_lunch28" name="attendance_lunch28"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_4" data-week="4" readonly=""
                                                        id="attendance_total28" name="attendance_total28"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_normal28"
                                                        name="attendance_normal28">
                                                    <input type="hidden" id="attendance_normal_hidden28"
                                                        name="attendance_normal_hidden28" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="4" id="attendance_ot28" value=""
                                                        name="attendance_ot28">
                                                    <!--<input type="hidden" id="attendance_ot_hidden28" name="attendance_ot_hidden28" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate28"
                                                        name="attendance_ot_rate28" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum28"
                                                        name="attendance_allowance_minimum28" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum28"
                                                        name="attendance_allowance_maximum28" value="">
                                                    <input type="hidden" id="attendance_allowance28"
                                                        name="attendance_allowance28" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden28" name="attendance_ot_hidden28"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit28" value="1"
                                                        name="attendance_edit28">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work28" data-line="28"
                                                        value="1" name="work28" data-content="1">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph28" data-line="28"
                                                        value="1" name="attendance_ph28">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay28"
                                                        data-line="28" value="1" name="attendance_ph_pay28">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks28" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date28" readonly name="attendance_date28" value = "28-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day28" id="attendance_day" readonly name="attendance_day28" value = "Sunday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="28"
                                                        id="attendance_leave28" name="attendance_leave28"
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
                                                    <select class="form-control change leave_days" data-line="28"
                                                        id="attendance_leave_day28" name="attendance_leave_day28"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file28"
                                                        name="attendance_leave_file28[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file28"
                                                        name="attendance_leave_existing_file28" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file28"
                                                        name="attendance_claim_file28[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="28" id="attendance_reimbursement28" multiple=""
                                                        name="attendance_reimbursement28[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="28" id="attendance_reimbursement28" name="attendance_reimbursement28[]" style = 'width:100%'>-->
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
                                                        value="" data-week="4" id="attendance_reimbursement_amount28"
                                                        name="attendance_reimbursement_amount28">
                                                </div>
                                            </div>
                                            <div style="display:flex">
                                                <div style="flex:0 0 850px"></div>
                                                <div style="text-align:left;flex:0 0 120px">
                                                    <p><b>Total Hour (Week): </b></p>
                                                </div>
                                                <div class="week_text_4 = " style="text-align:left;flex:0 0 200px">
                                                    <p>
                                                        <b>
                                                            0 hour </b>
                                                    </p>
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight29"
                                                        name="attendance_highlight29">
                                                    <input type="text" class="form-control" id="attendance_date29"
                                                        readonly="" name="attendance_date29" value="29-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day29"
                                                        id="attendance_day" readonly="" name="attendance_day29"
                                                        value="Monday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="29"
                                                        id="attendance_start_29" name="attendance_start_29" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_29"
                                                        name="attendance_normal_start_29" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="29"
                                                        id="attendance_end_29" name="attendance_end_29" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_29"
                                                        name="attendance_normal_end_29" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day29 change"
                                                        data-line="29" value="1" name="attendance_next_day29">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="29"
                                                        id="attendance_lunch29" name="attendance_lunch29"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_5" data-week="5" readonly=""
                                                        id="attendance_total29" name="attendance_total29"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="5" id="attendance_normal29"
                                                        name="attendance_normal29">
                                                    <input type="hidden" id="attendance_normal_hidden29"
                                                        name="attendance_normal_hidden29" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="5" id="attendance_ot29" value=""
                                                        name="attendance_ot29">
                                                    <!--<input type="hidden" id="attendance_ot_hidden29" name="attendance_ot_hidden29" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate29"
                                                        name="attendance_ot_rate29" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum29"
                                                        name="attendance_allowance_minimum29" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum29"
                                                        name="attendance_allowance_maximum29" value="">
                                                    <input type="hidden" id="attendance_allowance29"
                                                        name="attendance_allowance29" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden29" name="attendance_ot_hidden29"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit29" value="1"
                                                        name="attendance_edit29">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work29" data-line="29"
                                                        value="1" name="work29">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph29" data-line="29"
                                                        value="1" name="attendance_ph29">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay29"
                                                        data-line="29" value="1" name="attendance_ph_pay29">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks29" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date29" readonly name="attendance_date29" value = "29-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day29" id="attendance_day" readonly name="attendance_day29" value = "Monday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="29"
                                                        id="attendance_leave29" name="attendance_leave29"
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
                                                    <select class="form-control change leave_days" data-line="29"
                                                        id="attendance_leave_day29" name="attendance_leave_day29"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file29"
                                                        name="attendance_leave_file29[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file29"
                                                        name="attendance_leave_existing_file29" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file29"
                                                        name="attendance_claim_file29[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="29" id="attendance_reimbursement29" multiple=""
                                                        name="attendance_reimbursement29[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="29" id="attendance_reimbursement29" name="attendance_reimbursement29[]" style = 'width:100%'>-->
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
                                                        value="" data-week="5" id="attendance_reimbursement_amount29"
                                                        name="attendance_reimbursement_amount29">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight30"
                                                        name="attendance_highlight30">
                                                    <input type="text" class="form-control" id="attendance_date30"
                                                        readonly="" name="attendance_date30" value="30-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day30"
                                                        id="attendance_day" readonly="" name="attendance_day30"
                                                        value="Tuesday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="30"
                                                        id="attendance_start_30" name="attendance_start_30" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_30"
                                                        name="attendance_normal_start_30" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="30"
                                                        id="attendance_end_30" name="attendance_end_30" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_30"
                                                        name="attendance_normal_end_30" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day30 change"
                                                        data-line="30" value="1" name="attendance_next_day30">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="30"
                                                        id="attendance_lunch30" name="attendance_lunch30"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_5" data-week="5" readonly=""
                                                        id="attendance_total30" name="attendance_total30"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="5" id="attendance_normal30"
                                                        name="attendance_normal30">
                                                    <input type="hidden" id="attendance_normal_hidden30"
                                                        name="attendance_normal_hidden30" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="5" id="attendance_ot30" value=""
                                                        name="attendance_ot30">
                                                    <!--<input type="hidden" id="attendance_ot_hidden30" name="attendance_ot_hidden30" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate30"
                                                        name="attendance_ot_rate30" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum30"
                                                        name="attendance_allowance_minimum30" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum30"
                                                        name="attendance_allowance_maximum30" value="">
                                                    <input type="hidden" id="attendance_allowance30"
                                                        name="attendance_allowance30" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden30" name="attendance_ot_hidden30"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit30" value="1"
                                                        name="attendance_edit30">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work30" data-line="30"
                                                        value="1" name="work30">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph30" data-line="30"
                                                        value="1" name="attendance_ph30">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay30"
                                                        data-line="30" value="1" name="attendance_ph_pay30">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks30" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date30" readonly name="attendance_date30" value = "30-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day30" id="attendance_day" readonly name="attendance_day30" value = "Tuesday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="30"
                                                        id="attendance_leave30" name="attendance_leave30"
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
                                                    <select class="form-control change leave_days" data-line="30"
                                                        id="attendance_leave_day30" name="attendance_leave_day30"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file30"
                                                        name="attendance_leave_file30[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file30"
                                                        name="attendance_leave_existing_file30" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file30"
                                                        name="attendance_claim_file30[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="30" id="attendance_reimbursement30" multiple=""
                                                        name="attendance_reimbursement30[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="30" id="attendance_reimbursement30" name="attendance_reimbursement30[]" style = 'width:100%'>-->
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
                                                        value="" data-week="5" id="attendance_reimbursement_amount30"
                                                        name="attendance_reimbursement_amount30">
                                                </div>
                                            </div>


                                            <div style="display:flex">
                                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                                    <input type="hidden" value="" id="attendance_highlight31"
                                                        name="attendance_highlight31">
                                                    <input type="text" class="form-control" id="attendance_date31"
                                                        readonly="" name="attendance_date31" value="31-Jan-2024"
                                                        placeholder="Date">
                                                </div>
                                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                                    <input type="text" class="form-control attendance_day31"
                                                        id="attendance_day" readonly="" name="attendance_day31"
                                                        value="Wednesday" placeholder="Title">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 change"
                                                        readonly="" style="background-color: #fff;" data-line="31"
                                                        id="attendance_start_31" name="attendance_start_31" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_start_31"
                                                        name="attendance_normal_start_31" value="">
                                                </div>
                                                <div class="input-group bootstrap-timepicker"
                                                    style="float:left;flex:0 0 120px;">
                                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-action="incrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td class="meridian-column"><a href="#"
                                                                            data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="bootstrap-timepicker-hour"></span>
                                                                    </td>
                                                                    <td class="separator">:</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-minute"></span>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><span
                                                                            class="bootstrap-timepicker-meridian"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-action="decrementHour"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator"></td>
                                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                    <td class="separator">&nbsp;</td>
                                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                                class="glyphicon glyphicon-chevron-down"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="text" class="form-control timepicker1 time change"
                                                        readonly="" style="background-color: #fff;" data-line="31"
                                                        id="attendance_end_31" name="attendance_end_31" value=""
                                                        data-content="" placeholder="Time">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="hidden" id="attendance_normal_end_31"
                                                        name="attendance_normal_end_31" value="">
                                                </div>
                                                <!--next-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="attendance_next_day31 change"
                                                        data-line="31" value="1" name="attendance_next_day31">
                                                </div>
                                                <!--lunch-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change" data-line="31"
                                                        id="attendance_lunch31" name="attendance_lunch31"
                                                        data-content="" style="width:100%">
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
                                                        class="form-control week_5" data-week="5" readonly=""
                                                        id="attendance_total31" name="attendance_total31"
                                                        data-content="-1 h " value="--">
                                                </div>
                                                <!--normal-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="5" id="attendance_normal31"
                                                        name="attendance_normal31">
                                                    <input type="hidden" id="attendance_normal_hidden31"
                                                        name="attendance_normal_hidden31" value="">
                                                </div>
                                                <!--ot-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        data-week="5" id="attendance_ot31" value=""
                                                        name="attendance_ot31">
                                                    <!--<input type="hidden" id="attendance_ot_hidden31" name="attendance_ot_hidden31" value="">-->


                                                    <input type="hidden" id="attendance_ot_rate31"
                                                        name="attendance_ot_rate31" value="">
                                                    <input type="hidden" id="attendance_allowance_minimum31"
                                                        name="attendance_allowance_minimum31" value="">
                                                    <input type="hidden" id="attendance_allowance_maximum31"
                                                        name="attendance_allowance_maximum31" value="">
                                                    <input type="hidden" id="attendance_allowance31"
                                                        name="attendance_allowance31" value="">
                                                </div>
                                                <!--ot hidden-->
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" style="text-align:center" class="form-control"
                                                        id="attendance_ot_hidden31" name="attendance_ot_hidden31"
                                                        value="">
                                                </div>
                                                <!--edit-->
                                                <div style="flex:0 0 80px;text-align:center">
                                                    <input type="checkbox" class="attendance_edit31" value="1"
                                                        name="attendance_edit31">
                                                </div>
                                                <!--work-->
                                                <div style="flex:0 0 100px;text-align:center">
                                                    <input type="checkbox" class="work attendance_work31" data-line="31"
                                                        value="1" name="work31">
                                                </div>
                                                <!--ph-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph31" data-line="31"
                                                        value="1" name="attendance_ph31">
                                                </div>
                                                <!--ph pay-->
                                                <div style="flex:0 0 50px;text-align:center">
                                                    <input type="checkbox" class="work attendance_ph_pay31"
                                                        data-line="31" value="1" name="attendance_ph_pay31">
                                                </div>
                                                <!--remark-->
                                                <div style="flex:0 0 150px;">
                                                    <textarea class="form-control" rows="1" id="attendance_remarks"
                                                        name="attendance_remarks31" placeholder="Remarks"></textarea>
                                                </div>
                                                <!--<div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control" id="attendance_date31" readonly name="attendance_date31" value = "31-Jan-2024" placeholder="Date" >
                                                </div>
                                                <div style="flex:0 0 120px;">
                                                    <input type="text" class="form-control attendance_day31" id="attendance_day" readonly name="attendance_day31" value = "Wednesday" placeholder="Title">
                                                </div>-->
                                                <!--leave-->
                                                <div style="flex:0 0 120px;">
                                                    <select class="form-control change leave_type" data-line="31"
                                                        id="attendance_leave31" name="attendance_leave31"
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
                                                    <select class="form-control change leave_days" data-line="31"
                                                        id="attendance_leave_day31" name="attendance_leave_day31"
                                                        style="width:100%">
                                                        <option value="0">Select One</option>
                                                        <option value="1">1</option>
                                                        <option value="0.5 AM">0.5 AM</option>
                                                        <option value="0.5 PM">0.5 PM</option>
                                                    </select>
                                                </div>
                                                <!--attendance leave file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" id="attendance_leave_file31"
                                                        name="attendance_leave_file31[]" multiple="">
                                                    <input type="hidden" id="attendance_leave_existing_file31"
                                                        name="attendance_leave_existing_file31" value="">
                                                </div>
                                                <!--attendance claim file-->
                                                <div style="flex:0 0 235px;">
                                                    <input type="file" style="width" id="attendance_claim_file31"
                                                        name="attendance_claim_file31[]" multiple="">
                                                </div>
                                                <!--reimbursement-->
                                                <div style="flex:0 0 200px;">
                                                    <select
                                                        class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                                                        data-line="31" id="attendance_reimbursement31" multiple=""
                                                        name="attendance_reimbursement31[]" style="width:100%"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<select class="form-control change attendance_reimbursement select2 select2-hidden-accessible" data-line="31" id="attendance_reimbursement31" name="attendance_reimbursement31[]" style = 'width:100%'>-->
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
                                                        value="" data-week="5" id="attendance_reimbursement_amount31"
                                                        name="attendance_reimbursement_amount31">
                                                </div>
                                            </div>
                                            <div style="display:flex">
                                                <div style="flex:0 0 850px"></div>
                                                <div style="text-align:left;flex:0 0 120px">
                                                    <p><b>Total Hour (Week): </b></p>
                                                </div>
                                                <div class="week_text_5 = " style="text-align:left;flex:0 0 200px">
                                                    <p>
                                                        <b>
                                                            0 hour </b>
                                                    </p>
                                                </div>
                                            </div>
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
