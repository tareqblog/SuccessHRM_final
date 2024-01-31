@extends('layouts.master')

@section('title')
    Time Sheet Management
@endsection

@section('page-title')
    Time Sheet Management
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Create Time Sheet</h4>
                </div>
                @include('admin.include.errors')
                <div class="card-body">
                    <form action="{{ route('time-sheet.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <h5>Time Sheet</h5>
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Time Sheet Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Time Sheet Title"
                                            name="title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Printing</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Printing Title"
                                            name="print">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Remarks</label>
                                    <div class="col-sm-10">
                                        <textarea name="remark" rows="4" class="form-control" placeholder="Remarks"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Add other time sheet fields as needed -->

                            <div class="col-lg-12">
                                <h5 class="mb-5">Days Setting</h5>
                                <div class="form-group">
                                    <label for="package_day" class="col-sm-1 control-label">Day</label>
                                    <label for="package_day" class="col-sm-1 control-label">Time In</label>
                                    <label for="package_day" class="col-sm-1 control-label" style="margin-left: 120px;">Time
                                        Out</label>
                                    <label for="package_day" class="col-sm-1 control-label"
                                        style="margin-left: 130px;">Lunch Hour</label>
                                    <label for="package_day" class="col-sm-1 control-label">Work</label>
                                    <label for="package_day" class="col-sm-1 control-label">Next Day</label>
                                    <label for="package_day" class="col-sm-1 control-label">OT Rate</label>
                                    <label for="package_day" class="col-sm-1 ms-5 control-label">Minimum</label>
                                    <label for="package_day" class="col-sm-1 ms-5 control-label">Allowance</label>
                                    <!-- Add labels for other days as needed -->
                                </div>

                                @php
                                    $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                @endphp

                                @foreach ($days as $day)
                                    <div class="form-group">
                                        <div class="row mt-3">
                                            <label for="time_sheet_day"
                                                class="col-sm-1 control-label">{{ $day }}</label>
                                            <input type="hidden" name="entities[{{ strtolower($day) }}][day]"
                                                value="{{ $day }}">
                                            <div class="col-sm-2">
                                                <input type="time" class="form-control"
                                                    name="entities[{{ strtolower($day) }}][in_time]"
                                                    value=""
                                                    placeholder="Time In">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="time" class="form-control"
                                                    name="entities[{{ strtolower($day) }}][out_time]" value=""
                                                    placeholder="Time Out">
                                            </div>
                                            <!-- Add other input fields for each day as needed -->
                                            <div class="col-sm-1">
                                                <select class="form-control"
                                                    name="entities[{{ strtolower($day) }}][lunch_time]">
                                                    <!-- Add appropriate options based on your requirements -->
                                                    <option value="30 minutes">
                                                        30 minutes</option>
                                                    <option value="45 minutes">
                                                        45 minutes</option>
                                                    <option value="1 hour">
                                                        1 hour</option>
                                                    <option value="2 hour">
                                                        2 hour</option>
                                                    <option value="No Lunch">
                                                        No Lunch</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-1">
                                                <label>
                                                    <input type="checkbox" name="entities[{{ strtolower($day) }}][isWork]">
                                                </label>
                                            </div>
                                            <div class="col-sm-1">
                                                <label>
                                                    <input type="checkbox" name="entities[{{ strtolower($day) }}][ot_rate]">
                                                </label>
                                            </div>
                                            <div class="col-sm-1">
                                                <select class="form-control"
                                                    name="entities[{{ strtolower($day) }}][minimum]">
                                                    <!-- Add appropriate options based on your requirements -->
                                                    <option value="No Rate">
                                                        No Rate</option>
                                                    <option value="1.5">
                                                        1.5</option>
                                                    <option value="2">
                                                        2</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-1 ms-5">
                                                <input type="text" class="form-control"
                                                    name="entities[{{ strtolower($day) }}][allowance]"
                                                    value="">
                                            </div>
                                            <!-- Repeat these lines for other fields as needed -->

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <a href="{{ route('time-sheet.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
