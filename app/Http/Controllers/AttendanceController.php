<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\FileHelper;

class AttendanceController extends Controller
{
    public function create(Request $request)
    {
        //
    }
    public function mystore(Request $request)
    {
        // dd($request->all());
        // die();
        // try {

            // $request->validate([
            //     'date' => 'required|array',
            //     'date.*' => 'date_format:Y-m-d',
            // ]);


            $data=$request->group;
            foreach($data as $group){
                // dd($group['next_day']);
                // $day = $group['day'];
            $att=new Attendance();
            $att->candidate_id=$group['candidate_id'];
            $att->company_id=$group['company_id'];
            $att->date=$group['date'];
            $att->day=$group['day'];
            $att->in_time=$group['in_time'];
            $att->out_time=$group['out_time'];
            $att->next_day=$group['next_day'];
            // $att->lunch_hour = isset($group['day']['lunch_hour']) ? $group['day']['lunch_hour'] : 'done';
            $att->lunch_hour= $group['lunch_hour'] ? $group['lunch_hour'] : "";
            $att->total_hour_min=$group['total_hour_min'];
            $att->normal_hour_min=$group['normal_hour_min'];
            $att->ot_hour_min=$group['ot_hour_min'];
            $att->ot_calculation=$group['ot_calculation'];
            $att->ot_edit=$group['ot_edit'];
            $att->work=isset($group['work']) ? 1 : 0;
            $att->ph=$group['ph'];
            $att->ph_pay=$group['ph_pay'];
            $att->remark=$group['remark'];
            $att->type_of_leave=$group['type_of_leave'];
            $att->leave_day=$group['leave_day'];
            $att->leave_attachment= isset($group['leave_attachment']) ?  FileHelper::uploadFile($group['leave_attachment']) : "";
            $att->claim_attachment= isset($group['claim_attachment']) ? FileHelper::uploadFile($group['claim_attachment']) : "";
            $att->type_of_reimbursement=isset($group['type_of_reimbursement']) ? $group['type_of_reimbursement'] : '';
            $att->amount_of_reimbursement=isset($group['amount_of_reimbursement']) ? $group['amount_of_reimbursement'] : 0.00;
            $att->save();

                }
            return redirect()->route('admin.dashboard');
        //  } catch (\Exception $e) {

        //      \Log::error('Error creating attendance: ' . $e->getMessage());


        //      return redirect()->route('attendence.create')->with('error', 'Failed to add attendance. Please try again.');
        //  }
    }
}
