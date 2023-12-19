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
use App\Models\client;
use App\Models\dbsex;
use App\Models\maritalStatus;
use App\Models\outlet;
use App\Models\passtype;
use App\Models\Race;
use App\Models\Religion;
use App\Models\User;
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

        $datas = Employee::with('role_data', 'Designation')->latest()->get();

        return view('admin.employee.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rols = Role::latest()->where('guard_name', 'web')->get();
        $departments = Department::orderBy('department_seqno')->where('department_status', '1')->select('id', 'department_code')->get();
        $designations = Designation::orderBy('designation_seqno')->where('designation_status', '1')->select('id', 'designation_code')->get();
        $paymode = paymode::orderBy('paymode_seqno')->where('paymode_status', '1')->get();
        $outlets = outlet::latest()->select('id', 'outlet_name')->get();
        $passes = passtype::latest()->where('passtype_status', 1)->select('id', 'passtype_code')->get();
        $users = User::latest()->select('id', 'name')->get();
        $roles = Role::latest()->select('id', 'name')->get();
        $races = Race::latest()->select('id', 'race_code')->where('race_status', 1)->get();
        $religions = Religion::latest()->select('id', 'religion_code')->where('religion_status', 1)->get();
        $sexs = dbsex::latest()->select('id', 'dbsexes_code')->where('dbsexes_status', 1)->get();
        $marital_status = maritalStatus::latest()->select('id', 'marital_statuses_code')->where('marital_statuses_status', 1)->get();
        $clients = client::latest()->select('id', 'client_code')->where('clients_status', 1)->get();


        return view('admin.employee.create', compact('rols', 'departments', 'designations', 'paymode', 'outlets', 'passes', 'users', 'roles', 'races', 'religions', 'sexs', 'marital_status', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {

        $file_path = $request->file('employee_avater');

        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path);

            Employee::create($request->except('_token', 'employee_avater') + [
                'employee_avater' => $uploadedFilePath,
            ]);

            return redirect()->route('employee.index')->with('success', 'Created successfully.');
        } else {

            Employee::create($request->except('_token', 'employee_avater'));
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

        $rols = Role::latest()->where('guard_name', 'web')->get();
        $departments = Department::orderBy('department_seqno')->where('department_status', '1')->select('id', 'department_code')->get();
        $designations = Designation::orderBy('designation_seqno')->where('designation_status', '1')->select('id', 'designation_code')->get();
        $paymode = paymode::orderBy('paymode_seqno')->where('paymode_status', '1')->get();
        $outlets = outlet::latest()->select('id', 'outlet_name')->get();
        $passes = passtype::latest()->where('passtype_status', 1)->select('id', 'passtype_code')->get();
        $users = User::latest()->select('id', 'name')->get();
        $roles = Role::latest()->select('id', 'name')->get();
        $races = Race::latest()->select('id', 'race_code')->where('race_status', 1)->get();
        $religions = Religion::latest()->select('id', 'religion_code')->where('religion_status', 1)->get();
        $sexs = dbsex::latest()->select('id', 'dbsexes_code')->where('dbsexes_status', 1)->get();
        $marital_status = maritalStatus::latest()->select('id', 'marital_statuses_code')->where('marital_statuses_status', 1)->get();
        $clients = client::latest()->select('id', 'client_code')->where('clients_status', 1)->get();

        return view('admin.employee.edit', compact('employee','rols', 'departments', 'designations', 'paymode', 'outlets', 'passes', 'users', 'roles', 'races', 'religions', 'sexs', 'marital_status', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        if ($request->hasFile('employee_avater')) {
            // Delete the old file
            Storage::delete("public/{$employee->employee_avater}");

            // Upload the new file
            $uploadedFilePath = FileHelper::uploadFile($request->file('employee_avater'));

            // Update the database record
            $employee->update($request->except('_token', 'employee_avater') + [
                'employee_avater' => $uploadedFilePath,
            ]);
        } else {
            $employee->update($request->except('_token', 'employee_avater'));
        }
        return redirect()->route('employee.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $filePath = storage_path("app/public/{$employee->employee_avater}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$employee->employee_avater}");
        }
        $employee->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
