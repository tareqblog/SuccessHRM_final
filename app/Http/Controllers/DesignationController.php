<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Designation::latest()->get();
        return view('admin.designation.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.designation.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'designation_code' => 'required|unique:designations',
            'designation_desc' => 'required',
            'designation_seqno' => 'nullable',
        ]);

        designation::create($request->except('_token'));

        return redirect()->route('designation.index')->with('success', 'Added Successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        return view('admin.designation.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'designation_code' => "required|unique:designations,designation_code,". "$designation->id'",
            'designation_desc' => 'required',
            'designation_seqno' => 'nullable',
            'designation_status' => 'required',
        ]);

        $designation->update($request->except('_token'));
        return redirect()->route('designation.index')->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        return back()->with('success', 'Delete successfully.');
    }
}
