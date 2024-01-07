@extends('layouts.master')

@section('title')
    Edit Time Sheet
@endsection

@section('page-title')
    Edit Time Sheet
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
                        @method('PUT')
                        <!-- Main time sheet fields -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Time Sheet Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Time Sheet Title"
                                            name="title" value="{{ old('title', $time_sheet->title) }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Printing</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Printing Title"
                                            name="print" value="{{ old('print', $time_sheet->print) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-2 col-form-label">Remarks</label>
                                    <div class="col-sm-10">
                                        <textarea name="remark" rows="4" class="form-control" placeholder="Remarks">{{ old('remark', $time_sheet->remark) }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Add other main time sheet fields as needed -->
                        </div>

                        <!-- Days Setting -->
                        <div class="row mt-3">
                            <h5 class="mb-3">Days Setting</h5>
                            <div class="form-group">
                                <label style="width: 9%;" for="package_day" class="col-sm-1 control-label">Day</label>
                                <label style="width: 16%;" for="package_day" class="col-sm-1 control-label">Time In</label>
                                <label style="width: 17%;" for="package_day" class="col-sm-1 control-label">Time Out</label>
                                <label style="width: 16%;" for="package_day" class="col-sm-1 control-label">Lunch
                                    Hour</label>
                                <label style="width: 9%;" for="package_day" class="col-sm-1 control-label">Work</label>
                                <label style="width: 9%;" for="package_day" class="col-sm-1 control-label">OT Rate</label>
                                <label style="width: 12%;" for="package_day" class="col-sm-1 control-label">Minimum</label>
                                <label style="width: 10%;" for="package_day"
                                    class="col-sm-1 control-label">Allowance</label>
                            </div>

                            @php
                                $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                            @endphp

                            @foreach ($days as $day)
                                <div class="form-group">
                                    <div class="row mt-3">
                                        <label for="time_sheet_day"
                                            class="col-sm-1 control-label">{{ $day }}</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="{{ strtolower($day) }}_in"
                                                value="{{ old(strtolower($day) . '_in',$time_sheet->entries()->where('day', $day)->value('in_time')) }}"
                                                placeholder="Time In">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="{{ strtolower($day) }}_out"
                                                value="{{ old(strtolower($day) . '_out',$time_sheet->entries()->where('day', $day)->value('out_time')) }}"
                                                placeholder="Time Out">
                                        </div>
                                        <!-- Add other input fields for each day as needed -->
                                        <div class="col-sm-2">
                                            <select class="form-control" name="{{ strtolower($day) }}_lunch">
                                                <!-- Add appropriate options based on your requirements -->
                                                <option value="30 minutes"
                                                    {{ old(strtolower($day) . '_lunch',$time_sheet->entries()->where('day', $day)->value('lunch_time')) == '30 minutes'? 'selected': '' }}>
                                                    30 minutes</option>
                                                <option value="45 minutes"
                                                    {{ old(strtolower($day) . '_lunch',$time_sheet->entries()->where('day', $day)->value('lunch_time')) == '45 minutes'? 'selected': '' }}>
                                                    45 minutes</option>
                                                <option value="1 hour"
                                                    {{ old(strtolower($day) . '_lunch',$time_sheet->entries()->where('day', $day)->value('lunch_time')) == '1 hour'? 'selected': '' }}>
                                                    1 hour</option>
                                                <option value="2 hour"
                                                    {{ old(strtolower($day) . '_lunch',$time_sheet->entries()->where('day', $day)->value('lunch_time')) == '2 hour'? 'selected': '' }}>
                                                    2 hour</option>
                                                <option value="No Lunch"
                                                    {{ old(strtolower($day) . '_lunch',$time_sheet->entries()->where('day', $day)->value('lunch_time')) == 'No Lunch'? 'selected': '' }}>
                                                    No Lunch</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label>
                                                <input type="checkbox" name="{{ strtolower($day) }}_isWork"
                                                    {{ old(strtolower($day) . '_isWork',$time_sheet->entries()->where('day', $day)->value('isWork'))? 'checked': '' }}>
                                            </label>
                                        </div>
                                        <div class="col-sm-1">
                                            <select class="form-control" name="{{ strtolower($day) }}_ot_rate">
                                                <!-- Add appropriate options based on your requirements -->
                                                <option value="No Rate"
                                                    {{ old(strtolower($day) . '_ot_rate',$time_sheet->entries()->where('day', $day)->value('ot_rate')) == 'No Rate'? 'selected': '' }}>
                                                    No Rate</option>
                                                <option value="1.5"
                                                    {{ old(strtolower($day) . '_ot_rate',$time_sheet->entries()->where('day', $day)->value('ot_rate')) == '1.5'? 'selected': '' }}>
                                                    1.5</option>
                                                <option value="2"
                                                    {{ old(strtolower($day) . '_ot_rate',$time_sheet->entries()->where('day', $day)->value('ot_rate')) == '2'? 'selected': '' }}>
                                                    2</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1 ms-5">
                                            <input type="text" class="form-control"
                                                name="{{ strtolower($day) }}_minimum"
                                                value="{{ old(strtolower($day) . '_minimum',$time_sheet->entries()->where('day', $day)->value('minimum')) }}">
                                        </div>
                                        <div class="col-sm-1 ms-5">
                                            <input type="text" class="form-control"
                                                name="{{ strtolower($day) }}_allowance"
                                                value="{{ old(strtolower($day) . '_allowance',$time_sheet->entries()->where('day', $day)->value('allowance')) }}">
                                        </div>
                                        <!-- Repeat these lines for other fields as needed -->

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <a href="{{ route('time-sheet.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-info">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
