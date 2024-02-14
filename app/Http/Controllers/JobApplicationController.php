<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\Assign;
use App\Models\candidate;
use App\Models\CandidateRemark;
use App\Models\ClientFollowUp;
use App\Models\Dashboard;
use App\Models\job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
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
        if (is_null($this->user) || !$this->user->can('job-application.index')) {
            abort(403, 'Unauthorized');
        }

        $jobs = job::latest();
        $auth = Auth::user()->employe;
        if ($auth->roles_id == 7) {
            $jobs->where('payroll_employees_id', $auth->id);
        } elseif ($auth->roles_id == 8) {
            $jobs->where('consultant_id', $auth->id);
        } elseif ($auth->roles_id == 11) {
            $jobs->where('team_leader_id', $auth->id);
        } elseif ($auth->roles_id == 4) {
            $jobs->where('manager_id', $auth->id);
        }
        $jobs = $jobs->get()->pluck('id');
        $applications = JobApplication::whereIn('job_ids', $jobs)->get();
        return view('admin.jobApplication.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jobApplication.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (is_null($this->user) || !$this->user->can('job-application.update')) {
            abort(403, 'Unauthorized');
        }
        $jobapplication = JobApplication::find($id);

        $candidate = candidate::create([
            'candidate_name' => $jobapplication->name,
            'candidate_email' => $jobapplication->email,
            'candidate_mobile' => $jobapplication->phone_no,
            'manager_id' => $jobapplication->job->manager_id,
            'team_leader_id' => $jobapplication->job->team_leader_id,
            'consultant_id' => $jobapplication->job->consultant_id,
        ]);
        $candidate->update(['candidate_code' => 'Cand-' . $candidate->id]);

        $jobapplication->update([
            'candidate_id' => $candidate->id
        ]);

        $datas = [
            'candidate_id' => $candidate->id,
            'manager_id' => $candidate->manager_id,
            'teamleader_id' => $candidate->team_leader_id,
            'consultent_id' => $candidate->consultant_id,
            'insert_by' => Auth::user()->id,
        ];

        CandidateRemark::create([
            'candidate_id' => $candidate->id,
            'remarkstype_id' => 1,
            'isNotice' => 0,
            'remarks' => 'Candidate generated from Job Applicant',
        ]);

        Dashboard::create($datas);
        Assign::create($datas);

        return back()->with('success', 'Candidate genarate successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
