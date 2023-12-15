<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\client;
use App\Models\job;
use App\Models\jobcategory;
use App\Models\jobtype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = job::latest()->get();
        return view('admin.job.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::latest()->select('id', 'name')->get();
        $jobType = jobtype::latest()->select('id', 'jobtype_code')->get();
        $clients = client::latest()->select('id', 'client_code')->get();
        $jobCategory = jobcategory::latest()->select('id', 'jobcategory_name')->get();
        return view('admin.job.create', compact('users', 'jobType', 'clients', 'jobCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        job::create($request->except('_token') + [
            'job_link' => Str::slug($request->job_title),
        ]);
        return redirect()->route('job.index')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(job $job)
    {
        $users = User::latest()->select('id', 'name')->get();
        $jobType = jobtype::latest()->select('id', 'jobtype_code')->get();
        $clients = client::latest()->select('id', 'client_code')->get();
        $jobCategory = jobcategory::latest()->select('id', 'jobcategory_name')->get();
        return view('admin.job.edit',compact('users', 'jobType', 'clients', 'jobCategory', 'job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, job $job)
    {
        $job->update($request->except('_token'));
        return redirect()->route('job.index')->with('success', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(job $job)
    {
        $job->delete();
        return back()->with('success', 'Delete successfully.');
    }
}
