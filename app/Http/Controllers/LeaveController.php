<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\LeaveRequest;
use App\Models\candidate;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class LeaveController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('leave.index')) {
            abort(403, 'Unauthorized');
        }
        $datas = Leave::latest()->get();
        return view('admin.leave.index', compact('datas'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('leave.create')) {
            abort(403, 'Unauthorized');
        }
        $employees = Employee::latest()->select('id', 'employee_name')->get();
        $leaveType = LeaveType::latest()->select('id', 'leavetype_code')->get();
        $roles = Role::latest()->get();
        return view('admin.leave.create', compact('employees', 'leaveType', 'roles'));
    }

    public function store(LeaveRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('leave.store')) {
            abort(403, 'Unauthorized');
        }

        DB::beginTransaction();

        try {
            $request['candidate_id'] = $request->input('leave_empl_type') == 0 ? $request->input('employees_id') : null;
            $request['employees_id'] = $request->input('leave_empl_type') == 1 ? $request->input('employees_id') : null;
            $leave = Leave::create($request->except('_token', 'leave_file_path'));
            $file_path = $request->file('leave_file_path');

            if ($file_path) {
                $leave_url = $request->input('leave_empl_type') == 0 ? 'leave/candidate/'. $leave->id :
                ($request->input('leave_empl_type') == 1 ? 'leave/employe/'. $leave->id : null);

                $uploadedFilePath = FileHelper::uploadFile($file_path, $leave_url);
                $leave->update(['leave_file_path' => $uploadedFilePath]);
            }
            DB::commit();
            return redirect()->route('leave.index')->with('success', 'Created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        if (is_null($this->user) || !$this->user->can('leave.edit')) {
            abort(403, 'Unauthorized');
        }
        $employees = Employee::latest()->select('id', 'employee_name')->get();
        $leaveType = LeaveType::latest()->select('id', 'leavetype_code')->get();
        $roles = Role::latest()->get();
        return view('admin.leave.edit', compact('leave', 'employees', 'leaveType', 'roles'));
    }

    public function update(LeaveRequest $request, Leave $leave)
    {
        if (is_null($this->user) || !$this->user->can('leave.update')) {
            abort(403, 'Unauthorized');
        }

        $request['candidate_id'] = $request->input('leave_empl_type') == 0 ? $request->input('employees_id') : $leave->candidate_id;
        $request['employees_id'] = $request->input('leave_empl_type') == 1 ? $request->input('employees_id') : $leave->employees_id;

        DB::beginTransaction();
        try {
            $leave->update($request->except('_token'));
            if ($request->hasFile('leave_file_path')) {
                Storage::delete('public/'. $leave->leave_file_path);
                $leave_url = $request->input('leave_empl_type') == 0 ? 'leave/candidate/' . $leave->id : ($request->input('leave_empl_type') == 1 ? 'leave/employe/' . $leave->id : null);

                $leave_file_path = FileHelper::uploadFile($request->file('leave_file_path'), $leave_url);
                $leave->update(['leave_file_path' => $leave_file_path]);
            }

            DB::commit();
            return redirect()->route('leave.index')->with('success', 'Successfully updated.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Leave $leave)
    {
        if (is_null($this->user) || !$this->user->can('leave.destroy')) {
            abort(403, 'Unauthorized');
        }
        $filePath = storage_path("app/public/{$leave->leave_file_path}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$leave->leave_file_path}");
        }
        $leave->delete();
        return back()->with('success', 'Deleted Successfully.');
    }


    public function getEmployees($type)
    {
        $employees = Employee::where('employee_status', 1)->select('id', 'employee_name')->get();
        return response()->json(['employees' => $employees]);
    }
    public function getCandidates($type)
    {
        $candidates = candidate::where('candidate_status', 1)->select('id', 'candidate_name')->get();
        return response()->json(['candidates' => $candidates]);
    }

    public function searchLeave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'daterange' => 'required',
            'ar_number' => 'nullable|numeric',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 400);
        }
        $validated = $validator->validated();

        $dateRange = $validated['daterange'];

        [$startDate, $endDate] = explode(' - ', $dateRange);

        $query = Leave::query();

        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('leave_datefrom', [$startDate, $endDate]);
        }


        if ($request->ar_number != null) {
            $query->where('ar_number', $request->input('ar_number'));
        }

        $datas = $query->get();
        return view('admin.leave.index', compact('datas'));
    }

    public function cancle(Leave $leave)
    {
        $done = $leave->update(['leave_status' => 4]);
        if(!$done) return redirect()->back()->with('error', 'Not Cancled!! Try Again.');
        return redirect()->back()->with('success', 'Cancle Successfully.');
    }
}
