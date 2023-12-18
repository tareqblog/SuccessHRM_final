<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Designation;
use App\Models\Department;
use App\Models\paymode;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use \Illuminate\Http\JsonResponse;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
