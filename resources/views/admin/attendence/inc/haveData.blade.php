@if (isset($formate))
    @foreach ($formate as $day => $attendance)
        <div style="display:flex">
            <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                <input type="text" class="form-control bg-{{ $day }}" readonly placeholder="Date" readonly=""
                    name="group[{{ $day }}][date]" placeholder="Date" value="{{ $attendance['date'] }}">
            </div>
            <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                <input type="text" class="form-control bg-{{ $day }}" readonly=""
                    name="group[{{ $day }}][day]" value="{{ $attendance['day'] }}" placeholder="Title">
            </div>
            <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                <input type="time" hidden id="oldinTime-{{$day}}" value="{{ $attendance['in_time'] }}">
                <input type="time" style=" "
                    class="form-control hi-{{ $day }} inTime-{{ $day }}"
                    name="group[{{ $day }}][in_time]" value="{{ $attendance['in_time'] }}" placeholder="time"
                    onchange="timeCalculation({{ $day }})">
            </div>
            <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                <input type="time" hidden id="oldoutTime-{{$day}}" value="{{ $attendance['out_time'] }}">
                <input type="time" style=" "
                    class="form-control hi-{{ $day }}  outTime-{{ $day }}"
                    name="group[{{ $day }}][out_time]" value="{{ $attendance['out_time'] }}"
                    placeholder="time" onchange="timeCalculation({{ $day }})">
            </div>
            <!--next-->
            <div style="flex:0 0 50px;text-align:center">
                <input type="checkbox" class="attendance_next_day1 change" onclick="next_day({{$day}})" data-line="1" value="1"
                    {{ $attendance['next_day'] == 1 ? 'checked' : '' }} name="group[{{ $day }}][next_day]">
            </div>
            <!--lunch-->
            <div style="flex:0 0 120px;">
                <select class="form-control change hi-{{ $day }} lunch_val-{{ $day }}"
                    data-line="1" onchange="timeCalculation({{ $day }})" id="attendance_lunch"
                    name="group[{{ $day }}][lunch_hour]" data-content="" style="width:100%;  ">
                    <option value="">Select One</option>
                    <option value="30 minutes" {{ $attendance['lunch_hour'] == '30 minutes' ? 'selected' : '' }}>30
                        minutes</option>
                    <option value="45 minutes" {{ $attendance['lunch_hour'] == '45 minutes' ? 'selected' : '' }}>45
                        minutes</option>
                    <option value="1 hour" {{ $attendance['lunch_hour'] == '1 hour' ? 'selected' : '' }}>1 hour
                    </option>
                    <option value="No Lunch" {{ $attendance['lunch_hour'] == 'No Lunch' ? 'selected' : '' }}>No Lunch
                    </option>
                    <option value="1.5 hour" {{ $attendance['lunch_hour'] == '1.5 hour' ? 'selected' : '' }}>1.5 hour
                    </option>
                    <option value="2 hour" {{ $attendance['lunch_hour'] == '2 hour' ? 'selected' : '' }}>2 hour
                    </option>
                </select>
            </div>
            <!--total-->
            <div style="flex:0 0 120px;">
                <input type="text" style="text-align:center;  "
                    class="form-control week_1 hi-{{ $day }} totla_time-{{ $day }}" data-week="1"
                    readonly="" name="group[{{ $day }}][total_hour_min]" data-content="-1 h "
                    value="0">
            </div>
            <!--normal-->
            <div style="flex:0 0 120px;">
                <input type="text" style="text-align:center;  "
                    class="form-control hi-{{ $day }} normal_time-{{ $day }}"
                    name="group[{{ $day }}][normal_hour_min]" value="0">
            </div>
            <!--ot-->
            <div style="flex:0 0 120px;">
                <input type="text" style="text-align:center" name="group[{{ $day }}][ot_hour_min]"
                    class="form-control ot-{{ $day }}" data-week="1" value="0">
            </div>
            <!--ot hidden-->
            <div style="flex:0 0 120px;">
                <input type="text" style="text-align:center" class="form-control otc-{{$day}}"
                    name="group[{{ $day }}][ot_calculation]" value="0">
            </div>
            <!--edit-->
            <div style="flex:0 0 80px;text-align:center">
                <input type="checkbox" class="attendance_edit1" id="ot_edit-{{$day}}" data-line="1" value="1"
                    name="group[{{ $day }}][ot_edit]" onclick="ot_edit({{ $day }})" {{$attendance['ot_edit'] == 1 ? 'checked' : ''}}>
            </div>
            <!--work-->
            <div style="flex:0 0 100px;text-align:center">
                <input type="checkbox" class="work attendance_work1" id="workCheB-{{$day}}" data-line="1" value="{{$attendance['work']}}" name="group[{{ $day }}][work]" onclick="work_check({{ $day }})" >
            </div>
            <!--ph-->
            <div style="flex:0 0 50px;text-align:center">
                <input type="checkbox" class="work attendance_ph1" data-line="1" value="1"
                    name="group[{{ $day }}][ph]">
            </div>
            <!--ph pay-->
            <div style="flex:0 0 50px;text-align:center">
                <input type="checkbox" class="work attendance_ph_pay1" data-line="1" value="1"
                    name="group[{{ $day }}][ph_pay]">
            </div>
            <!--remark-->
            <div style="flex:0 0 150px;">
                <textarea class="form-control hi-{{ $day }}" rows="1" name="group[{{ $day }}][remark]"
                    placeholder="Remarks"></textarea>
            </div>
            <div style="flex:0 0 120px;">
                <select class="form-control change leave_type hi-{{ $day }}" data-line="1"
                    name="group[{{ $day }}][type_of_leave]" style="width:100%;  ;">
                    <option value="">Select One</option>
                    @foreach ($leaveTypes as $type)
                        <option value="{{ $type->id }}" {{ $type->id == $attendance['leave_types_id'] }}>
                            {{ $type->leavetype_code }}</option>
                    @endforeach
                </select>
            </div>
            <!--attendance leave day-->
            <div style="flex:0 0 120px;">
                <select class="form-control change leave_days hi-{{ $day }}"
                    onchange="timeCalculation({{ $day }})" data-line="1"
                    name="group[{{ $day }}][leave_day]" style="width:100%;  ">
                    <option value="0">Select One</option>
                    <option value="Full Day Leave"
                        {{ $attendance['leave_day'] == 'Full Day Leave' ? 'selected' : '' }}>
                        Full Day Leave</option>
                    <option value="Half Day AM"{{ $attendance['leave_day'] == 'Half Day AM' ? 'selected' : '' }}>
                        Half Day AM</option>
                    <option value="Half Day PM"{{ $attendance['leave_day'] == 'Half Day PM' ? 'selected' : '' }}>
                        Half Day PM</option>
                </select>
            </div>
            <!--attendance leave file-->
            <div style="flex:0 0 235px;">
                <input type="hidden" name="group[{{ $day }}][old_leave_attachment]" value="{{$attendance['leave_attachment']}}">
                <input type="file" class="attendance_leave_file-{{ $day }}"
                    name="group[{{ $day }}][leave_attachment]"
                    value="{{ $attendance['leave_attachment'] }}" onchange="hasFile({{ $day }})">
                <label class="remove-label remove-label-{{$day}}" onclick="removeFile('{{ $day }}')"><i
                        class="fas fa-trash text-danger"></i></label>
                <div class="hi-{{ $day }}">
                    @if ($attendance['leave_attachment'])
                        <a href="{{ asset('storage/' . $attendance['leave_attachment']) }}" target="_blank">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div style="flex:0 0 235px;">
                <input type="hidden" name="group[{{ $day }}][old_claim_attachment]" value="{{$attendance['claim_attachment']}}">
                <input type="file" class="attendance_claim_file-{{ $day }}"
                    name="group[{{ $day }}][claim_attachment]" onchange="hasClaim({{ $day }})">
                <label class="remove-label remove-claim-{{$day}}" onclick="removeClaim('{{ $day }}')"><i
                        class="fas fa-trash text-danger"></i></label>
                <div class="hi-{{ $day }}">
                    @if ($attendance['claim_attachment'])
                        <a href="{{ asset('storage/' . $attendance['claim_attachment']) }}" target="_blank">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endif
                </div>
            </div>
            <!--reimbursement-->
            <div style="flex:0 0 200px;">
                <select class="form-control change attendance_reimbursement select2 select2-hidden-accessible"
                    data-line="1" multiple="" name="group[{{ $day }}][type_of_reimbursement]"
                    style="width:100%" tabindex="-1" aria-hidden="true">

                    <option value="1">Transport Reimbursement</option>
                    <option value="2">Medical Reimbursement</option>
                    <option value="4">Meal Reimbursement</option>
                    <option value="3">Other</option>
                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                    style="width: 100%;"><span class="selection"><span
                            class="select2-selection select2-selection--multiple" role="combobox"
                            aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0">
                            <ul class="select2-selection__rendered">
                                <li class="select2-search select2-search--inline">
                                    <input class="select2-search__field" type="search" tabindex="-1"
                                        autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                                        role="textbox" placeholder="" style="width: 0.75em;">
                                </li>
                            </ul>
                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            </div>
            <!--reimbursement amount-->
            <div style="flex:0 0 150px;">
                <input type="text" style="text-align:center" class="form-control" value="" data-week="1"
                    name="group[{{ $day }}][amount_of_reimbursement]">
            </div>
        </div>
    @endforeach
@endif
