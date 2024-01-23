<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\AttendenceParent;
use App\Models\Attendance;
use App\Models\candidate;
use App\Models\CandidateWorkingHour;
use App\Models\Company;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\TimeSheetEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\ReturnTypePass;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

        $companies = Company::latest()->get();
        $candidates = candidate::latest()->get();

        return view('admin.attendence.create', compact('companies', 'candidates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function mystore(Request $request)
    // {
    //     try {

    //         dd($request->all());

    //         // $request->validate([
    //         //     'date' => 'required|array',
    //         //     'date.*' => 'date_format:Y-m-d',
    //         // ]);

    //         $attP = New AttendenceParent;
    //         $attP->candidate_id = $request->candidate_id;
    //         $attP->company_id = $request->company_id;
    //         $attP->invoice_no = $request->invoice_no;
    //         $attP->month_year = $request->date;
    //         $attP->save();


    //         $data=$request->group;
    //         foreach($data as $group){
    //         $att=new Attendance();
    //         $att->attendance_parrent_id=$attP->id;
    //         $att->candidate_id=$group['candidate_id'];
    //         $att->company_id=$group['company_id'];
    //         $att->date=$group['date'];
    //         $att->day=$group['day'];
    //         $att->in_time=$group['in_time'];
    //         $att->out_time=$group['out_time'];
    //         $att->next_day=$group['next_day'];
    //         // $att->lunch_hour = isset($group['day']['lunch_hour']) ? $group['day']['lunch_hour'] : 'done';
    //         $att->lunch_hour= $group['lunch_hour'] ? $group['lunch_hour'] : "";
    //         $att->total_hour_min=$group['total_hour_min'];
    //         $att->normal_hour_min=$group['normal_hour_min'];
    //         $att->ot_hour_min=$group['ot_hour_min'];
    //         $att->ot_calculation=$group['ot_calculation'];
    //         $att->ot_edit=$group['ot_edit'];
    //         $att->work=isset($group['work']) ? 1 : 0;
    //         $att->ph=$group['ph'];
    //         $att->ph_pay=$group['ph_pay'];
    //         $att->remark=$group['remark'];
    //         $att->type_of_leave=$group['type_of_leave'];
    //         $att->leave_day=$group['leave_day'];
    //         $att->leave_attachment= isset($group['leave_attachment']) ?  FileHelper::uploadFile($group['leave_attachment']) : "";
    //         $att->claim_attachment= isset($group['claim_attachment']) ? FileHelper::uploadFile($group['claim_attachment']) : "";
    //         $att->type_of_reimbursement=isset($group['type_of_reimbursement']) ? $group['type_of_reimbursement'] : '';
    //         $att->amount_of_reimbursement=isset($group['amount_of_reimbursement']) ? $group['amount_of_reimbursement'] : 0.00;
    //         $att->save();

    //             }
    //         return redirect()->route('admin.dashboard');
    //      } catch (\Exception $e) {

    //          \Log::error('Error creating attendance: ' . $e->getMessage());


    //          return redirect()->route('attendence.create')->with('error', 'Failed to add attendance. Please try again.');
    //      }
    // }

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

        // $datas = Attendance::where('attendance_parrent_id', $id)->get();

        $parent = AttendenceParent::find($id);
        $attendances = Attendance::where('parent_id', $parent->id)->get();
        $leaveTypes = LeaveType::where('leavetype_status', 1)->get();
        return view('admin.attendence.edit', compact('parent', 'attendances', 'leaveTypes'));

        // $candidate = candidate::where('id', $info->candidate_id)->first();
        // $company = Company::where('id', $info->company_id)->first();
        // $candidate_name = $candidate->candidate_name;
        // $candidate_id = $candidate->id;
        // $company_name = $company->name;
        // $company_id = $company->id;
        // $invoice = $info->invoice_no;
        // $month = $info->month_year;

        // $leaves = Leave::where('candidate_id', $candidate_id)->get();
        // $leaveTypes = LeaveType::where('leavetype_status', 1)->get();


        // return view(
        //     'admin.attendence.edit',
        //     compact(
        //         'datas',
        //         'candidate_name',
        //         'company_name',
        //         'candidate_id',
        //         'company_id',
        //         'invoice',
        //         'month',
        //         'leaves',
        //         'leaveTypes'
        //     )
        // );
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
            $attendance = Attendance::where('parent_id', $parent->id)
                            ->where('date', $group['date'])
                            ->first();
            $attendance->parent_id = $parent->id;
            $attendance->date = $group['date'];
            $attendance->day = $group['day'];
            $attendance->in_time = $group['in_time'];
            $attendance->out_time = $group['out_time'];
            $attendance->next_day = $group['next_day'] ?? 0;
            $attendance->lunch_hour = $group['lunch_hour'] ? $group['lunch_hour'] : "";
            $attendance->total_hour_min = $group['total_hour_min'];
            $attendance->normal_hour_min = $group['normal_hour_min'];
            $attendance->ot_hour_min = $group['ot_hour_min'];
            $attendance->ot_calculation = $group['ot_calculation'];
            $attendance->ot_edit = $group['ot_edit'] ?? 0;
            $attendance->work = isset($group['work']) ? 1 : 0;
            $attendance->ph = $group['ph'] ?? 0;
            $attendance->ph_pay = $group['ph_pay'] ?? 0;
            $attendance->remark = $group['remark'];
            $attendance->type_of_leave = $group['type_of_leave'];
            $attendance->leave_day = $group['leave_day'];
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

            $data = Company::where('id', $companyId)->first();

            if ($data) {
                return response()->json(['company' => $data, 'candidateId' => $candidateId]);
            } else {
                return response()->json(['error' => 'Company not found'], 404);
            }
        } else {
            return response()->json(['error' => 'Invalid data format'], 400);
        }
    }
    public function getMonthData(Request $request)
    {
        // return $request;
        // dd($request->company_id);

        $companies = Company::latest()->get();

        $candidates = candidate::latest()->get();

        $selectedDate = $request->date;

        $company_outlet_id = 1;

        if ($request->company_id) {
            $company_name = Company::find($request->company_id)->name;
            $selectCandidate = $request->company_id . '-' . $request->candidate_id;
        } else {
            $company_name = 'No company selected';
            $selectCandidate = $request->candidate_id;
        }



        $currentMonth = Carbon::parse($selectedDate);
        $candidateTimesheet = candidate::find($request->candidate_id);

        $month = $currentMonth->format('F');

        $year = $currentMonth->format('Y');

        $daysInMonth = $currentMonth->daysInMonth;


        $work_data = CandidateWorkingHour::where('candidate_id', $request->candidate_id)->firstOrFail();

        $leaves = Leave::where('candidate_id', $request->candidate_id)->get();
        $leaveTypes = LeaveType::where('leavetype_status', 1)->get();



        $timesheet_id  = $work_data->timesheet_id;



        $timeSheetData  = TimeSheetEntry::where('time_sheet_id', $timesheet_id)->get();

        $candidate_id = $request->candidate_id;
        // $data = [
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

        return view('admin.attendence.create', compact(
            'candidate_id',
            'daysInMonth',
            'daysInMonth',
            'currentMonth',
            'candidates',
            'selectedDate',
            'selectCandidate',
            'timeSheetData',
            'company_outlet_id',
            'company_name',
            'leaves',
            'leaveTypes'
        ));
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
