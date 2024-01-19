<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendenceParent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\FileHelper;

class AttendanceController extends Controller
{

    public function mystore(Request $request)
    {
        // return $request;
        // try {


        $attP = new AttendenceParent;
        $attP->candidate_id = $request->group[1]['candidate_id'];
        $attP->company_id = $request->group[1]['company_id'];
        $attP->invoice_no = $request->group[1]['invoice_no'] ?? 0;
        $attP->month_year = $request->group[1]['date'];
        $attP->save();
        
        $data = $request->group;
        foreach ($data as $group) {
            $att = new Attendance();
            $att->parent_id = $attP->id;
            $att->date = $group['date'];
            $att->day = $group['day'];
            $att->in_time = $group['in_time'];
            $att->out_time = $group['out_time'];
            $att->next_day = $group['next_day'];
            $att->lunch_hour = $group['lunch_hour'] ? $group['lunch_hour'] : "";
            $att->total_hour_min = $group['total_hour_min'];
            $att->normal_hour_min = $group['normal_hour_min'];
            $att->ot_hour_min = $group['ot_hour_min'];
            $att->ot_calculation = $group['ot_calculation'];
            $att->ot_edit = $group['ot_edit'] ?? 0;
            $att->work = isset($group['work']) ? 1 : 0;
            $att->ph = $group['ph'] ?? 0;
            $att->ph_pay = $group['ph_pay'] ?? 0;
            $att->remark = $group['remark'];
            $att->type_of_leave = $group['type_of_leave'];
            $att->leave_day = $group['leave_day'];
            $att->leave_attachment = isset($group['leave_attachment']) ?  FileHelper::uploadFile($group['leave_attachment']) : "";
            $att->claim_attachment = isset($group['claim_attachment']) ? FileHelper::uploadFile($group['claim_attachment']) : "";
            $att->type_of_reimbursement = isset($group['type_of_reimbursement']) ? $group['type_of_reimbursement'] : '';
            $att->amount_of_reimbursement = isset($group['amount_of_reimbursement']) ? $group['amount_of_reimbursement'] : 0.00;
            $att->save();
        }
        return redirect()->route('attendence.index');
        //  } catch (\Exception $e) {

        //      \Log::error('Error creating attendance: ' . $e->getMessage());


        //      return redirect()->route('attendence.create')->with('error', 'Failed to add attendance. Please try again.');
        //  }
    }
}
