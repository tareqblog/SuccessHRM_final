<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Nationality;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Company::latest()->get();
        return view('admin.companyProfile.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationalities = Nationality::latest()->get();
        return view('admin.companyProfile.create', compact('nationalities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'tel' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable',
            'nationality_id' => 'required|integer',
            'website' => 'nullable',
            'gst_no' => 'nullable',
            'gst_percent' => 'nullable',
            'address' => 'nullable',
            'remark' => 'nullable',
            'remark_time' => 'nullable|integer',
        ]);
        Company::create($request->except('_token'));
        return redirect()->route('company.index')->with('success', 'Created successfully.');
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
    public function edit(Company $company)
    {
        $nationalities = Nationality::latest()->get();
        return view('admin.companyProfile.edit', compact('company', 'nationalities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string',
            'tel' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable',
            'nationality_id' => 'required|integer',
            'website' => 'nullable',
            'gst_no' => 'nullable',
            'gst_percent' => 'nullable',
            'address' => 'nullable',
            'remark' => 'nullable',
            'remark_time' => 'nullable|integer',
        ]);
        $company->update($request->except('_token'));
        return redirect()->route('company.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return back()->with('success', 'Deleted successfully.');
    }
}
