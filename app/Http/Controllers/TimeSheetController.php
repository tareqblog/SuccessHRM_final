<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeSheeRequest;
use App\Http\Requests\TimeSheetRequest;
use App\Models\TimeSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = TimeSheet::where('user_id', Auth::user()->id)->latest()->get();
        return view('admin.timesheet.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.timesheet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TimeSheetRequest $request)
    {
        TimeSheet::create($request->except('_token'));
        return redirect()->route('time-sheet.index')->with('success', 'Created successfully.');
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
    public function edit(TimeSheet $time_sheet)
    {
        return view('admin.timesheet.edit', compact('time_sheet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TimeSheetRequest $request, TimeSheet $time_sheet)
    {
        $time_sheet->update($request->except('_token'));
        return back()->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeSheet $time_sheet)
    {
        $time_sheet->delete();
        return back()->with('success', 'Deleted successfully.');
    }
}
