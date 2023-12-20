<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\CandidateRequest;
use App\Models\candidate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Department;
use App\Models\paymode;
use App\Models\race;
use App\Models\maritalStatus;
use App\Models\passtype;
use App\Models\religion;
use App\Models\outlet;
use App\Models\uploadfiletype;
use App\Models\ClientUploadFile;
use App\Models\CandidateResume;
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
        $outlet_data=outlet::orderBy('id')->get();
        return view('admin.candidate.create',compact('outlet_data','religion_data','passtype_data','marital_data','race_data','department_data','designation_data','paymode_data',));
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
        $fileTypes = uploadfiletype::where('uploadfiletype_status', 1)->where('uploadfiletype_for',1)->latest()->get();
        $department_data=Department::orderBy('department_seqno')->where('department_status','1')->get();
        $designation_data=Designation::orderBy('designation_seqno')->where('designation_status','1')->get();
        $paymode_data=paymode::orderBy('paymode_seqno')->where('paymode_status','1')->get();
        $race_data=Race::orderBy('race_seqno')->where('race_status','1')->get();
        $marital_data=maritalStatus::orderBy('marital_statuses_seqno')->where('marital_statuses_status','1')->get();
        $passtype_data=passtype::orderBy('passtype_seqno')->where('passtype_status','1')->get();
        $religion_data=religion::orderBy('religion_seqno')->where('religion_status','1')->get();
        $outlet_data=outlet::orderBy('id')->get();

        $client_files = ClientUploadFile::where('client_id', $candidate->id)->where('file_type_for',1)->get();
        return view('admin.candidate.edit',compact('fileTypes','client_files','candidate','outlet_data','religion_data','passtype_data','marital_data','race_data','department_data','designation_data','paymode_data',));
    
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

    public function fileUpload(Request $request, $id)
    {

        $request->validate([
            'file_path' => 'required|mimes:pdf|max:2048',
            'file_type_id' => 'required',
        ]);

        $file_path = $request->file('file_path');

        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path);

            ClientUploadFile::create([
                'client_id' => $id,
                'file_path' => $uploadedFilePath,
                'file_type_id' => $request->file_type_id,
                'file_type_for' => $request->file_type_for
            ]);

            return back()->with('success', 'Created successfully.');
        } else {
            return back()->with('error', 'Please select a file.');
        }
    }
    public function fileDelete($id)
    {
        $file_path_name = ClientUploadFile::where('id', $id)->value('file_path');

        $filePath = storage_path("app/public/{$file_path_name}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$file_path_name}");
        }
        ClientUploadFile::where('id', $id)->delete();
        return back()->with('success', 'Successfully Deleted.');
    }

    
    public function resumeUpload(Request $request, $id)
    {

        $request->validate([
            'file_path' => 'required|mimes:pdf|max:2048',
            'file_type_id' => 'required',
        ]);

        $file_path = $request->file('file_path');

        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path);

            ClientUploadFile::create([
                'client_id' => $id,
                'file_path' => $uploadedFilePath,
                'file_type_id' => $request->file_type_id,
                'file_type_for' => $request->file_type_for
            ]);

            return back()->with('success', 'Created successfully.');
        } else {
            return back()->with('error', 'Please select a file.');
        }
    }
    public function resumeDelete($id)
    {
        $file_path_name = ClientUploadFile::where('id', $id)->value('file_path');

        $filePath = storage_path("app/public/{$file_path_name}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$file_path_name}");
        }
        ClientUploadFile::where('id', $id)->delete();
        return back()->with('success', 'Successfully Deleted.');
    }
}
