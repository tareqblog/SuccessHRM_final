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
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Apply New Leave</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Group</label>
                                        <div class="col-sm-9">
                                            <select name="leave_empl_type" class="form-control">
                                                <option value="">Select One</option>
                                                <option value="0">Candidate</option>
                                                <option value="1">Employee</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Employee Name</label>
                                        <div class="col-sm-9">
                                            <select name="employees_id" class="form-control" >
                                                <option value="">Select One</option>
                                                @foreach ($employees as $employee)
                                                <option value="{{$employee->id}}">{{ $employee->employee_code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Type of Leave</label>
                                        <div class="col-sm-9">
                                            <select name="leave_types_id" class="form-control">
                                                <option value="">Select One</option>
                                                @foreach ($leaveType as $type)
                                                <option value="{{$type->id}}">{{$type->leavetype_code}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Leave Duration</label>
                                        <div class="col-sm-9">
                                            <select name="leave_duration" class="form-control">
                                                <option value="Full Day Leave">Full Day Leave</option>
                                                <option value="Half Day AM">Half Day AM</option>
                                                <option value="Half Day PM">Half Day PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Date (From)</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="leave_datefrom" class="form-control" placeholder="Date (From)">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Date (To)</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="leave_dateto" placeholder="Date (To)">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Total Days</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Total Hours" name="leave_total_day">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Upload File</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" placeholder="Upload File" name="leave_file_path">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Remarks</label>
                                        <div class="col-sm-9">
                                            <textarea rows="2" name="leave_reason" class="form-control" placeholder="Remarks"></textarea>
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
