<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = LeaveType::latest()->get();
        return view('admin.leaveType.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leaveType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'leavetype_code' => 'required|unique:leave_types',
            'leavetype_block' => 'nullable',
            'leavetype_desc' => 'nullable',
            'leavetype_default' => 'nullable',
            'leavetype_bringover' => 'nullable',
            'leavetype_custom_field' => 'nullable',
            'industry_seqno' => 'nullable',
            'industry_status' => 'required',
        ]);

        LeaveType::create($request->except('_token'));
        return redirect()->route('leave-type.index')->with('success', 'Successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaveType $leaveType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveType $leave_type)
    {
        return view('admin.leaveType.edit', compact('leave_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeaveType $leave_type)
    {
        $request->validate([
            'leavetype_code' => 'required|unique:leave_types',
            'leavetype_block' => 'nullable',
            'leavetype_desc' => 'nullable',
            'leavetype_default' => 'nullable',
            'leavetype_bringover' => 'nullable',
            'leavetype_custom_field' => 'nullable',
            'industry_seqno' => 'nullable',
            'industry_status' => 'required',
        ]);

        $leave_type->update($request->except('_token'));
        return redirect()->route('leave-type.index')->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveType $leave_type)
    {
        $leave_type->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
