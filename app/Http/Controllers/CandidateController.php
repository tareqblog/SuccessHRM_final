<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\CandidateRequest;
use App\Models\candidate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Designation;
use App\Models\Department;
use App\Models\paymode;
use App\Models\race;
use App\Models\maritalStatus;
use App\Models\passtype;
use App\Models\religion;
class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = candidate::latest()->with('Race')->where('candidate_status','=',1)->where('candidate_isDeleted','=',0)->get();
        return view('admin.candidate.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department_data=Department::orderBy('department_seqno')->where('department_status','1')->get();
        $designation_data=Designation::orderBy('designation_seqno')->where('designation_status','1')->get();
        $paymode_data=paymode::orderBy('paymode_seqno')->where('paymode_status','1')->get();
        $race_data=Race::orderBy('race_seqno')->where('race_status','1')->get();
        $marital_data=maritalStatus::orderBy('marital_statuses_seqno')->where('marital_statuses_status','1')->get();
        $passtype_data=passtype::orderBy('passtype_seqno')->where('passtype_status','1')->get();
        $religion_data=religion::orderBy('religion_seqno')->where('religion_status','1')->get();
        return view('admin.candidate.create',compact('religion_data','passtype_data','marital_data','race_data','department_data','designation_data','paymode_data',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidateRequest $request)
    {

        $file_path = $request->file('avatar');

        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path);

            candidate::create($request->except('_token', 'avatar') + [
                'avatar' => $uploadedFilePath,
            ]);

            return redirect()->route('candidate.index')->with('success', 'Created successfully.');
        } else {

            candidate::create($request->except('_token', 'avatar'));
            return redirect()->route('candidate.index')->with('success', 'Created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(candidate $candidate)
    {
        return view('admin.candidate.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, candidate $candidate)
    {
        if ($request->hasFile('avatar')) {
            // Delete the old file
            Storage::delete("public/{$candidate->avatar}");

            // Upload the new file
            $uploadedFilePath = FileHelper::uploadFile($request->file('avatar'));

            // Update the database record
            $candidate->update($request->except('_token', 'avatar')+[
                'avatar' => $uploadedFilePath,
            ]);
        } else {
            $candidate->update($request->except('_token', 'avatar'));
        }
        return redirect()->route('candidate.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(candidate $candidate)
    {


        $filePath = storage_path("app/public/{$candidate->avatar}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$candidate->avatar}");
        }
        $candidate->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
