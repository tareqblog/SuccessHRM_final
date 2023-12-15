<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Leave::latest()->get();
        return view('admin.leave.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::latest()->select('id', 'employee_code')->get();
        $leaveType = LeaveType::latest()->select('id', 'leavetype_code')->get();
        return view('admin.leave.create', compact('employees', 'leaveType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     ''
        // ]);
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
        return view('admin.leave.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
