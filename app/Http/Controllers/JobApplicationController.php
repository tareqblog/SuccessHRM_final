<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\candidate;
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
        $datas = JobApplication::latest()->get();
        return view('admin.jobApplication.index', compact('datas'));
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
        $job = JobApplication::find($id);
        $candidate = candidate::create([
            'candidate_name' => $job->name,
            'candidate_email' => $job->email,
            'candidate_mobile' => $job->phone_no,
        ]);
        $auth = Auth::user()->employe;
        if($auth->roles_id == 11)
        {
            $candidate->update(['team_leader_id' => $auth->id]);
        }else{
            if(!empty($auth->team_leader_users_id)){
            $candidate->update(['team_leader_id' => $auth->team_leader_users_id]);
            $candidate->update(['consultant_id' => $auth->id]);
            }
        }
        $candidate->update(['candidate_code' => 'Cand-' . $candidate->id]);

        $job->update([
            'candidate_id' => $candidate->id
        ]);
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
