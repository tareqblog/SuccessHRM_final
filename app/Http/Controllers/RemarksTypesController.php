<?php

namespace App\Http\Controllers;

use App\Models\remarkstype;
use Illuminate\Http\Request;

class RemarksTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = remarkstype::latest()->get();
        return view('admin.remarkType.index', compact('datas'));
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
            'remarkstype_code' => 'required|unique:remarkstypes',
            'remarkstype_desc' => 'required',
            'remarkstype_seqno' => 'nullable|integer',
        ]);

        remarkstype::create($request->except('_token'));
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
    public function edit(string $id)
    {
        $data = remarkstype::find($id);
        return view('admin.remarkType.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, remarkstype $remarks_type)
    {
        $request->validate([
            'remarkstype_code' => "required|unique:remarkstypes,remarkstype_code,{$remarks_type->id}",
            'remarkstype_desc' => 'required',
            'remarkstype_seqno' => 'nullable|integer',
        ]);

        $remarks_type->update($request->except('_token'));
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(remarkstype $remarks_type)
    {
        $remarks_type->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
