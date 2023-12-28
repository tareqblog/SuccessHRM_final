<?php

namespace App\Http\Controllers;

use App\Models\passtype;
use Illuminate\Http\Request;

class PassTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas =  passtype::latest()->get();
        return view('admin.passType.index', compact('datas'));
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
            'passtype_code' => 'required|unique:passtypes',
            'passtype_desc' => 'required',
            'passtype_seqno' => 'nullable|integer',
        ]);

        passtype::create($request->except('_token'));
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
        $data = passtype::find($id);
        return view('admin.passType.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, passtype $pass_type)
    {
        $request->validate([
            'passtype_code' => "required|unique:passtypes,passtype_code,{$pass_type->id}",
            'passtype_desc' => 'required',
            'passtype_seqno' => 'nullable|integer',
        ]);

        $pass_type->update($request->except('_token'));
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(passtype $pass_type)
    {
        $pass_type->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
