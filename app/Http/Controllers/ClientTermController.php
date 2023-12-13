<?php

namespace App\Http\Controllers;

use App\Models\clientTerm;
use Illuminate\Http\Request;

class ClientTermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = clientTerm::latest()->get();

        return view('admin.clientTerm.index', compact('datas'));
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
            'client_term_code' => 'required|unique:client_terms',
            'client_term_desc' => 'required',
            'client_term_seqno' => 'nullable|integer',
        ]);

        clientTerm::create($request->except('_token'));
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
    public function edit(clientTerm $client_term)
    {
        return view('admin.clientTerm.edit', compact('client_term'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, clientTerm $client_term)
    {
        $request->validate([
            'client_term_code' => "required|unique:client_terms,client_term_code,{$client_term->id}",
            'client_term_desc' => 'required',
            'client_term_seqno' => 'nullable|integer',
        ]);

        $client_term->update($request->except('_token'));
        return back()->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(clientTerm $client_term)
    {
        $client_term->delete();

        return back()->with('success', 'Successfully Deleted.');
    }
}
