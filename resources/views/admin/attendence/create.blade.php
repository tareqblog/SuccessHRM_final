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
    @section('content')
    <style>
        .remove-label, .remove-claim {
            display: none;
            cursor: pointer;
        }
        .bg-f1f1f1
        {
            background-color: #f1f1f1;
        }
    </style>
        @include('admin.attendence.inc.included_js_css')

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
                                <form action="{{ route('get.month.attendence.data') }}" method="POST" id="attendenceForm">
                                    @csrf
                                    <div class="row">
                                        <div class="row col-lg-6 mb-4">
                                            <label for="thirteen" class="col-sm-3 col-form-label">Select Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="date" id="dateInput" class="form-control" value="{{ isset($selectedDate) ? $selectedDate->format('Y-m-d') : Carbon\Carbon::now()->format('Y-m-d') }}" required>

                                            </div>
                                        </div>
                                        <div class="row col-lg-6  mb-4">
                                            <label for="eleven" class="col-sm-3 col-form-label">Candidate</label>
                                            <div class="col-sm-9">
                                                <input type="hidden" id="candidateId" name="candidate_id">
                                                <select id="candidateDropdown" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($candidates as $candidate)
                                                        <option
                                                            value="{{ $candidate->candidate_outlet_id }}-{{ $candidate->id }}"
                                                            {{ isset($selectCandidate) ? ($candidate->candidate_outlet_id . '-' . $candidate->id == $selectCandidate ? 'selected' : '') : '' }}>
                                                            {{ $candidate->candidate_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row col-lg-6  mb-4">
                                            <label for="eleven" class="col-sm-3 col-form-label">Company</label>
                                            <div class="col-sm-9">
                                                <select name="company_id" id="companyDropdown" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($companies as $company)
                                                        <option  value="{{ $company->id }}"> {{ $company->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row col-lg-6 mb-4">
                                            <label for="thirteen" class="col-sm-3 col-form-label">Invoice Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="invoice_no" class="form-control invoice"
                                                    placeholder="Invoice no">
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                        <form  method="POST" action="{{ route('mystore') }}" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="candidate_id" value="{{$candidate_id ?? ''}}">
                                            <input type="hidden" name="month_year" value="{{$month_year ?? ''}}">
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
                                                    <label style="margin-left: 70px;" class="control-label">
                                                        <input type="checkbox" id="allCheckB" name="work_checkbox" class="work_checkbox_parent" onclick="allWork({{ $daysInMonth ?? '' }})">
                                                        Work
                                                    </label>
                                                    {{-- <label style="margin-left: 70px;" class="control-label"><input
                                                            type="checkbox" id="allCheckB" name="work_checkbox"
                                                            class="work_checkbox_parent" onclick="allWork({{$daysInMonth ?? ''}})">
                                                        Work</label> --}}
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

                                                <div id="empty" class="empty">
                                                    @if (isset($formate))
                                                    @foreach ($formate as $day => $attendance)
                                                        @include('admin.attendence.inc.empty')
                                                    @endforeach
                                                    @else
                                                        @for ($day=1; $day <= $daysInMonth ; $day++)
                                                            @include('admin.attendence.inc.empty')
                                                        @endfor
                                                    @endif
                                                </div>
                                                <div id="haveData" style="display: none">
                                                    @include('admin.attendence.inc.haveData')
                                                </div>
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
        </div>
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

                $(".invoice").on('keyup',function(){
                    var inp = $(this).val();
                    $("#invoice").val(inp);
                });

                function submitForm() {
                    $('#attendenceForm').submit();
                }

            });
        </script>
    @endsection
