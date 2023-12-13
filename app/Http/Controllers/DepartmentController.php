<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Department::latest()->get();
        return view('admin.department.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_code' => 'required|unique:departments',
            'department_desc' => 'required',
            'department_seqno' => 'nullable',
        ]);

        Department::create($request->except('_token'));

        return redirect()->route('department.index')->with('success', 'Added Successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('admin.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_code' => "required|unique:departments,department_code,". "$department->id'",
            'department_desc' => 'required',
            'department_seqno' => 'nullable',
            'department_status' => 'required',
        ]);

        $department->update($request->except('_token'));
        return redirect()->route('department.index')->with('success', 'Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return back()->with('success', 'Delete successfully.');
    }
}
