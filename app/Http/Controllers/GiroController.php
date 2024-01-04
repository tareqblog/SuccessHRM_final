<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Giro;
use Illuminate\Http\Request;

class GiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Giro::latest()->get();
        $banks = Bank::latest()->get();
        return view('admin.giro.index', compact('datas', 'banks'));
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
            'giro_no' => 'required|integer',
            'bank_id' => 'required|integer',
            'description' => 'string|nullable',
        ]);
        Giro::create($request->except('_token'));
        return back()->with('success', 'Created successfully.');
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
    public function edit(Giro $giro)
    {
        $banks = Bank::latest()->get();
        return view('admin.giro.edit', compact('giro', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Giro $giro)
    {
        $request->validate([
            'giro_no' => 'required|integer',
            'bank_id' => 'required|integer',
            'description' => 'string|nullable',
        ]);
        $giro->update($request->except('_token'));
        return back()->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Giro $giro)
    {
        $giro->delete();
        return back()->with('success', 'Deleted successfully.');
    }
}
