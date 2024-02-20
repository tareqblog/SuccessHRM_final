
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>

    function allWork(days) {
        for (let day = 0; day <= days; day++) {
            let worked = $('#workCheB-' + day).val();

            if ($('#allCheckB').is(':checked')) {
                if(worked == 1){
                    $('#workCheB-' + day).prop('checked', true).addClass('checked');
                } else if(worked == 0) {
                    $('#workCheB-' + day).prop('checked', false).removeClass('checked');
                }

            } else if ($('#allCheckB').is(':not(:checked)')) {
                if(worked == 1) {
                    $('#workCheB-' + day).prop('checked', false).removeClass('checked');
                }
            }
        }

        $('#haveData').empty();
        reloadData();
    }

    function reloadData()
    {
        @if (isset($parent) && isset($parent->id))
            let route = '{{ route('get.attendence', $parent->id) }}';
            $.ajax({
                url: route,
                method: 'GET',
                success: function(response) {
                    console.log(response);
                    // $('#haveData').load();
                    // console.log('Attendance data reloaded successfully');
                    let leaveTypes = {!! json_encode($leaveTypes) !!};
                    $.each(response, function(index, attendance) {

                        console.log(attendance.work);
                        let html = `
                            <div style="display:flex">
                                <div style="flex:0 0 120px;position: sticky;left: 0;z-index: 20;">
                                    <input type="text" class="form-control ${attendance.work == 1 ? 'bg-f1f1f1' : ''}" readonly name="group[${index}][date]" value="${attendance.date}">
                                </div>
                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                    <input type="text" class="form-control ${attendance.work == 1 ? 'bg-f1f1f1' : ''}" readonly name="group[${index}][day]" value="${attendance.day}">
                                </div>
                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                    <input type="time" hidden id="oldinTime-${index}" value="${attendance.in_time}">
                                    <input type="time" class="form-control inTime-${index}"
                                        name="group[${index}][in_time]" value="${attendance.in_time}" onchange="timeCalculation(${index})">
                                </div>
                                <div style="flex:0 0 120px;position: sticky;left: 120px;z-index: 20;">
                                    <input type="time" hidden id="oldoutTime-${index}" value="${attendance.out_time}">
                                    <input type="time" class="form-control  outTime-${index}"
                                        name="group[${index}][out_time]" value="${attendance.out_time}" onchange="timeCalculation(${index})">
                                </div>
                                <div style="flex:0 0 50px;text-align:center">
                                    <input type="checkbox" class="attendance_next_day1 change" onclick="next_day(${index})" data-line="1" value="1" name="group[${index}][next_day]">
                                </div>
                                <div style="flex:0 0 120px;">
                                    <select class="form-control single-select-field change lunch_val-${index}"
                                        data-line="1" onchange="timeCalculation(${index})"
                                        name="group[${index}][lunch_hour]" data-content="" style="width:100%;">
                                        <option value="">Select One</option>
                                        <option value="30 minutes" ${attendance.lunch_hour == '30 minutes' ? 'selected' : ''}>30
                                            minutes</option>
                                        <option value="45 minutes" ${attendance.lunch_hour == '45 minutes' ? 'selected' : ''}>45
                                            minutes</option>
                                        <option value="1 hour" ${attendance.lunch_hour == '1 hour' ? 'selected' : ''}>1 hour
                                        </option>
                                        <option value="No Lunch" ${attendance.lunch_hour == 'No Lunch' ? 'selected' : ''}>No Lunch
                                        </option>
                                        <option value="1.5 hour" ${attendance.lunch_hour == '1.5 hour' ? 'selected' : ''}>1.5 hour
                                        </option>
                                        <option value="2 hour" ${attendance.lunch_hour == '2 hour' ? 'selected' : ''}>2 hour
                                        </option>
                                    </select>
                                </div>
                                <div style="flex:0 0 120px;">
                                    <input type="text" style="text-align:center;  "
                                        class="form-control week_1 totla_time-${index}" data-week="1"
                                        readonly name="group[${index}][total_hour_min]"
                                        value="${attendance.total_hour_min}">
                                </div>
                                <!--normal-->
                                <div style="flex:0 0 120px;">
                                    <input type="text" style="text-align:center;"
                                        class="form-control normal_time-${index}"
                                        name="group[${index}][normal_hour_min]" value="${attendance.normal_hour_min}">
                                </div>
                                <!--ot-->
                                <div style="flex:0 0 120px;">
                                    <input type="text" style="text-align:center" name="group[${index}][ot_hour_min]"
                                        class="form-control ot-${index}" data-week="1" value="${attendance.ot_hour_min}">
                                </div>
                                <!--ot hidden-->
                                <div style="flex:0 0 120px;">
                                    <input type="text" style="text-align:center" class="form-control otc-${index}"
                                        name="group[${index}][ot_calculation]" value="${attendance.ot_calculation}">
                                </div>
                                <!--edit-->
                                <div style="flex:0 0 80px;text-align:center">
                                    <input type="checkbox" class="attendance_edit1" id="ot_edit-${index}" data-line="1" value="${attendance.ot_edit}" name="group[${index}][ot_edit]" onclick="ot_edit(${index})">
                                </div>
                                <!--work-->
                                <div style="flex:0 0 100px;text-align:center">
                                    <input type="checkbox" class="work attendance_work1" id="workCheB-${index}" data-line="1" value="${attendance.work}" name="group[${index}][work]" onclick="work_check(${index})" ${attendance.work == 1 ? 'checked' : ''}>
                                </div>
                                <div style="flex:0 0 50px;text-align:center">
                                    <input type="checkbox" class="work attendance_ph1 ph-${index}" data-line="1" name="group[${index}][ph]" value="${attendance.ph}" ${attendance.ph == 1 ? 'checked' : ''}>
                                </div>
                                <!--ph pay-->
                                <div style="flex:0 0 50px;text-align:center">
                                    <input type="checkbox" class="work attendance_ph_pay1 ph_pay-${index}" data-line="1" value="${attendance.ph_pay}" name="group[${index}][ph_pay]" ${attendance.ph_pay == 1 ? 'checked' : ''}>
                                </div>
                                <!--remark-->
                                <div style="flex:0 0 150px;">
                                    <textarea class="form-control remark-${index}" rows="1" name="group[${index}][remark]">${attendance.remark ? attendance.remark : ''}</textarea>
                                </div>
                                <div style="flex:0 0 220px;">
                                    <select class="form-control single-select-field change leave_type  type_of_leave-${index}" data-line="1"
                                        name="group[${index}][type_of_leave]" style="width:100%;  ;">
                                        <option selected disabled>Select One</option>`;
                                        $.each(leaveTypes, function(i, type) {
                                            html += `<option style="width: 120px" value="${type.id}" ${type.id == attendance.type_of_leave ? 'selected' : ''}>${type.leavetype_code}</option>`;
                                        });
                                        html += `
                                    </select>
                                </div>
                                <div style="flex:0 0 220px;">
                                    <select class="form-control single-select-field change leave_days-${index}"
                                        onchange="leaveDay(${index})" data-line="1"
                                        name="group[${index}][leave_day]" style="width:100%;  ">
                                        <option selected disabled>Select One</option>
                                        <option value="Full Day Leave" ${attendance.leave_day == 'Full Day Leave' ? 'selected' : ''} >Full Day Leave</option>
                                        <option value="Half Day AM" ${attendance.leave_day == 'Half Day AM' ? 'selected' : ''} >Half Day AM</option>
                                        <option value="Half Day PM" ${attendance.leave_day == 'Half Day PM' ? 'selected' : ''} >Half Day PM</option>
                                    </select>
                                </div>
                                <div style="flex:0 0 280px;">
                                    <input type="hidden" name="group[${index}][old_leave_attachment]" value="${attendance.leave_attachment}">
                                    <input type="file" class="attendance_leave_file-${index}" name="group[${index}][leave_attachment]" value="${attendance.leave_attachment}" onchange="hasFile(${index})">
                                    <label class="remove-label remove-label-${index}" onclick="removeFile('${index}')"><i class="fas fa-trash text-danger"></i></label>
                                    <div class="leave_attachment-${index}">
                                        ${attendance.leave_attachment ? `<a href="${attendance.leave_attachment}" target="_blank"><i class="fas fa-eye"></i></a>` : ''}
                                    </div>
                                </div>
                                <div style="flex:0 0 280px;">
                                    <input type="hidden" name="group[${index}][old_claim_attachment]" value="${attendance.claim_attachment}">
                                    <input type="file" class="attendance_claim_file-${index}" name="group[${index}][claim_attachment]" onchange="hasClaim(${index})">
                                    <label class="remove-label remove-claim-${index}" onclick="removeClaim('${index}')"><i class="fas fa-trash text-danger"></i></label>
                                    <div class="claim_attachment-${index}">
                                        ${attendance.claim_attachment ? `<a href="${attendance.claim_attachment}" target="_blank"><i class="fas fa-eye"></i></a>` : ''}
                                    </div>
                                </div>
                                <div style="flex:0 0 280px;">
                                    <select class="form-control single-select-field change attendance_reimbursement"
                                        data-line="1" name="group[${index}][type_of_reimbursement]"
                                        style="width:100%" tabindex="-1" aria-hidden="true">
                                        <option value="">Choose One</option>
                                        <option value="1" ${attendance.type_of_reimbursement === '1' ? 'selected' : ''}>Transport Reimbursement</option>
                                        <option value="2" ${attendance.type_of_reimbursement === '2' ? 'selected' : ''}>Medical Reimbursement</option>
                                        <option value="4" ${attendance.type_of_reimbursement === '4' ? 'selected' : ''}>Meal Reimbursement</option>
                                        <option value="3" ${attendance.type_of_reimbursement === '3' ? 'selected' : ''}>Other</option>
                                    </select>
                                </div>
                                <div style="flex:0 0 150px;">
                                    <input type="text" style="text-align:center" class="form-control" value="${attendance.amount_of_reimbursement}" data-week="1"
                                        name="group[${index}][amount_of_reimbursement]">
                                </div>

                            </div>
                        `;

                        // Append the generated HTML to #haveData
                        $('#haveData').append(html);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error loading attendance data:', xhr.status);
                }
            });
        @endif
    }

    function work_check(day)
    {
        let worked = $('#workCheB-' + day).val();
        if ($('#workCheB-' + day).is(':checked')) {
            $('#workCheB-' + day).prop('checked', true).addClass('checked');
        } else if ($('#workCheB-' + day).is(':not(:checked)')) {
            $('#workCheB-' + day).prop('checked', false).removeClass('checked');
        }
    }

    function timeCalculation(day)
    {
        let lunch_val = convert_lunch_to_minutes($('.lunch_val-' + day).val());

        let inMoment = moment($('.inTime-' + day).val(), 'HH:mm');
        let outMoment = moment($('.outTime-' + day).val(), 'HH:mm');

        if (outMoment.isBefore(inMoment)) {
            outMoment.add(1, 'day');
        }

        let minutesDifference = outMoment.diff(inMoment, 'minutes');
        minutesDifference -= lunch_val;

        minutesDifference %= (24 * 60);

        let oldinTime = moment($('#oldinTime-' + day).val(), 'HH:mm');
        let oldoutTime = moment($('#oldoutTime-' + day).val(), 'HH:mm');

        if (oldoutTime.isBefore(oldinTime)) {
            oldoutTime.add(1, 'day');
        }

        let oldminutesDifference = oldoutTime.diff(oldinTime, 'minutes');
        oldminutesDifference -= lunch_val;
        oldminutesDifference %= (24 * 60);

        const over_time = Math.max(0, minutesDifference - oldminutesDifference);

        total_time(minutesDifference, day);
        over_time_calculation(over_time, day);

    }

    function over_time_calculation(over_time, day)
    {
        let hours = 0;
        let minutes = 0;

        if(over_time)
        {
            hours = Math.floor(over_time / 60);
            minutes = over_time % 60;
        }

        let ot = hours + ' h ' + minutes + ' m';
        $('.ot-' + day).val(ot);
    }

    function total_time(minutesDifference, day)
    {
        let hours = 0;
        let minutes = 0;

        if(minutesDifference)
        {
            hours = Math.floor(minutesDifference / 60);
            minutes = minutesDifference % 60;
        }

        let totla_time = hours + ' h ' + minutes + ' m';
        $('.totla_time-' + day).val(totla_time);
    }

    function ot_edit(day)
    {
        let ot_edit = $('#ot_edit-' + day); // Retrieve the checkbox element
        if (ot_edit.prop('checked')) { // Check if the checkbox is checked
            $('.ot-' + day).prop('readonly', true);
            $('.otc-' + day).prop('readonly', true);
        } else { // If the checkbox is not checked
            $('.ot-' + day).prop('readonly', false);
            $('.otc-' + day).prop('readonly', false);
        }
    }

    function removeFile(day)
    {
        $('.attendance_leave_file-' + day).val('');
        $('.remove-label-' + day).hide();
    }

    function hasFile(day)
    {
        $('.remove-label-' + day).show();
    }

    function removeClaim(day)
    {
        $('.attendance_claim_file-' + day).val('');
        $('.remove-claim-' + day).hide();
    }

    function hasClaim(day)
    {
        $('.remove-claim-' + day).show();
    }

    function convert_lunch_to_minutes($lunchHour)
    {
        switch ($lunchHour) {
            case '30 minutes':
                return 30;
            case '45 minutes':
                return 45;
            case '1 hour':
                return 60;
            case '1.5 hour':
                return 90;
            case '2 hour':
                return 120;
            case 'No Lunch':
                return 0;
            default:
                return 0;
        }
    }


    function leaveDay(day)
    {
        let inTime = $('#oldinTime-' + day).val();
        let outTime = $('#oldoutTime-' + day).val();
        let will_pay = 0;
        let leave_day = $('.change.leave_days-' + day).val();

        if (leave_day == 'Full Day Leave') {
            will_pay = 0;
            $('#workCheB-' + day).prop('checked', false);
            all_empty(day);

        } else if (leave_day == 'Half Day AM' || leave_day == 'Half Day PM') {
            $('#workCheB-' + day).prop('checked', true);

            if (leave_day === 'Half Day AM') {
                let changed_time = calculateHalfTime(inTime, outTime, 'PM');
                $('.inTime-' + day).val(changed_time);
                $('.outTime-' + day).val($('#oldoutTime-' + day).val());
            } else if (leave_day === 'Half Day PM') {
                let changed_time = calculateHalfTime(inTime, outTime, 'PM');
                $('.outTime-' + day).val(changed_time);
                $('.inTime-' + day).val($('#oldinTime-' + day).val());
            }
            will_pay = 0.5;
        }
        timeCalculation(day);
    }

    function calculateHalfTime(startTime, endTime, halfType) {
        let halfHour = halfType === 'AM' ? 12 : 24; // Determine the half hour

        // Split start and end times
        let [startHour, startMinute] = startTime.split(':').map(Number);
        let [endHour, endMinute] = endTime.split(':').map(Number);

        // Calculate the total minutes for the start and end times
        let totalStartMinutes = startHour * 60 + startMinute;
        let totalEndMinutes = endHour * 60 + endMinute;

        // Calculate the halfway point in minutes
        let halfwayMinutes = (totalStartMinutes + totalEndMinutes) / 2;

        // Adjust the hour and minute for the halfway point
        let halfwayHour = Math.floor(halfwayMinutes / 60) % 24;
        let halfwayMinute = halfwayMinutes % 60;

        // Format the halfway time
        return `${halfwayHour}:${halfwayMinute < 10 ? '0' : ''}${halfwayMinute}`;
    }

    function leave_filds(day)
    {
        $('.remark-' + day).val('');
        $('.type_of_leave-' + day).val('');
        $('.leave_days-' + day).val('');
        $('.leave_attachment-' + day).val('');
        $('.claim_attachment-' + day).val('');
    }
    function all_empty(day)
    {
        $('.inTime-' + day).val('');
        $('.outTime-' + day).val('');
        $('.next_day-' + day).val('');
        $('.lunch_val-' + day).val('');
        $('.totla_time-' + day).val('');
        $('.normal_time-' + day).val('');
        $('.ot-' + day).val('');
        $('.otc-' + day).val('');
        $('#ot_edit-' + day).val('');
        $('#workCheB-' + day).val('');
        $('.ph-' + day).val('');
        $('.ph_pay-' + day).val('');
    }


    $(document).ready(function() {
        var days = '{{$daysInMonth}}';
        for (let day = 0; day <= days; day++) {
            all_empty(day);
            leave_filds(day);
        }
    });

</script>
<style>
    .remove-label,
    .remove-claim {
        display: none;
        cursor: pointer;
    }

    .bg-f1f1f1 {
        background-color: #f1f1f1;
    }
</style>
