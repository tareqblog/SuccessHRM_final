<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\candidate;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = JobApplication::latest()->get();
        return view('admin.jobApplication.index', compact('datas'));
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
        $job = JobApplication::find($id);
        $candidate = candidate::create([
            'candidate_name' => $job->name,
            'candidate_email' => $job->email,
            'candidate_mobile' => $job->phone_no,
        ]);
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
