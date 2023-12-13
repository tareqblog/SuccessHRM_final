<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Religion::latest()->get();
        return view('admin.religion.index', compact('datas'));
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
            'religion_code' => 'required|unique:religions',
            'religion_desc' => 'required',
            'religion_seqno' =>  'nullable|integer'
        ]);

        Religion::create($request->except('_token'));
        return back()->with('success', 'Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Religion $religion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Religion $religion)
    {
        return view('admin.religion.edit', compact('religion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Religion $religion)
    {
        $request->validate([
            'religion_code' => "required|unique:religions,religion_code,{$religion->id}",
            'religion_desc' => 'required',
            'religion_seqno' =>  'nullable|integer'
        ]);

        $religion->update($request->except('_token'));
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Religion $religion)
    {
        $religion->delete();

        return back()->with('success', 'Deleted Successfully.');

    }
}
