<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\CandidateRequest;
use App\Models\candidate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = candidate::latest()
            ->select('id', 'candidate_name', 'candidate_email', 'candidate_mobile', 'updated_at', 'candidate_nric')
            ->get();
        return view('admin.candidate.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.candidate.create');
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
