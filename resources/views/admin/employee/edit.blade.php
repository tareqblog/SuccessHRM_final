@extends('layouts.master')
@section('title')
    Edit Employee
@endsection
@section('page-title')
    Employee Edit
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Edit Employee</h4>
                        <div class="text-end">
                            <a href="{{ route('employee.create') }}" class="btn btn-sm btn-success">Create
                                New</a>
                            <a href="{{ route('employee.index') }}" class="btn btn-sm btn-success">Search</a>
                        </div>
                    </div>
                    @include('admin.include.errors')
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="row">
                            <div class="col-lg-8">
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#General_info" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">General Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#contact_info" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Contact Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#job_info" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Job Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#bank_info" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Bank Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#foreign_worker" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Foreign Worker</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#leave" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Leave</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <form action="{{ route('employee.update', $employee->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="General_info" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Outlet</label>
                                                    <div class="col-sm-9">
                                                        <select name="employee_outlet_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($outlets as $outlet)
                                                                <option value="{{ $outlet->id }}"
                                                                    {{ $outlet->id == old('employee_outlet_id', $employee->employee_outlet_id) ? 'selected' : '' }}>
                                                                    {{ $outlet->outlet_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4" id="role7input" style="display: none;">
                                                    <label for="two" class="col-sm-3 col-form-label">Manager</label>
                                                    <div class="col-sm-9">
                                                        <select name="manager_users_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($emp_manager as $user)
                                                                <option value="{{ $user->id }}"
                                                                    {{ $user->id == $employee->manager_users_id ? 'selected' : '' }}>
                                                                    {{ $user->employee_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-4" id="role10input" style="display: none;">
                                                    <label for="two" class="col-sm-3 col-form-label">Manager</label>
                                                    <div class="col-sm-9">
                                                        <select name="manager_users_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($emp_manager as $user)
                                                                <option value="{{ $user->id }}"
                                                                    {{ $user->id == $employee->manager_users_id ? 'selected' : '' }}>
                                                                    {{ $user->employee_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-4" id="role9input" style="display: none;">
                                                    <label for="two" class="col-sm-3 col-form-label">Manager</label>
                                                    <div class="col-sm-9">
                                                        <select name="manager_users_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($emp_manager as $user)
                                                                <option value="{{ $user->id }}"
                                                                    {{ $user->id == $employee->manager_users_id ? 'selected' : '' }}>
                                                                    {{ $user->employee_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Initial</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_code" class="form-control"
                                                            placeholder="Code"
                                                            value="{{ old('employee_code', $employee->employee_code) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Birthday</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_birthdate"
                                                            class="form-control" placeholder="Birthday"
                                                            value="{{ old('employee_birthdate', $employee->employee_birthdate) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Email
                                                        Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_email" class="form-control"
                                                            placeholder="Email"
                                                            value="{{ old('employee_email', $employee->employee_email) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Phone no</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_phone" class="form-control"
                                                            placeholder="Phone no"
                                                            value="{{ old('employee_phone', $employee->employee_phone) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Pass
                                                        Type</label>
                                                    <div class="col-sm-9">
                                                        <select name="passtypes_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($passes as $pass)
                                                                <option value="{{ $pass->id }}"
                                                                    {{ $pass->id == old('passtypes_id', $employee->passtypes_id) ? 'selected' : '' }}>
                                                                    {{ $pass->passtype_code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">NRIC</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_nric" class="form-control"
                                                            placeholder="NRIC"
                                                            value="{{ old('employee_nric', $employee->employee_nric) }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">

                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">User
                                                        Right</label>
                                                    <div class="col-sm-9">
                                                        <select name="roles_id" class="form-control" id="mySelect">
                                                            <option value="">Select One</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}"
                                                                    {{ $role->id == old('roles_id', $employee->roles_id) ? 'selected' : '' }}>
                                                                    {{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-4" id="role7inputanother" style="display: none;">
                                                    <label for="two" class="col-sm-3 col-form-label">Team
                                                        Leader</label>
                                                    <div class="col-sm-9">
                                                        <select name="team_leader_users_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($emp_team_leader as $leader)
                                                                <option value="{{ $leader->id }}"
                                                                    {{ $leader->id == $employee->team_leader_users_id ? 'selected' : '' }}>
                                                                    {{ $leader->employee_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4" id="role9inputanother" style="display: none;">
                                                    <label for="two" class="col-sm-3 col-form-label">Team
                                                        Leader</label>
                                                    <div class="col-sm-9">
                                                        <select name="team_leader_users_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($emp_team_leader as $leader)
                                                                <option value="{{ $leader->id }}"
                                                                    {{ $leader->id == $employee->team_leader_users_id ? 'selected' : '' }}>
                                                                    {{ $leader->employee_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Name <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_name" class="form-control"
                                                            placeholder="Name"
                                                            value="{{ old('employee_name', $employee->employee_name) }}"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="row mb-4 form-group required" id="role4input"
                                                    style="display: none;">
                                                    <label for="one" class="col-sm-3 col-form-label">SHRC/SRC<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input id type="text" name="employee_shrc"
                                                            class="form-control" placeholder="SHRC"
                                                            value="{{ $employee->employee_shrc }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Sex</label>
                                                    <div class="col-sm-9">
                                                        <select name="dbsexes_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($sexs as $sex)
                                                                <option value="{{ $sex->id }}"
                                                                    {{ $sex->id == old('dbsexes_id', $employee->dbsexes_id) ? 'selected' : '' }}>
                                                                    {{ $sex->dbsexes_code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Marital
                                                        Status</label>
                                                    <div class="col-sm-9">
                                                        <select name="marital_statuses_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($marital_status as $marital)
                                                                <option value="{{ $marital->id }}"
                                                                    {{ $marital->id == old('marital_statuses_id', $employee->marital_statuses_id) ? 'selected' : '' }}>
                                                                    {{ $marital->marital_statuses_code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Religion</label>
                                                    <div class="col-sm-9">
                                                        <select name="religions_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($religions as $religion)
                                                                <option value="{{ $religion->id }}"
                                                                    {{ $religion->id == old('religions_id', $employee->religions_id) ? 'selected' : '' }}>
                                                                    {{ $religion->religion_code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Race</label>
                                                    <div class="col-sm-9">
                                                        <select name="races_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($races as $race)
                                                                <option value="{{ $race->id }}"
                                                                    {{ $race->id == old('races_id', $employee->races_id) ? 'selected' : '' }}>
                                                                    {{ $race->race_code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row mb-4">
                                                <div class="col-sm-9">
                                                    @if ($employee->employee_avater)
                                                        <img width="200"
                                                            src="{{ asset('storage') }}/{{ $employee->employee_avater }}"
                                                            alt="avatar" class="mb-2">
                                                    @else
                                                        <img src="{{ URL::asset('build/images/avatar.png') }}"
                                                            alt="avatar" class="mb-2">
                                                    @endif
                                                    <input type="file" name="employee_avater" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="contact_info" role="tabpanel">
                                    <div class="row">
                                        <h5>Address Information</h5>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Postal Code
                                                        1</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_postal_code"
                                                            class="form-control" placeholder="Postal Code"
                                                            value="{{ $employee->employee_postal_code }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Unit No
                                                        1</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_unit_number"
                                                            class="form-control" placeholder="Unit No"
                                                            value="{{ $employee->employee_unit_number }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Address
                                                        1</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="employee_street" rows="2" class="form-control" placeholder="Address"> {{ $employee->employee_street }} </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Postal Code
                                                        2</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_postal_code2"
                                                            class="form-control" placeholder="Postal Code"
                                                            value="{{ $employee->employee_postal_code2 }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Unit No
                                                        2</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_unit_number2"
                                                            class="form-control" placeholder="Unit No"
                                                            value="{{ $employee->employee_unit_number2 }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Address
                                                        2</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="employee_street2" rows="2" class="form-control" placeholder="Address"> {{ old('employee_street2', $employee->employee_street2) }} </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h5>Emergency Contact Address Information</h5>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Contact
                                                        Person</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_emr_contact"
                                                            class="form-control" placeholder="Contact Person"
                                                            value="{{ old('employee_emr_contact', $employee->employee_emr_contact) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Phone 1</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_emr_phone1"
                                                            class="form-control" placeholder="Phone 1"
                                                            value="{{ old('employee_emr_phone1', $employee->employee_emr_phone1) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Address</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="employee_emr_address" rows="2" class="form-control" placeholder="Address"> {{ old('employee_emr_address', $employee->employee_emr_address) }} </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one"
                                                        class="col-sm-3 col-form-label">Relationship</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_emr_relation"
                                                            class="form-control" placeholder="Relationship"
                                                            value="{{ old('employee_emr_relation', $employee->employee_emr_relation) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Phone 2</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_emr_phone2"
                                                            class="form-control" placeholder="Phone 2"
                                                            value="{{ old('employee_emr_phone2', $employee->employee_emr_phone2) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Remarks</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="employee_emr_remarks" rows="2" class="form-control" placeholder="Remarks"> {{ old('employee_emr_remarks', $employee->employee_emr_remarks) }} </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="job_info" role="tabpanel">
                                    <div class="row">
                                        <h5>Job Information</h5>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one"
                                                        class="col-sm-3 col-form-label">Department</label>
                                                    <div class="col-sm-9">
                                                        <select name="departments_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($departments as $department)
                                                                <option value="{{ $department->id }}"
                                                                    {{ $department->id == old('departments_id', $employee->departments_id) ? 'selected' : '' }}>
                                                                    {{ $department->department_code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Work time
                                                        (Start)</label>
                                                    <div class="col-sm-9">
                                                        <input type="time" name="employee_work_time_start"
                                                            class="form-control" placeholder="Unit No"
                                                            value="{{ old('employee_work_time_start', $employee->employee_work_time_start) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Join
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_joindate"
                                                            class="form-control" placeholder="Join Date"
                                                            value="{{ old('employee_joindate', $employee->employee_joindate) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Confirmation
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_confirmationdate"
                                                            class="form-control" placeholder="Confirmation Date"
                                                            value="{{ old('employee_confirmationdate', $employee->employee_confirmationdate) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">PR Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_prdate" class="form-control"
                                                            placeholder="PR Date"
                                                            value="{{ old('employee_prdate', $employee->employee_prdate) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one"
                                                        class="col-sm-3 col-form-label">Designation</label>
                                                    <div class="col-sm-9">
                                                        <select name="designations_id" class="form-control"
                                                            id="">

                                                            <option value="">Select One</option>
                                                            @foreach ($designations as $designation)
                                                                <option value="{{ $designation->id }}"
                                                                    {{ $designation->id == old('designations_id', $employee->designations_id) ? 'selected' : '' }}>
                                                                    {{ $designation->designation_code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Work time
                                                        (End)</label>
                                                    <div class="col-sm-9">
                                                        <input type="time" name="employee_work_time_end"
                                                            class="form-control" placeholder="Work time (End)"
                                                            value="{{ old('employee_work_time_end', $employee->employee_work_time_end) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Probation
                                                        Period</label>
                                                    <div class="col-sm-9">
                                                        <select name="employee_probation" class="form-control"
                                                            id="">
                                                            <option value='0'>Select One</option>
                                                            <option value='1'
                                                                {{ old('employee_probation', $employee->employee_probation) == 1 ? 'selected' : '' }}>
                                                                1</option>
                                                            <option value='2'
                                                                {{ old('employee_probation', $employee->employee_probation) == 2 ? 'selected' : '' }}>
                                                                2</option>
                                                            <option value='3'
                                                                {{ old('employee_probation', $employee->employee_probation) == 3 ? 'selected' : '' }}>
                                                                3</option>
                                                            <option value='4'
                                                                {{ old('employee_probation', $employee->employee_probation) == 4 ? 'selected' : '' }}>
                                                                4</option>
                                                            <option value='5'
                                                                {{ old('employee_probation', $employee->employee_probation) == 5 ? 'selected' : '' }}>
                                                                5</option>
                                                            <option value='6'
                                                                {{ old('employee_probation', $employee->employee_probation) == 6 ? 'selected' : '' }}>
                                                                6</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Extention of
                                                        Probation</label>
                                                    <div class="col-sm-9">
                                                        <select name="employee_extentionprobation" class="form-control"
                                                            id="">
                                                            <option value='0'>Select One</option>
                                                            <option value='1'
                                                                {{ old('employee_extentionprobation', $employee->employee_extentionprobation) == 1 ? 'selected' : '' }}>
                                                                1</option>
                                                            <option value='2'
                                                                {{ old('employee_extentionprobation', $employee->employee_extentionprobation) == 2 ? 'selected' : '' }}>
                                                                2</option>
                                                            <option value='3'
                                                                {{ old('employee_extentionprobation', $employee->employee_extentionprobation) == 3 ? 'selected' : '' }}>
                                                                3</option>
                                                            <option value='4'
                                                                {{ old('employee_extentionprobation', $employee->employee_extentionprobation) == 4 ? 'selected' : '' }}>
                                                                4</option>
                                                            <option value='5'
                                                                {{ old('employee_extentionprobation', $employee->employee_extentionprobation) == 5 ? 'selected' : '' }}>
                                                                5</option>
                                                            <option value='6'
                                                                {{ old('employee_extentionprobation', $employee->employee_extentionprobation) == 6 ? 'selected' : '' }}>
                                                                6</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Termination /
                                                        Resignation Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_resigndate"
                                                            class="form-control"
                                                            placeholder="Termination / Resignation Date"
                                                            value="{{ old('employee_resigndate', $employee->employee_resigndate) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Terminate
                                                        Reason</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="employee_resignreason" rows="2" placeholder="Terminate Reason" class="form-control"> {{ old('employee_resignreason', $employee->employee_resignreason) }} </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h5>Alert Supervisor</h5>
                                        <div class="col-lg-6">
                                            <h6>Leave</h6>
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Approved level
                                                        1</label>
                                                    <div class="col-sm-9">
                                                        <select name="leave_aprv1_users_id" class="form-control"
                                                            id="">
                                                            @foreach ($emp_admin as $data)
                                                                <option value="{{ $data->id }}"
                                                                    {{ old('leave_aprv1_users_id', $employee->leave_aprv1_users_id) == $data->id ? 'selected' : '' }}>
                                                                    {{ $data->employee_name }} </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Approved level
                                                        2</label>
                                                    <div class="col-sm-9">
                                                        <select name="leave_aprv2_users_id" class="form-control"
                                                            id="">
                                                            @foreach ($emp_admin as $data)
                                                                <option value="{{ $data->id }}"
                                                                    {{ old('leave_aprv2_users_id', $employee->leave_aprv2_users_id) == $data->id ? 'selected' : '' }}>
                                                                    {{ $data->employee_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Approved level
                                                        3</label>
                                                    <div class="col-sm-9">
                                                        <select name="leave_aprv3_users_id" class="form-control"
                                                            id="">
                                                            @foreach ($emp_admin as $data)
                                                                <option value="{{ $data->id }}"
                                                                    {{ old('leave_aprv3_users_id', $employee->leave_aprv3_users_id) == $data->id ? 'selected' : '' }}>
                                                                    {{ $data->employee_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6>Claims</h6>
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Approved level
                                                        1</label>
                                                    <div class="col-sm-9">
                                                        <select name="claims_aprv1_users_id" class="form-control"
                                                            id="">
                                                            @foreach ($emp_admin as $data)
                                                                <option value="{{ $data->id }}"
                                                                    {{ old('claims_aprv1_users_id', $employee->claims_aprv1_users_id) == $data->id ? 'selected' : '' }}>
                                                                    {{ $data->employee_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Approved level
                                                        2</label>
                                                    <div class="col-sm-9">
                                                        <select name="claims_aprv2_usersid" class="form-control"
                                                            id="">
                                                            @foreach ($emp_admin as $data)
                                                                <option value="{{ $data->id }}"
                                                                    {{ old('claims_aprv2_usersid', $employee->claims_aprv2_usersid) == $data->id ? 'selected' : '' }}>
                                                                    {{ $data->employee_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Approved level
                                                        3</label>
                                                    <div class="col-sm-9">
                                                        <select name="claims_aprv3_users_id" class="form-control"
                                                            id="">
                                                            @foreach ($emp_admin as $data)
                                                                <option value="{{ $data->id }}"
                                                                    {{ old('claims_aprv3_users_id', $employee->claims_aprv3_users_id) == $data->id ? 'selected' : '' }}>
                                                                    {{ $data->employee_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bank_info" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Pay Mode</label>
                                                    <div class="col-sm-9">
                                                        <select name="paymodes_id" class="form-control" id="">
                                                            <option value="">Select One</option>
                                                            <option value="1"
                                                                {{ $employee->paymodes_id == 1 ? 'selected' : '' }}>
                                                                Cash
                                                            </option>
                                                            <option value="2"
                                                                {{ $employee->paymodes_id == 2 ? 'selected' : '' }}>
                                                                Cheque
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">GIRO Account
                                                        Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_bank_acc_title"
                                                            class="form-control" placeholder="GIRO Account Name"
                                                            value="{{ old('employee_bank_acc_title', $employee->employee_bank_acc_title) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">GIRO Bank
                                                        Code</label>
                                                    <div class="col-sm-9">
                                                        <select name="employee_bank" class="form-control" id="">
                                                            <option value="">Select One</option>
                                                            @foreach ($Paybanks as $data)
                                                                <option value="{{ $data->id }}"
                                                                    {{ old('employee_bank', $employee->employee_bank) == $data->id ? 'selected' : '' }}>
                                                                    {{ $data->Paybank_code }} </option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">GIRO Account
                                                        No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_bank_acc_no"
                                                            class="form-control" placeholder="GIRO Account No"
                                                            value="{{ old('employee_bank_acc_no', $employee->employee_bank_acc_no) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="foreign_worker" role="tabpanel">
                                    <div class="row">
                                        <h5>Work Permit Information</h5>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Work Permit
                                                        Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_fw_permit_number"
                                                            class="form-control" placeholder="Work Permit Number"
                                                            value="{{ old('employee_fw_permit_number', $employee->employee_fw_permit_number) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Application
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_fw_application_date"
                                                            class="form-control" placeholder="Application Date"
                                                            value="{{ old('employee_fw_application_date', $employee->employee_fw_application_date) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Renewal
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_fw_renewal_date"
                                                            class="form-control" placeholder="Renewal Date"
                                                            value="{{ old('employee_fw_renewal_date', $employee->employee_fw_renewal_date) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Date of
                                                        Arrival</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_fw_arrival_date"
                                                            class="form-control" placeholder="Date of Arrival"
                                                            value="{{ old('employee_fw_arrival_date', $employee->employee_fw_arrival_date) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Issue
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_fw_issue_date"
                                                            class="form-control" placeholder="Pass Issuance Date"
                                                            value="{{ old('employee_fw_issue_date', $employee->employee_fw_issue_date) }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Levy
                                                        Amount</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_fw_levy_amount"
                                                            class="form-control" placeholder="Levy Amount"
                                                            value="{{ old('employee_fw_levy_amount', $employee->employee_fw_levy_amount) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="leave" role="tabpanel">
                                    <div class="form-group mb-2">
                                        <label for="emplleave_leavetype" class="col-sm-2 control-label">Leave
                                            Title</label>
                                        <label for="emplleave_leavetype" class="col-sm-1 control-label">Hide</label>
                                        <label for="emplleave_leavetype" class="col-sm-3 control-label">Balance
                                            (2023)</label>
                                        <label for="emplleave_leavetype" class="col-sm-3 control-label">Entitled
                                            (2023)</label>
                                    </div>
                                    @foreach ($leave_types as $leave)
                                        <div class="form-group mb-2">
                                            <div class="row">
                                                <label for="emplleave_leavetype"
                                                    class="col-sm-2 control-label">{{ $leave->leavetype_code }}</label>
                                                <div class="col-sm-1">
                                                    <input type="checkbox" value="1" name="medical_reimbursement">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control"
                                                        name="medical_reimbursement"
                                                        value="{{ $leave->leavetype_default }}" placeholder="Days">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control"
                                                        name="medical_reimbursement" value="0" placeholder="Days">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div>
                                        <a href="{{ route('employee.index') }}"
                                            class="btn btn-sm btn-secondary w-md">Back</a>
                                        <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#mySelect').change(function() {
                    var selectedValue = $(this).val();

                    // if (selectedValue === '4') {
                    //     myPayroll();
                    // } else {
                    //     $('#role4input').hide().css('display', 'none');
                    // }


                    // function myPayroll() {
                    //     $('#role4input').show().css('display', 'show');
                    // }

                    // Payroll end
                    if (selectedValue === '8') {
                        myConsultent();
                    } else {
                        $('#role7input').hide().css('display', 'none');
                        $('#role7inputanother').hide().css('display', 'none');
                    }

                    function myConsultent() {
                        $('#role7input').show().css('display', 'show');
                        $('#role7inputanother').show().css('display', 'show');
                    }

                    // Consultent

                    if (selectedValue === '12') {
                        myInternship();
                    } else {
                        $('#role9input').hide().css('display', 'none');
                        $('#role9inputanother').hide().css('display', 'none');
                    }

                    function myInternship() {
                        $('#role9input').show().css('display', 'show');
                        $('#role9inputanother').show().css('display', 'show');
                    }
                    // Internship
                    if (selectedValue === '11') {
                        myTeamLeader();
                    } else {
                        $('#role10input').hide().css('display', 'none');
                    }


                    function myTeamLeader() {
                        $('#role10input').show().css('display', 'show');
                    }
                    ///Manager

                });

                $('#mySelect').trigger('change');
            });
        </script>
    @endsection
