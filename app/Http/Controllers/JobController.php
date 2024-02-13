<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\client;
use App\Models\ClientFollowUp;
use App\Models\Employee;
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

        $auth = Auth::user()->employe;
        $datas = job::query();
        if($auth->roles_id == 11)
        {
            $datas->where('team_leader_id', $auth->id);
        }else{
            if(!empty($auth->team_leader_users_id)){
            $datas->where('team_leader_id', $auth->team_leader_users_id);
            }
        }
        $datas = $datas->latest()->where('job_status',1)->get();
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


        $auth = Auth::user()->employe;
        $clients = client::query();
        $clients = $clients->latest()->where('clients_status',1)->get();

        $users = User::latest()->select('id', 'name')->get();
        $employees = Employee::select('id', 'employee_name')->where('roles_id', 11)->get();
        $jobType = jobtype::latest()->select('id', 'jobtype_code')->get();
        $jobCategory = jobcategory::latest()->select('id', 'jobcategory_name')->get();

        return view('admin.job.create', compact('users', 'jobType', 'clients', 'jobCategory', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('job.store')) {
            abort(403, 'Unauthorized');
        }

        $team = get_team($request['person_incharge']);
        $request['manager_id'] = $team['manager_id'];
        $request['team_leader_id'] = $team['team_leader_id'];
        $request['consultant_id'] = $team['consultant_id'];

        job::create($request->except('_token') + [
            'job_link' => Str::slug($request->job_title),
        ]);

        $auth = Auth::user()->employe;
        ClientFollowUp::create([
            'clients_id' => $request->client_id,
            'description' => 'New Job Opening',
            'created_by' => $auth->id,
            'modify_by' => $auth->id,
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
        //return $request->co_owner_id = manager();
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

    public function getClientLeader(client $client)
    {
        $manager_id = $client->manager_id;
        $team_leader_id = $client->team_leader_id;
        $consultant_id = $client->consultant_id;
        $employeeIds = [$manager_id, $team_leader_id, $consultant_id];

        $team_leader = Employee::whereIn('id', $employeeIds)->get();
        return response()->json(['team_leader' => $team_leader]);
    }
}
