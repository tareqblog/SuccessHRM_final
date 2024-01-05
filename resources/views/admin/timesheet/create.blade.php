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
                                        <input type="text" class="form-control" placeholder="Time Sheet Title" name="title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Printing</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Printing Title" name="print">
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
                                    <label style="width: 9%;" for="package_day" class="col-sm-1 control-label">Day</label>
                                    <label style="width: 16%;" for="package_day" class="col-sm-1 control-label">Time In</label>
                                    <label style="width: 17%;" for="package_day" class="col-sm-1 control-label">Time Out</label>
                                    <label style="width: 16%;" for="package_day" class="col-sm-1 control-label">Lunch Hour</label>
                                    <label style="width: 9%;" for="package_day" class="col-sm-1 control-label">Work</label>
                                    <label style="width: 9%;" for="package_day" class="col-sm-1 control-label">OT Rate</label>
                                    <label style="width: 12%;" for="package_day" class="col-sm-1 control-label">Minimum</label>
                                    <label style="width: 10%;" for="package_day" class="col-sm-1 control-label">Allowance</label>
                                    <!-- Add labels for other days as needed -->
                                </div>

                                @php
                                    $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                @endphp

                                @foreach ($days as $day)
                                    <div class="form-group">
                                        <div class="row mt-3">
                                            <label for="time_sheet_day" class="col-sm-1 control-label">{{ $day }}</label>
                                            <div class="col-sm-2">
                                                <input type="time" class="form-control" name="{{ strtolower($day) }}_in" placeholder="Time In">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="time" class="form-control" name="{{ strtolower($day) }}_out" placeholder="Time Out">
                                            </div>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="{{ strtolower($day) }}_lunch">
                                                    <option value="30 minutes">30 minutes</option>
                                                    <option value="45 minutes">45 minutes</option>
                                                    <option value="1 hour">1 hour</option>
                                                    <option value="1.5 hour">1.5 hour</option>
                                                    <option value="2 hour">2 hour</option>
                                                    <option value="No Lunch">No Lunch</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-1">
                                                <label>
                                                    <input type="checkbox" name="{{ strtolower($day) }}_isWork">
                                                </label>
                                            </div>
                                            <div class="col-sm-1">
                                                <select class="form-control" name="{{ strtolower($day) }}_ot_rate">
                                                    <option value="No Rate">No Rate</option>
                                                    <option value="1.5">1.5</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-1 ms-5">
                                                <input type="text" class="form-control" name="{{ strtolower($day) }}_minimum">
                                            </div>
                                            <div class="col-sm-1 ms-5">
                                                <input type="text" class="form-control" name="{{ strtolower($day) }}_allowance">
                                            </div>
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
