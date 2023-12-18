<?php

namespace App\Http\Controllers;

use App\Models\maritalStatus;
use Illuminate\Http\Request;

class MaritalStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = maritalStatus::orderBy('marital_statuses_seqno')->get();
        return view('admin.maritalStatus.index', compact('datas'));
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
            'marital_statuses_code' => 'required|unique:marital_statuses',
            'marital_statuses_desc' => 'required',
            'marital_statuses_seqno' => 'nullable|integer',
        ]);

        maritalStatus::create($request->except('_token'));
        return back()->with('success', 'Successfully Added.');
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
    public function edit(maritalStatus $marital_status)
    {
        return view('admin.maritalStatus.edit', compact('marital_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, maritalStatus $marital_status)
    {

        $request->validate([
            'marital_statuses_code' => "required|unique:marital_statuses,marital_statuses_code,{$marital_status->id}",
            'marital_statuses_desc' => 'required',
            'marital_statuses_seqno' => 'nullable|integer',
        ]);

        $marital_status->update($request->except('_token'));
        return back()->with('success', 'Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(maritalStatus $marital_status)
    {
        $marital_status->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
