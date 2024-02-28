<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\AttendenceParent;
use App\Models\Attendance;
use App\Models\candidate;
use App\Models\CandidateWorkingHour;
use App\Models\Company;
use App\Models\LeaveType;
use App\Models\TimeSheet;
use App\Models\TimeSheetEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{

    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('attendence.index')) {
            abort(403, 'Unauthorized');
        }

        $validator = Validator::make($request->all(), [
            'start_date' => 'nullable|date',
            'end_date' => [
                'nullable',
                'date',
                Rule::requiredIf(function () use ($request) {
                    return !is_null($request->input('start_date'));
                }),
            ],
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validator->validated();

        $start = $request->input('start_date');
        $end = $request->input('end_date');

        // Filter records based on the date range
        $query = AttendenceParent::query();

        if ($start && $end) {
            $query->whereBetween('month_year', [$start, $end]);
        } else {
            $start = $end = Carbon::now()->toDateString();
        }

        $datas = $query->latest()->get();

        return view('admin.attendence.index', compact('datas', 'start', 'end'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('attendence.create')) {
            abort(403, 'Unauthorized');
        }
        $currentMonth = Carbon::parse();
        $daysInMonth = $currentMonth->daysInMonth;

        $companies = Company::latest()->get();
        $candidates = candidate::latest()->where('candidate_status',1)->get();

        return view('admin.attendence.create', compact('companies', 'candidates', 'daysInMonth'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parent = AttendenceParent::find($id);
        $candidate_id = $parent->candidate_id;
        $company_id = $parent->company_id;
        $attendances = Attendance::where('parent_id', $parent->id)->get();
        $daysInMonth = $attendances->count();
        $leaveTypes = LeaveType::where('leavetype_status', 1)->get();
        $month_year = $parent['month_year'];
        $companies = Company::latest()->get();
        $candidates = candidate::latest()->where('candidate_status',1)->get();

        return view('admin.attendence.edit', compact(
            'daysInMonth',
            'month_year',
            'candidate_id',
            'companies',
            'candidates',
            'attendances',
            'leaveTypes',
            'parent',
        ));
    }

    public function update(Request $request, string $id)
    {
        // if (is_null($this->user) || !$this->user->can('attendence.update')) {
        //     abort(403, 'Unauthorized');
        // }

        // return $request;

        $parent = AttendenceParent::find($id);

        $data = $request->group;
        foreach ($data as $group) {
            $date = Carbon::parse($group['date']);
            $formattedDate = $date->format('Y-m-d');
            $attendance = Attendance::where('parent_id', $parent->id)
                ->where('date', $formattedDate)
                ->first();

            $attendance->day = $group['day'];
            $attendance->in_time = $group['in_time'];
            $attendance->out_time = $group['out_time'];
            $attendance->next_day = $group['next_day'] ?? 0;
            $attendance->lunch_hour = $group['lunch_hour'] ? $group['lunch_hour'] : 0;
            $attendance->total_hour_min = $group['total_hour_min'];
            $attendance->normal_hour_min = $group['normal_hour_min'];
            $attendance->ot_hour_min = $group['ot_hour_min'];
            $attendance->ot_calculation = $group['ot_calculation'];
            $attendance->ot_edit = $group['ot_edit'] ?? 0;
            $attendance->work = isset($group['work']) ? 1 : 0;
            $attendance->ph = $group['ph'] ?? 0;
            $attendance->ph_pay = $group['ph_pay'] ?? 0;
            $attendance->remark = $group['remark'];
            $attendance->type_of_leave = $group['type_of_leave'] ?? 0;
            $attendance->leave_day = $group['leave_day'] ?? 0;
            if (isset($group['leave_attachment'])) {
                $attendance->leave_attachment =  FileHelper::uploadFile($group['leave_attachment']);
            }
            if (isset($group['claim_attachment'])) {
                $attendance->claim_attachment =  FileHelper::uploadFile($group['claim_attachment']);
            }
            $attendance->type_of_reimbursement = isset($group['type_of_reimbursement']) ? $group['type_of_reimbursement'] : '';
            $attendance->amount_of_reimbursement = isset($group['amount_of_reimbursement']) ? $group['amount_of_reimbursement'] : 0.00;
            $attendance->save();
        }

        // return Attendance::where('parent_id', $parent->id)->get();
        return redirect()->back();
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (is_null($this->user) || !$this->user->can('attendence.destroy')) {
            abort(403, 'Unauthorized');
        }
        //
    }

    public function getCandidateAttendenceData($id)
    {
        $workingHours = CandidateWorkingHour::where('candidate_id', $id)->pluck('timesheet_id');

        $timesheetData = TimeSheetEntry::whereIn('time_sheet_id', $workingHours)->get();

        foreach ($timesheetData as $time) {
            $daysArray[] = $time;
        }

        return response()->json(['daysArray' => $daysArray]);
    }

    public function getCandidateCompany($id)
    {
        $id = explode('-', $id);

        if (count($id) === 2) {
            $companyId = $id[0];
            $candidateId = $id[1];

            return response()->json(['candidateId' => $candidateId]);
            // return $data = Company::where('id', $companyId)->first();

            // if ($data) {
                // return response()->json(['company' => $data, 'candidateId' => $candidateId]);
            // } else {
            //     return response()->json(['error' => 'Company not found'], 404);
            // }
        } else {
            return response()->json(['error' => 'Invalid data format'], 400);
        }
    }

    public function getMonthData(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'candidate_id' => 'required|exists:candidates,id',
            'company_id' => 'nullable|exists:companies,id',
            'invoice_no' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();
        $providedDate = Carbon::parse($validated['date']);


        // Extract month and year from the provided date
        $providedMonth = $providedDate->format('m');
        $providedYear = $providedDate->format('Y');

        // Query to compare month and year
        $parent = AttendenceParent::where('candidate_id', $validated['candidate_id'])
        ->whereMonth('month_year', $providedMonth)
        ->whereYear('month_year', $providedYear)
        ->first();

        if($parent != null)
        {
            $attendances = Attendance::where('parent_id', $parent->id)->get();
            foreach ($attendances as $key => $attendance)
            {
                $attendance->delete();
            }
            $parent->delete();
            // return redirect()->route('attendence.edit', $parent->id);
        }

        $candidate = Candidate::select('id', 'candidate_name', 'candidate_outlet_id')
                                ->with('working_hour', 'leaves')
                                ->find($validated['candidate_id']);

        $currentMonth = Carbon::parse($validated['date']);
        $daysInMonth = $currentMonth->daysInMonth;

        if($candidate->working_hour?->timesheet_id != null)
        {
            $timesheet = TimeSheet::find($candidate->working_hour->timesheet_id);
        } else {
            return redirect()->back()->with('error', 'Timesheet Not found');
        }

        $timeSheetData = json_decode($timesheet->entities, true);

        $leaves = $candidate->leaves;
        $formate = [];

        // Loop through each day in the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $formate[$day] = [
                'ot_edit' => 0,
                'work' => 0,
                'date' => $currentMonth->copy()->day($day)->format('d-m-Y'),
                'next_day' => 0,
                'day' => $currentMonth->copy()->day($day)->format('l'),
                'in_time' => null,
                'out_time' => null,
                'lunch_hour' => null,
                'ot_rate' => $timesheet['ot_rate'] ?? 'off',
                'minimum' => $timesheet['minimum'],
                'allowance' => $timesheet['allowance'],
                'isLeave' => 0,
                'leave_types_id' => null,
                'leaveRemarks' => null,
                'leave_attachment' => null,
                'leave_day' => '',
                'claim_attachment' => null,
            ];
            foreach ($timeSheetData as $timesheet) {
                if ($timesheet['day'] === $formate[$day]['day']) {
                    if($timesheet['in_time'] != null)
                    {
                        $lunch_time = convert_lunch_to_minutes($timesheet['lunch_time']);

                        $in_time = Carbon::createFromFormat("H:i", $timesheet['in_time']);
                        $out_time = Carbon::createFromFormat("H:i", $timesheet['out_time']);
                        $minuteDiff = $in_time->diffInMinutes($out_time);
                        $minuteDiff -= $lunch_time;
                        $hourDiff = floor($minuteDiff / 60);
                        $minuteDiff %= 60;
                        $timedifference = $hourDiff . ' h ' . $minuteDiff . ' m';

                        $formate[$day]['work'] = 1;
                        $formate[$day]['in_time'] = $timesheet['in_time'];
                        $formate[$day]['out_time'] = $timesheet['out_time'];
                        $formate[$day]['total_hour_min'] = $timedifference;
                        $formate[$day]['normal_hour_min'] = $timedifference;
                        $formate[$day]['lunch_hour'] = $timesheet['lunch_time'];
                        $formate[$day]['ot_rate'] = $timesheet['ot_rate'] ?? 'off';
                        $formate[$day]['minimum'] = $timesheet['minimum'];
                        $formate[$day]['allowance'] = $timesheet['allowance'];
                    }
                    break;
                }
            }

            // Check for leave data
            foreach ($leaves as $leave) {
                $leaveDateFrom = Carbon::parse($leave->leave_datefrom);
                $leaveDateTo = Carbon::parse($leave->leave_dateto);

                if (Carbon::parse($currentMonth->copy()->day($day))->between($leaveDateFrom, $leaveDateTo)) {
                    $formate[$day]['work'] = 0;
                    $formate[$day]['in_time'] = null;
                    $formate[$day]['out_time'] = null;
                    $formate[$day]['lunch_hour'] = null;
                    $formate[$day]['total_hour_min'] = 0;
                    $formate[$day]['normal_hour_min'] = 0;
                    $formate[$day]['ot_rate'] = $timesheet['ot_rate'] ?? 'off';
                    $formate[$day]['minimum'] = $timesheet['minimum'];
                    $formate[$day]['allowance'] = $timesheet['allowance'];

                    $formate[$day]['isLeave'] = true;
                    $formate[$day]['leave_types_id'] = $leave->leave_types_id;
                    $formate[$day]['leave_day'] = $leave->leave_duration;
                    $formate[$day]['leaveRemarks'] = $leave->leave_reason;
                    $formate[$day]['leave_attachment'] = $leave->leave_file_path;
                    break;
                }
            }
        }

        $leaveTypes = LeaveType::where('leavetype_status', 1)->get();
        $companies = Company::latest()->get();
        $candidates = candidate::latest()->where('candidate_status',1)->get();
        $candidate_id = $request->candidate_id;
        $selectCandidate = $candidate->candidate_outlet_id . '-' . $candidate_id;
        $month_year = $validated['date'];

        // return $formate;
        DB::beginTransaction();

        try {
            $attP = new AttendenceParent;
            $attP->candidate_id = $request->candidate_id;
            $attP->company_id = $request->company_id ?? 0;
            $attP->invoice_no = $request->invoice_no ?? 0;
            $attP->month_year = $validated['date'];
            $attP->save();
            foreach ($formate as $day => $group) {
                $date = Carbon::createFromFormat('d-m-Y', $group['date']);
                $formattedDate = $date->format('Y-m-d');

                $att = new Attendance();
                $att->parent_id = $attP->id;
                $att->date = $formattedDate;
                $att->day = $group['day'];
                $att->in_time = $group['in_time'];
                $att->out_time = $group['out_time'];
                $att->next_day = $group['next_day'] ?? 0;
                $att->lunch_hour = $group['lunch_hour'] ? $group['lunch_hour'] : "";
                $att->total_hour_min = $group['total_hour_min'] ?? 0;
                $att->normal_hour_min = $group['normal_hour_min'] ?? 0;
                $att->ot_hour_min = $group['ot_hour_min'] ?? 0;
                $att->ot_calculation = $group['ot_calculation'] ?? 0;
                $att->ot_edit = $group['ot_edit'] ?? 0;
                $att->work = $group['work'];
                $att->ph = $group['ph'] ?? 0;
                $att->ph_pay = $group['ph_pay'] ?? 0;
                $att->remark = $group['remark'] ?? null;
                $att->type_of_leave = $group['type_of_leave'] ?? null;
                $att->leave_day = $group['leave_day'];
                $att->type_of_reimbursement = isset($group['type_of_reimbursement']) ? $group['type_of_reimbursement'] : '';
                $att->amount_of_reimbursement = isset($group['amount_of_reimbursement']) ? $group['amount_of_reimbursement'] : 0.00;

                $att->save();
            }

            DB::commit();
            return redirect()->route('attendence.edit', $attP->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }



        // return $formate;

        // `date`, `day`, `in_time`, `out_time`, `next_day`, `lunch_hour`, `total_hour_min`, `normal_hour_min`, `ot_hour_min`, `ot_calculation`, `ot_edit`, `work`, `ph`, `ph_pay`, `remark`, `type_of_leave`, `leave_day`, `leave_attachment`, `claim_attachment`, `type_of_reimbursement`, `amount_of_reimbursement`,

        // $work_data = CandidateWorkingHour::where('candidate_id', $request->candidate_id)->firstOrFail();


        // $timesheet_id  = $work_data->timesheet_id;
        // $timeSheetData  = TimeSheetEntry::where('time_sheet_id', $timesheet_id)->get();

        // $candidate_id = $request->candidate_id;
        // $data = [
        //     'candidate_id' => $candidate_id,
        //     'daysInMonth' => $daysInMonth,
        //     'currentMonth' => $currentMonth,
        //     'candidates' => $candidates,
        //     'selectedDate' => $selectedDate,
        //     'selectCandidate' => $selectCandidate,
        //     'timeSheetData' => $timeSheetData,
        //     'company_outlet_id' => $company_outlet_id,
        //     'company_name' => $company_name,
        //     'leaves' => $leaves,
        //     'leaveTypes' => $leaveTypes
        // ];

        // return $data;

        // return view('admin.attendence.create', compact(
        //     'candidate_id',
        //     'daysInMonth',
        //     'currentMonth',
        //     'candidates',
        //     'selectedDate',
        //     'selectCandidate',
        //     'timeSheetData',
        //     'company_outlet_id',
        //     'company_name',
        //     'leaves',
        //     'leaveTypes'
        // ));
    }

    public function attendencePrint(AttendenceParent $attendence)
    {

        $parent = $attendence;
        $attendence = $attendence->load('attendences');
        $attendances = $attendence->attendences;
        $leaveTypes = LeaveType::where('leavetype_status', 1)->get();
        return view('admin.attendence.print', compact('attendances', 'parent', 'leaveTypes'));
    }
}
