
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
        let will_pay = 0;
        let leave_day = $('.change.leave_days.hi-' + day).val();

        if (leave_day == 'Full Day Leave') {
            will_pay = 0;
            $('#workCheB-' + day).prop('checked', false);
        } else if (leave_day == 'Half Day AM' || leave_day == 'Half Day PM') {
            if (leave_day === 'Half Day AM') {
            } else if (leave_day === 'Half Day PM') {
            }
            will_pay = 0.5;
        }
    }

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
