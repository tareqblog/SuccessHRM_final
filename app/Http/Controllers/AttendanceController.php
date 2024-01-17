<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function create(Request $request)
    {
        //
    }
    public function mystore(Request $request)
    {
        try {

            $request->validate([
                'date' => 'required|array',
                'date.*' => 'date_format:Y-m-d',
            ]);

            $data = $request->except('_token');

            foreach ($data['date'] as $date) {
                $date = Carbon::createFromFormat('Y-m-d', $date)->toDateString();
            }

            $fieldsToSkipEncoding = ['day', 'in_time', 'out_time', 'lunch_hour', 'total_hour_min', 'normal_hour_min', 'ot_hour_min', 'ot_calculation', 'ot_edit', 'work', 'ph', 'ph_pay', 'remark', 'type_of_leave', 'leave_day', 'amount_of_reimbursement'];

            foreach ($fieldsToSkipEncoding as $field) {
                if (isset($data[$field])) {
                    unset($data[$field]);
                }
            }

            Attendance::create($data);

            return redirect()->route('admin.dashboard');
        } catch (\Exception $e) {

            \Log::error('Error creating attendance: ' . $e->getMessage());

            return back()->with('error', 'Failed to add attendance. Please try again.');
        }
    }
}
