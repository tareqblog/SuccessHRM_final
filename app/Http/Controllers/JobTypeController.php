<?php

namespace App\Http\Controllers;

use App\Models\jobtype;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = jobtype::latest()->get();
        return view('admin.jobType.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'jobtype_code' => 'required|unique:jobtypes',
            'jobtype_desc' => 'required|string',
            'jobtype_seqno' => 'nullable|integer',
        ]);
        jobtype::create($request->except('_token'));
        return back()->with('success', 'Created successfully.');
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
    public function edit(jobtype $job_type)
    {
        return view('admin.jobType.edit', compact('job_type'));
    }

    /**
     * Update the specified resource in storage.The jobtype code field is required.
     */
    public function update(Request $request, jobtype $job_type)
    {
        $request->validate([
            'jobtype_code' => "required|unique:jobtypes,jobtype_code,{$job_type->id}",
            'jobtype_desc' => 'required|string',
            'jobtype_seqno' => 'integer|nullable',
        ]);
        $job_type->update($request->except('_token'));
        return back()->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jobtype $job_type)
    {
        $job_type->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}