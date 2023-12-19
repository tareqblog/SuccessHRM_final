<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Designation;
use App\Models\Department;
use App\Models\paymode;
use App\DataGrids\EmployeeDataGrid;
use App\Helpers\FileHelper;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use \Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $datas = Employee::with('role_data','Designation')->latest()->get();
    
        return view('admin.employee.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rols=Role::latest()->where('guard_name','web')->get();
        $department=Department::orderBy('department_seqno')->where('department_status','1')->get();
        $designation=Designation::orderBy('designation_seqno')->where('designation_status','1')->get();
        $paymode=paymode::orderBy('paymode_seqno')->where('paymode_status','1')->get();
        
        return view('admin.employee.create',compact('rols','department','designation','paymode'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {

        $file_path = $request->file('avatar');

        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path);

            Employee::create($request->except('_token', 'avatar') + [
                'avatar' => $uploadedFilePath,
            ]);

            return redirect()->route('employee.index')->with('success', 'Created successfully.');
        } else {

            Employee::create($request->except('_token', 'avatar'));
            return redirect()->route('employee.index')->with('success', 'Created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        if ($request->hasFile('avatar')) {
            // Delete the old file
            Storage::delete("public/{$employee->avatar}");

            // Upload the new file
            $uploadedFilePath = FileHelper::uploadFile($request->file('avatar'));

            // Update the database record
            $employee->update($request->except('_token', 'avatar') + [
                'avatar' => $uploadedFilePath,
            ]);
        } else {
            $employee->update($request->except('_token', 'avatar'));
        }
        return redirect()->route('employee.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $filePath = storage_path("app/public/{$employee->avatar}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$employee->avatar}");
        }
        $employee->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
