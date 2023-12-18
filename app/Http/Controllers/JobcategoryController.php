<?php

namespace App\Http\Controllers;

use App\Models\jobcategory;
use App\Http\Requests\StorejobcategoryRequest;
use App\Http\Requests\UpdatejobcategoryRequest;
use App\Models\jobtype;

class JobcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = jobcategory::latest()->get();
        $jobType = jobcategory::whereNull('jobcategory_parent')->get();
        return view('admin.jobCategory.index', compact('datas','jobType'));
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
    public function store(StorejobcategoryRequest $request)
    {
        jobcategory::create($request->except('_token'));
        return back()->with('success', 'Create successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(jobcategory $jobcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jobcategory $job_category)
    {
        $jobType = jobcategory::whereNull('jobcategory_parent')->get();
        return view('admin.jobCategory.edit', compact('job_category', 'jobType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejobcategoryRequest $request, jobcategory $job_category)
    {
        $job_category->update($request->except('_token'));
        return back()->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jobcategory $job_category)
    {
        $job_category->delete();
        return back()->with('success', 'Delete Successfully.');
    }
}
