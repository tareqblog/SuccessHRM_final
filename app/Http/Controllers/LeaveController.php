<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\LeaveRequest;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('leave.index')) {
        abort(403, 'Unauthorized');
        }
        $datas = Leave::latest()->get();
        return view('admin.leave.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('leave.create')) {
        abort(403, 'Unauthorized');
        }
        $employees = Employee::latest()->select('id', 'employee_code')->get();
        $leaveType = LeaveType::latest()->select('id', 'leavetype_code')->get();
        return view('admin.leave.create', compact('employees', 'leaveType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaveRequest $request)
    {

        if (is_null($this->user) || !$this->user->can('leave.store')) {
            abort(403, 'Unauthorized');
            }

        $file_path = $request->file('leave_file_path');

        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path);

            Leave::create($request->except('_token', 'leave_file_path') + [
                'leave_file_path' => $uploadedFilePath,
            ]);

            return redirect()->route('leave.index')->with('success', 'Created successfully.');
        } else {

            Leave::create($request->except('_token', 'leave_file_path'));
            return redirect()->route('leave.index')->with('success', 'Created successfully.');
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
        $employees = Employee::latest()->select('id', 'employee_code')->get();
        $leaveType = LeaveType::latest()->select('id', 'leavetype_code')->get();
        return view('admin.leave.edit', compact('leave', 'employees', 'leaveType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeaveRequest $request, Leave $leave)
    {
        if (is_null($this->user) || !$this->user->can('leave.update')) {
        abort(403, 'Unauthorized');
        }
        if ($request->hasFile('leave_file_path')) {
            Storage::delete("public/{$leave->leave_file_path}");

            $uploadedFilePath = FileHelper::uploadFile($request->file('leave_file_path'));

            $leave->update([
                'leave_file_path' => $uploadedFilePath,
                'leave_approveds_id' => $request->input('leave_approveds_id'),
                'employees_id' => $request->input('employees_id'),
                'leave_types_id' => $request->input('leave_types_id'),
                'leave_duration' => $request->input('leave_duration'),
                'leave_datefrom' => $request->input('leave_datefrom'),
                'leave_dateto' => $request->input('leave_dateto'),
                'leave_total_day' => $request->input('leave_total_day'),
                'leave_reason' => $request->input('leave_reason'),
                'leave_status' => $request->input('leave_status'),
                'leave_empl_type' => $request->input('leave_empl_type'),
            ]);
        } else {
            $leave->update($request->except('_token', 'leave_file_path'));
        }
        return redirect()->route('leave.index')->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        if (is_null($this->user) || !$this->user->can('leave.destory')) {
        abort(403, 'Unauthorized');
        }
        $filePath = storage_path("app/public/{$leave->leave_file_path}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$leave->leave_file_path}");
        }
        $leave->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
