<?php

namespace App\Http\Controllers;

use App\Models\IndustryType;
use Illuminate\Http\Request;

class IndustryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = IndustryType::orderBy('industry_seqno')->get();
        return view('admin.industryType.index', compact('datas'));
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
            'industry_code' => "required|unique:industry_types",
            'industry_desc' => 'required',
            'industry_seqno' =>  'nullable|integer'
        ]);

        IndustryType::create($request->except('_token'));
        return back()->with('success', 'Successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(IndustryType $industryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IndustryType $industry_type)
    {
        return view('admin.industryType.edit', compact('industry_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IndustryType $industry_type)
    {
        $request->validate([
            'industry_code' => "required|unique:industry_types,industry_code,{$industry_type->id}",
            'industry_desc' => 'required',
            'industry_seqno' =>  'nullable|integer'
        ]);

        $industry_type->update($request->except('_token'));
        return back()->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IndustryType $industry_type)
    {
        $industry_type->delete();
        return back()->with('success', 'Successfully deleted.');
    }
}
