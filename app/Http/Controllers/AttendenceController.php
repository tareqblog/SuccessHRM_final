<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('attendence.index')) {
            abort(403, 'Unauthorized');
        }
        return view('admin.attendence.index');
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
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('attendence.store')) {
            abort(403, 'Unauthorized');
        }
        //
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
        if (is_null($this->user) || !$this->user->can('attendence.edit')) {
            abort(403, 'Unauthorized');
        }
        return view('admin.attendence.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (is_null($this->user) || !$this->user->can('attendence.update')) {
            abort(403, 'Unauthorized');
        }
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
        // dd($request->company_id);

        $companies = Company::latest()->get();

        $candidates = candidate::latest()->get();

        $selectedDate = $request->date;

        $company_outlet_id = $request->company_id;

        $company_name = Company::find($request->company_id)->name;

        $selectCandidate = $request->company_id . '-' . $request->candidate_id;

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
}
