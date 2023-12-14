<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\client;
use App\Models\clientTerm;
use App\Models\Employee;
use App\Models\IndustryType;
use App\Models\TncTemplate;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = client::latest()->with('industry_type')->get();
        return view('admin.client.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $industries = IndustryType::latest()->get();
        $employees = Employee::latest()->select('id', 'employee_code')->get();
        $users = User::latest()->select('id', 'name')->get();
        $tncs = TncTemplate::latest()->select('id', 'tnc_template_code')->get();
        $client_terms = clientTerm::latest()->select('id', 'client_term_code')->get();
        return view('admin.client.create', compact('industries', 'employees', 'users', 'tncs', 'client_terms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        client::create($request->except('_token'));
        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        $industries = IndustryType::latest()->get();
        $employees = Employee::latest()->select('id', 'employee_code')->get();
        $users = User::latest()->select('id', 'name')->get();
        $tncs = TncTemplate::latest()->select('id', 'tnc_template_code')->get();
        $client_terms = clientTerm::latest()->select('id', 'client_term_code')->get();
        return view('admin.client.edit', compact('client', 'industries', 'employees', 'users', 'tncs', 'client_terms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, client $client)
    {
        $client->update($request->except('_token'));
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
