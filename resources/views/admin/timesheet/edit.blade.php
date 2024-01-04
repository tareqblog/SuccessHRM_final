@extends('layouts.master')
@section('title')
    Time Sheet Management
@endsection
@section('page-title')
    Time Sheet Management
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Edit Time Sheet</h4>
                    </div>
                    @include('admin.include.errors')
                    <div class="card-body">
                        <form action="{{ route('time-sheet.update', $time_sheet->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                <h5>Time Sheet</h5>
                                <div class="col-lg-6">
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Time Sheet Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Time Sheet Title"
                                                name="title" required value="{{$time_sheet->title}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Printing</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Printing"
                                                name="print" value="{{$time_sheet->print}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Remarks</label>
                                        <div class="col-sm-9">
                                            <textarea name="remark" rows="4" class="form-control" placeholder="Remarks">{{$time_sheet->remark}} </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="mb-5">Days Setting</h5>
                                <div class="form-group">
                                    <label for="package_day" class="col-sm-1 control-label">Day</label>
                                    <label for="package_day" class="col-sm-2 control-label">Time In</label>
                                    <label for="package_day" class="col-sm-2 control-label">Time Out</label>
                                    <label for="package_day" class="col-sm-2 control-label">Lunch Hour</label>
                                    <label for="package_day" class="col-sm-1 control-label">Work</label>
                                    <label for="package_day" class="col-sm-1 control-label">OT Rate</label>
                                    <label for="package_day" class="col-sm-1 control-label">Minimum</label>
                                    <label for="package_day" class="col-sm-1 control-label">Allowance</label>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-3">
                                        <label for="time_sheet_day" class="col-sm-1 control-label">Sunday</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="sunday_in" placeholder="Time">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" id="timesheet_start_0"
                                                name="sunday_out" placeholder="Time">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="sunday_lunch">
                                                <option {{$time_sheet->sunday_lunch == "30 minutes" ? 'selected' : ''}} value="30 minutes">30 minutes</option>
                                                <option {{$time_sheet->sunday_lunch == "45 minutes" ? 'selected' : ''}} value="45 minutes">45 minutes</option>
                                                <option {{$time_sheet->sunday_lunch == "1 hour" ? 'selected' : ''}} value="1 hour">1 hour</option>
                                                <option {{$time_sheet->sunday_lunch == "1.5 hour" ? 'selected' : ''}} value="1.5 hour">1.5 hour</option>
                                                <option {{$time_sheet->sunday_lunch == "2 hour" ? 'selected' : ''}} value="2 hour">2 hour</option>
                                                <option {{$time_sheet->sunday_lunch == "No Lunch" ? 'selected' : ''}} value="No Lunch">No Lunch</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label><input type="checkbox" name="sunday_isWork" {{$time_sheet->sunday_isWork == 'on' ? 'checked' : ''}} ></label>
                                        </div>
                                        <div class="col-sm-1">
                                            <select class="form-control" name="sunday_ot_rate">
                                                <option {{$time_sheet->sunday_ot_rate == "No Rate" ? 'selected' : ''}} value="No Rate">No Rate</option>
                                                <option {{$time_sheet->sunday_ot_rate == "1.5" ? 'selected' : ''}} value="1.5">1.5</option>
                                                <option {{$time_sheet->sunday_ot_rate == "2" ? 'selected' : ''}} value="2">2</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" placeholder="1.5"
                                                name="sunday_minimum" value="{{$time_sheet->sunday_minimum}}">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" placeholder="6"
                                                name="sunday_allowance" value="{{$time_sheet->sunday_allowance}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-3">
                                        <label for="time_sheet_day" class="col-sm-1 control-label">Monday</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="monday_in"
                                                placeholder="Time" value="{{$time_sheet->monday_in}}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" id="timesheet_start_0"
                                                name="monday_out" value="{{$time_sheet->monday_out}}" placeholder="Time">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="monday_lunch">
                                                <option {{$time_sheet->monday_lunch == "30 minutes" ? 'selected' : ''}} value="30 minutes">30 minutes</option>
                                                <option {{$time_sheet->monday_lunch == "45 minutes" ? 'selected' : ''}} value="45 minutes">45 minutes</option>
                                                <option {{$time_sheet->monday_lunch == "1 hour" ? 'selected' : ''}} value="1 hour">1 hour</option>
                                                <option {{$time_sheet->monday_lunch == "1.5 hour" ? 'selected' : ''}} value="1.5 hour">1.5 hour</option>
                                                <option {{$time_sheet->monday_lunch == "2 hour" ? 'selected' : ''}} value="2 hour">2 hour</option>
                                                <option {{$time_sheet->monday_lunch == "No Lunch" ? 'selected' : ''}} value="No Lunch">No Lunch</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label><input type="checkbox" name="monday_isWork" {{$time_sheet->monday_isWork ? 'selected' : ''}}></label>
                                        </div>
                                        <div class="col-sm-1">
                                            <select class="form-control" name="monday_ot_rate">
                                                <option value="No Rate" {{$time_sheet->monday_ot_rate == 'No Rate' ? 'No Rate' : ''}}>No Rate</option>
                                                <option value="1.5" {{$time_sheet->monday_ot_rate == '1.5' ? '1.5' : ''}}>1.5</option>
                                                <option value="2" {{$time_sheet->monday_ot_rate == '2' ? '2' : ''}}>2</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="monday_minimum" class="form-control"
                                                placeholder="1.5" value="{{$time_sheet->monday_minimum}}">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="monday_allowance" class="form-control"
                                                placeholder="6" value="{{$time_sheet->monday_allowance}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-3">
                                        <label for="time_sheet_day" class="col-sm-1 control-label">Tuesday</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="tuesday_in"
                                                placeholder="Time" value="{{$time_sheet->tuesday_in}}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" id="timesheet_start_0"
                                                name="tuesday_out" placeholder="Time" value="{{$time_sheet->tuesday_out}}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="tuesday_lunch">
                                                <option {{$time_sheet->tuesday_lunch == "30 minutes" ? 'selected' : ''}} value="30 minutes">30 minutes</option>
                                                <option {{$time_sheet->tuesday_lunch == "45 minutes" ? 'selected' : ''}} value="45 minutes">45 minutes</option>
                                                <option {{$time_sheet->tuesday_lunch == "1 hour" ? 'selected' : ''}} value="1 hour">1 hour</option>
                                                <option {{$time_sheet->tuesday_lunch == "1.5 hour" ? 'selected' : ''}} value="1.5 hour">1.5 hour</option>
                                                <option {{$time_sheet->tuesday_lunch == "2 hour" ? 'selected' : ''}} value="2 hour">2 hour</option>
                                                <option {{$time_sheet->tuesday_lunch == "No Lunch" ? 'selected' : ''}} value="No Lunch">No Lunch</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label><input type="checkbox" name="tuesday_isWork" {{$time_sheet->tuesday_isWork == 'on' ? 'checked' : ''}}></label>
                                        </div>
                                        <div class="col-sm-1">
                                            <select class="form-control" name="tuesday_ot_rate">
                                                <option value="No Rate">No Rate</option>
                                                <option value="1.5">1.5</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="tuesday_minimum" class="form-control"
                                                placeholder="1.5" value="{{$time_sheet->tuesday_minimum}}">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="tuesday_allowance" class="form-control"
                                                placeholder="6" value="{{$time_sheet->tuesday_allowance}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-3">
                                        <label for="time_sheet_day" class="col-sm-1 control-label">Wednesday</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="wedness_in"
                                                placeholder="Time" value="{{$time_sheet->wedness_in}}">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" id="timesheet_start_0"
                                                name="wedness_out" placeholder="Time" value="{{$time_sheet->wedness_out}}">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="wedness_lunch">
                                                <option {{$time_sheet->wedness_lunch == "30 minutes" ? 'selected' : ''}} value="30 minutes">30 minutes</option>
                                                <option {{$time_sheet->wedness_lunch == "45 minutes" ? 'selected' : ''}} value="45 minutes">45 minutes</option>
                                                <option {{$time_sheet->wedness_lunch == "1 hour" ? 'selected' : ''}} value="1 hour">1 hour</option>
                                                <option {{$time_sheet->wedness_lunch == "1.5 hour" ? 'selected' : ''}} value="1.5 hour">1.5 hour</option>
                                                <option {{$time_sheet->wedness_lunch == "2 hour" ? 'selected' : ''}} value="2 hour">2 hour</option>
                                                <option {{$time_sheet->wedness_lunch == "No Lunch" ? 'selected' : ''}} value="No Lunch">No Lunch</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label><input type="checkbox" name="wedness_isWork" {{$time_sheet->wedness_isWork == 'on' ? 'checked' : ''}}></label>
                                        </div>
                                        <div class="col-sm-1">
                                            <select class="form-control" name="wedness_ot_rate">
                                                <option value="0">No Rate</option>
                                                <option value="1">1.5</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" name="wedness_minimum"
                                                placeholder="1.5">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" placeholder="6"
                                                name="wedness_allowance">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-3">
                                        <label for="time_sheet_day" class="col-sm-1 control-label">Thursday</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="thusday_in"
                                                placeholder="Time">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" id="timesheet_start_0"
                                                name="thusday_out" placeholder="Time">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="thusday_lunch">
                                                <option value="1">30 minutes</option>
                                                <option value="2">45 minutes</option>
                                                <option value="3">1 hour</option>
                                                <option value="5">1.5 hour</option>
                                                <option value="6">2 hour</option>
                                                <option value="4">No Lunch</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label><input type="checkbox" name="thusday_isWork"></label>
                                        </div>
                                        <div class="col-sm-1">
                                            <select class="form-control" name="thusday_ot_rate">
                                                <option value="0">No Rate</option>
                                                <option value="1">1.5</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" name="thusday_minimum"
                                                placeholder="1.5">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" name="thusday_allowance"
                                                placeholder="6">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-3">
                                        <label for="time_sheet_day" class="col-sm-1 control-label">Friday</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="friday_in"
                                                placeholder="Time">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" id="timesheet_start_0"
                                                name="friday_out" placeholder="Time">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="friday_lunch">
                                                <option value="1">30 minutes</option>
                                                <option value="2">45 minutes</option>
                                                <option value="3">1 hour</option>
                                                <option value="5">1.5 hour</option>
                                                <option value="6">2 hour</option>
                                                <option value="4">No Lunch</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label><input type="checkbox" name="friday_isWork"></label>
                                        </div>
                                        <div class="col-sm-1">
                                            <select class="form-control" name="friday_ot_rate">
                                                <option value="0">No Rate</option>
                                                <option value="1">1.5</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" name="friday_minimum"
                                                placeholder="1.5">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" placeholder="6"
                                                name="friday_allowance">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-3">
                                        <label for="time_sheet_day" class="col-sm-1 control-label">Saturday</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="saturday_in"
                                                placeholder="Time">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" id="timesheet_start_0"
                                                name="saturday_out" placeholder="Time">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="saturday_lunch">
                                                <option value="1">30 minutes</option>
                                                <option value="2">45 minutes</option>
                                                <option value="3">1 hour</option>
                                                <option value="5">1.5 hour</option>
                                                <option value="6">2 hour</option>
                                                <option value="4">No Lunch</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label><input type="checkbox" name="saturday_isWork"></label>
                                        </div>
                                        <div class="col-sm-1">
                                            <select class="form-control" name="saturday_ot_rate">
                                                <option value="0">No Rate</option>
                                                <option value="1">1.5</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" name="saturday_minimum"
                                                placeholder="1.5">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" name="saturday_allowance"
                                                placeholder="6">
                                        </div>
                                    </div>
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
