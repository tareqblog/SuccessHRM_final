<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\TncTemplate;
use Illuminate\Http\Request;

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
            'tnc_template_seqno' => 'nullable',
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
            'tnc_template_code' => 'required|unique:tnc_templates',
            'tnc_template_desc' => 'required',
            'tnc_template_isDefault' => 'required',
            'tnc_template_file_path' => 'nullable',
            'tnc_template_seqno' => 'nullable',
            'tnc_template_status' => 'required',
        ]);
        $tnc->update($request->except('_token'));

        return back()->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TncTemplate $tnc)
    {

        // $path = asset('stronage');

        // if (file_exists($path)) {
        //     // Delete the file from storage
        //     Storage::delete('public/uploads/' . $filename);

        //     // You may want to perform additional actions here (e.g., update database records)

        //     return redirect()->back()->with('success', 'File deleted successfully.');
        // }
        $tnc->delete();
        return back()->with('success', 'Successfully Deleted.');
    }
}
