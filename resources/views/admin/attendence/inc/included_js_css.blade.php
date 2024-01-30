
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function allWork(days) {
        var checkbox = document.getElementById('allCheckB');
        var emptyDiv = document.getElementById('empty');
        var haveDataDiv = document.getElementById('haveData');

        if (checkbox.checked) {
            emptyDiv.style.display = 'none';
            haveDataDiv.style.display = 'block';
        } else {
            emptyDiv.style.display = 'block';
            haveDataDiv.style.display = 'none';
        }

        for (let day = 1; day <= days; day++) {
            if ($('#allCheckB').is(':checked')) {
                $('.bg-' + day).addClass('bg-f1f1f1');
                $('#workCheB-' + day).prop('checked', true).addClass('checked');
            } else if ($('#allCheckB').is(':not(:checked)')) {
                $('.bg-' + day).removeClass('bg-f1f1f1');
                $('#workCheB-' + day).prop('checked', false).removeClass('checked');
            }

            timeCalculation(day);
        }
    }

    function work_check(day) {
        if ($('#workCheB-' + day).is(':checked')) {
            $('.bg-' + day).addClass('bg-f1f1f1');
            $('#workCheB-' + day).prop('checked', true).addClass('checked');
        } else if ($('#workCheB-' + day).is(':not(:checked)')) {
            $('.bg-' + day).removeClass('bg-f1f1f1');
            $('#workCheB-' + day).prop('checked', false).removeClass('checked');
        }
        timeCalculation(day);
    }

    function removeFile(day) {
        $('.attendance_leave_file-' + day).val('');
        $('.remove-label-' + day).hide();
    }

    function hasFile(day) {
        console.log(day);
        $('.remove-label-' + day).show();
    }

    function removeClaim(day) {
        $('.attendance_claim_file-' + day).val('');
        $('.remove-claim-' + day).hide();
    }

    function hasClaim(day) {
        $('.remove-claim-' + day).show();
    }

    function timeCalculation(day) {
        let lunch_val = tream($('.lunch_val-' + day).val());
        let inTime = $('.inTime-' + day).val();
        let outTime = $('.outTime-' + day).val();
        console.log($('.ot-' + day).val());
        let ot = parseTimeString($('.ot-' + day).val());
        const timeDifference = calculateTimeDifference(inTime, outTime);
        const after_leave = leaveDay(day, timeDifference);
        const sumTimeDifference = sumTimeDifferences([after_leave, ot]);
        const normal_time = sumTimeDifference.hours + ' h ' + sumTimeDifference.minutes + ' m';

        let result = subtractTimeDifference(sumTimeDifference, lunch_val);
        const total_time = result.hours + ' h ' + result.minutes + ' m';

        $('.totla_time-' + day).val(total_time);
        $('.normal_time-' + day).val(normal_time);
    }

    function leaveDay(day, hour_min) {
        let hours = 0;
        let minutes = 0;
        let will_pay = 1;
        let leave_day = $('.change.leave_days.hi-' + day).val();
        if (leave_day == 'Full Day Leave') {
            will_pay = 0;
        } else if (leave_day == 'Half Day AM' || leave_day == 'Half Day PM') {
            will_pay = 0.5;
        }

        const total_min = (hour_min.hours * 60 + hour_min.minutes) * will_pay;
        // Calculate hours and remaining minutes
        hours = Math.floor(total_min / 60);
        minutes = total_min % 60;

        return {
            hours,
            minutes
        };
    }

    function parseTimeString(timeString) {
        const regex = /(\d+)\s*h\s*(\d+)\s*m/;
        const match = timeString.match(regex);

        let hours = 0;
        let minutes = 0;

        if (match) {
            hours = parseInt(match[1], 10);
            minutes = parseInt(match[2], 10);
        }

        return {
            hours,
            minutes
        };
    }

    function tream(value) {
        let totalMinutes = 0;
        if (value === '30 minutes') {
            totalMinutes = 30;
        } else if (value === '45 minutes') {
            totalMinutes = 45;
        } else if (value === '1 hour') {
            totalMinutes = 60;
        } else if (value === '1.5 hour') {
            totalMinutes = 90;
        } else if (value === '2 hour') {
            totalMinutes = 120;
        }

        const hours = Math.floor(totalMinutes / 60);
        const minutes = totalMinutes % 60;
        return {
            hours,
            minutes
        };
    }

    function calculateTimeDifference(inTime, outTime) {
        let hours = 0;
        let minutes = 0;
        if (!inTime || !outTime) {
            return { hours, minutes };
        }
        const [inHours, inMinutes] = inTime.split(':').map(Number);
        const [outHours, outMinutes] = outTime.split(':').map(Number);

        const totalInMinutes = inHours * 60 + inMinutes;
        const totalOutMinutes = outHours * 60 + outMinutes;

        const minutesDifference = totalOutMinutes - totalInMinutes;
        hours = (Math.floor(minutesDifference / 60));
        minutes = (minutesDifference % 60);

        return {
            hours,
            minutes
        };
    }

    function subtractTimeDifference(minuend, subtrahend) {
        let totalHours = minuend.hours - subtrahend.hours;
        let totalMinutes = minuend.minutes - subtrahend.minutes;

        if (totalMinutes < 0) {
            totalHours--;
            totalMinutes += 60;
        }
        return {
            hours: totalHours,
            minutes: totalMinutes
        };
    }

    function sumTimeDifferences(timeDifferences) {
        let totalHours = 0;
        let totalMinutes = 0;

        for (const timeDiff of timeDifferences) {
            totalHours += timeDiff.hours;
            totalMinutes += timeDiff.minutes;
        }

        // Adjust total minutes if it exceeds 60
        totalHours += Math.floor(totalMinutes / 60);
        totalMinutes %= 60;

        return {
            hours: totalHours,
            minutes: totalMinutes
        };
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
