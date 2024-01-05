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
        $datas = TimeSheet::latest()->get();
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'print' => 'nullable',
            'remark' => 'nullable',
        ]);

        $timeSheet = TimeSheet::create($validatedData);

        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        foreach ($days as $day) {
            $entryData = [
                'day' => $day,
                'in_time' => $request->input(strtolower($day) . '_in'),
                'out_time' => $request->input(strtolower($day) . '_out'),
                'lunch_time' => $request->input(strtolower($day) . '_lunch'),
                'isWork' => $request->input(strtolower($day) . '_isWork'),
                'ot_rate' => $request->input(strtolower($day) . '_ot_rate'),
                'minimum' => $request->input(strtolower($day) . '_minimum'),
                'allowance' => $request->input(strtolower($day) . '_allowance'),
            ];

            $timeSheet->entries()->create($entryData);
        }

        return redirect()->route('time-sheet.index')->with('success', 'Time Sheet created successfully!');
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
    public function update(Request $request, TimeSheet $time_sheet)
    { // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'print' => 'nullable',
            'remark' => 'nullable',
            // Add other validation rules for time sheet fields
        ]);

        // Update the time sheet
        $time_sheet->update($validatedData);

        // Get days
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        // Loop through each day to update time sheet entries
        foreach ($days as $day) {
            $entryData = [
                'in_time' => $request->input(strtolower($day) . '_in'),
                'out_time' => $request->input(strtolower($day) . '_out'),
                'lunch_time' => $request->input(strtolower($day) . '_lunch'),
                'isWork' => $request->has(strtolower($day) . '_isWork') ? true : false,
                'ot_rate' => $request->input(strtolower($day) . '_ot_rate'),
                'minimum' => $request->input(strtolower($day) . '_minimum'),
                'allowance' => $request->input(strtolower($day) . '_allowance'),
                // Add other fields as needed
            ];

            // Update the time sheet entry
            $time_sheet->entries()
                ->where('day', $day)
                ->update($entryData);
        }

        // Redirect or return a response
        return redirect()->route('time-sheet.index')->with('success', 'Time Sheet updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeSheet $time_sheet)
    {
        try {
            $time_sheet->entries()->delete();

            $time_sheet->delete();

            return redirect()->route('time-sheet.index')->with('success', 'Timesheet deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('time-sheet.index')->with('error', 'Error deleting timesheet: ' . $e->getMessage());
        }
    }
}
