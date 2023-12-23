<script>
    $(document).ready(function() {
        $('#remark_type').change(function() {
            var selectedValue = $(this).val();
            // AssaignToManager Start
            if (selectedValue === '1') {
                $('#assaignToManager').show().css('display', 'show');
            } else {
                $('#assaignToManager').hide().css('display', 'none');
            }
            //AssaignToManager end
            // AssaignToTeamLeader Start
            if (selectedValue === '2') {
                $('#assaignToTeamLeader').show().css('display', 'show');
            } else {
                $('#assaignToTeamLeader').hide().css('display', 'none');
            }
            //AssaignToTeamLeader end
            // AssaignToRC Start
            if (selectedValue === '3') {
                $('#assaignToRC').show().css('display', 'show');
            } else {
                $('#assaignToRC').hide().css('display', 'none');
            }
            //AssaignToRC end
            //AssaignInterview start
            if (selectedValue === '5') {
                $('#interviewTime').show().css('display', 'show');
                $('#interviewCompany').show().css('display', 'show');
                $('#expectedSalary').show().css('display', 'show');
                $('#interviewPosition').show().css('display', 'show');
                $('#receivedJobOffer').show().css('display', 'show');
                $('#emailNoticeDate').show().css('display', 'show');
                $('#interviewDate').show().css('display', 'show');
                $('#interviewBy').show().css('display', 'show');
                $('#jobOfferSalary').show().css('display', 'show');
                $('#attendInterview').show().css('display', 'show');
                $('#availableDate').show().css('display', 'show');
                $('#interviewEmailNoticeDate').show().css('display', 'show');
            } else {
                $('#interviewTime').hide().css('display', 'none');
                $('#interviewCompany').hide().css('display', 'none');
                $('#expectedSalary').hide().css('display', 'none');
                $('#interviewPosition').hide().css('display', 'none');
                $('#receivedJobOffer').hide().css('display', 'none');
                $('#emailNoticeDate').hide().css('display', 'none');
                $('#interviewDate').hide().css('display', 'none');
                $('#interviewBy').hide().css('display', 'none');
                $('#jobOfferSalary').hide().css('display', 'none');
                $('#attendInterview').hide().css('display', 'none');
                $('#availableDate').hide().css('display', 'none');
                $('#interviewEmailNoticeDate').hide().css('display', 'none');
            }
            //AssaignInterview end

            // AssaignToRC Start
            if (selectedValue === '6') {
                $('#assaignToClient').show().css('display', 'show');
                $('#clientArNo').show().css('display', 'show');
            } else {
                $('#assaignToClient').hide().css('display', 'none');
                $('#clientArNo').hide().css('display', 'none');
            }
            //AssaignToRC end
            // AssaignToClient Start
            if (selectedValue === '7') {
                $('#shortlistClientCompany').show().css('display', 'show');
                $('#shortlistDepartment').show().css('display', 'show');
                $('#shortlistPlacement').show().css('display', 'show');
                $('#shortlistJobTitle').show().css('display', 'show');
                $('#shortlistJobType').show().css('display', 'show');
                $('#shortlistProbationPeriod').show().css('display', 'show');
                $('#shortlistContractSigningDate').show().css('display', 'show');
                $('#shortlistEmailNoticeDate').show().css('display', 'show');
                $('#shortlistSalary').show().css('display', 'show');
                $('#shortlistArNo').show().css('display', 'show');
                $('#shortlistHourlyRate').show().css('display', 'show');
                $('#shortlistAdminFee').show().css('display', 'show');
                $('#shortlistStartDate').show().css('display', 'show');
                $('#shortlistReminderPeriod').show().css('display', 'show');
                $('#shortlistContractSigningTime').show().css('display', 'show');
                $('#shortlistLastDay').show().css('display', 'show');
                $('#shortlistEmailNoticeTime').show().css('display', 'show');
            } else {
                $('#shortlistClientCompany').hide().css('display', 'none');
                $('#shortlistDepartment').hide().css('display', 'none');
                $('#shortlistPlacement').hide().css('display', 'none');
                $('#shortlistJobType').hide().css('display', 'none');
                $('#shortlistProbationPeriod').hide().css('display', 'none');
                $('#shortlistContractSigningDate').hide().css('display', 'none');
                $('#shortlistEmailNoticeDate').hide().css('display', 'none');
                $('#shortlistSalary').hide().css('display', 'none');
                $('#shortlistArNo').hide().css('display', 'none');
                $('#shortlistHourlyRate').hide().css('display', 'none');
                $('#shortlistAdminFee').hide().css('display', 'none');
                $('#shortlistStartDate').hide().css('display', 'none');
                $('#shortlistContractEndDate').hide().css('display', 'none');
                $('#shortlistReminderPeriod').hide().css('display', 'none');
                $('#shortlistContractSigningTime').hide().css('display', 'none');
                $('#shortlistLastDay').hide().css('display', 'none');
                $('#shortlistEmailNoticeTime').hide().css('display', 'none');
            }
            //AssaignToClient end

        });
        $('#remark_type').trigger('change');
    });
</script>
