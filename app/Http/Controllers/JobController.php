<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\client;
use App\Models\job;
use App\Models\jobcategory;
use App\Models\jobtype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobController extends Controller
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
        if (is_null($this->user) || !$this->user->can('job.index')) {
            abort(403, 'Unauthorized');
        }
        $datas = job::latest()->get();
        return view('admin.job.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('job.create')) {
            abort(403, 'Unauthorized');
        }
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
        if (is_null($this->user) || !$this->user->can('job.store')) {
            abort(403, 'Unauthorized');
        }
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
        if (is_null($this->user) || !$this->user->can('job.edit')) {
            abort(403, 'Unauthorized');
        }
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
        if (is_null($this->user) || !$this->user->can('job.update')) {
            abort(403, 'Unauthorized');
        }
        $job->update($request->except('_token'));
        return redirect()->route('job.index')->with('success', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(job $job)
    {
        if (is_null($this->user) || !$this->user->can('job.destroy')) {
            abort(403, 'Unauthorized');
        }
        $job->delete();
        return back()->with('success', 'Delete successfully.');
    }
}
