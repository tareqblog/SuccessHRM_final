<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\TncTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TncController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = TncTemplate::latest()->get();
        return view('admin.tnc.index', compact('datas'));
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
        $request->validate([
            'tnc_template_code' => 'required|unique:tnc_templates',
            'tnc_template_desc' => 'required',
            'tnc_template_file_path' => 'nullable|mimes:pdf|max:2048',
            'tnc_template_seqno' => 'nullable|integer',
        ]);

        $file_path = $request->file('tnc_template_file_path');

        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path);

            TncTemplate::create($request->except('_token', 'tnc_template_file_path') + [
                'tnc_template_file_path' => $uploadedFilePath,
            ]);

            return back()->with('success', 'Created successfully.');
        } else {
            // Handle the case where no file is provided
            return back()->with('error', 'No file provided.');
        }
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
    public function edit(TncTemplate $tnc)
    {
        return view('admin.tnc.edit', compact('tnc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TncTemplate $tnc)
    {

        $request->validate([
            'tnc_template_code' => "required|unique:tnc_templates,tnc_template_code,{$tnc->id}",
            'tnc_template_desc' => 'required',
            'tnc_template_file_path' => 'nullable|mimes:pdf|max:2048',
            'tnc_template_seqno' => 'nullable|integer',
        ]);

        if ($request->hasFile('tnc_template_file_path')) {
            // Delete the old file
            Storage::delete("public/{$tnc->tnc_template_file_path}");

            // Upload the new file
            $uploadedFilePath = FileHelper::uploadFile($request->file('tnc_template_file_path'));

            // Update the database record
            $tnc->update([
                'tnc_template_file_path' => $uploadedFilePath,
                'tnc_template_code' => $request->input('tnc_template_code'),
                'tnc_template_desc' => $request->input('tnc_template_desc'),
                'tnc_template_seqno' => $request->input('tnc_template_seqno'),
                // Add other columns as needed
            ]);
        } else {
            $tnc->update($request->except('_token', 'tnc_template_file_path'));
        }
        return back()->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TncTemplate $tnc)
    {
        $filePath = storage_path("app/public/{$tnc->tnc_template_file_path}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$tnc->tnc_template_file_path}");
        }
        $tnc->delete();
        return back()->with('success', 'Successfully Deleted.');
    }
}
