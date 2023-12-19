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
                        <h4 class="card-title mb-0">Edit New Employee</h4>
                        <div class="text-end">
                            <a href="{{ route('employee.index') }}" class="btn btn-sm btn-success">Create
                                New</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="row">
                            <div class="col-lg-8">
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#genarel_info" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Genarel Info</span>
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
                                    {{-- <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#salary_info" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Salary Info</span>
                                    </a>
                                </li> --}}
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
                                <div class="tab-pane active" id="genarel_info" role="tabpanel">
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
                                                                    {{ $outlet->id == $employee->employee_outlet_id ? 'selected' : '' }}>
                                                                    {{ $outlet->outlet_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Employee
                                                        Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_code" class="form-control"
                                                            placeholder="Code" value="{{ $employee->employee_code }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Name <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_name" class="form-control"
                                                            placeholder="Name" value="{{ $employee->employee_name }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Phone no</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_phone" class="form-control"
                                                            placeholder="Phone no"
                                                            value="{{ $employee->employee_phone }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Email
                                                        Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_email" class="form-control"
                                                            placeholder="Email" value="{{ $employee->employee_email }}">
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
                                                                    {{ $pass->id == $employee->passtypes_id ? 'selected' : '' }}>
                                                                    {{ $pass->passtype_code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">NRIC</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_nric" class="form-control"
                                                            placeholder="NRIC" {{ $employee->employee_nric }}>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Race</label>
                                                    <div class="col-sm-9">
                                                        <select name="races_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($races as $race)
                                                                <option value="{{ $race->id }}"
                                                                    {{ $race->id == $employee->races_id ? 'selected' : '' }}>
                                                                    {{ $race->race_code }} </option>
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
                                                                    {{ $religion->id == $employee->religions_id ? 'selected' : '' }}>
                                                                    {{ $religion->religion_code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Birthday</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_birthdate"
                                                            class="form-control" placeholder="Birthday"
                                                            {{ $employee->employee_birthdate }}>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Number Of
                                                        Children</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="employee_numberofchildren"
                                                            class="form-control" placeholder="Number Of Children"
                                                            {{ $employee->employee_numberofchildren }}>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">User</label>
                                                    <div class="col-sm-9">
                                                        <select name="users_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}"
                                                                    {{ $user->id == $employee->users_id ? 'selected' : '' }}>
                                                                    {{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">User
                                                        Right</label>
                                                    <div class="col-sm-9">
                                                        <select name="roles_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}"
                                                                    {{ $role->id == $employee->roles_id ? 'selected' : '' }}>
                                                                    {{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Manager</label>
                                                    <div class="col-sm-9">
                                                        <select name="manager_users_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}"
                                                                    {{ $user->id == $employee->manager_users_id ? 'selected' : '' }}>
                                                                    {{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Team
                                                        Leader</label>
                                                    <div class="col-sm-9">
                                                        <select name="team_leader_users_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}"
                                                                    {{ $user->id == $employee->team_leader_users_id ? 'selected' : '' }}>
                                                                    {{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">SHRC</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_shrc" placeholder="SHRC"
                                                            class="form-control" {{ $employee->employee_shrc }}>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two"
                                                        class="col-sm-3 col-form-label">Defination</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_defination"
                                                            placeholder="Defination" class="form-control"
                                                            {{ $employee->employee_defination }}>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Sex</label>
                                                    <div class="col-sm-9">
                                                        <select name="dbsexes_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($sexs as $sex)
                                                                <option value="{{ $sex->id }}"
                                                                    {{ $sex->id == $employee->dbsexes_id ? 'selected' : '' }}>
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
                                                                    {{ $marital->id == $employee->marital_statuses_id ? 'selected' : '' }}>
                                                                    {{ $marital->marital_statuses_code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Client</label>
                                                    <div class="col-sm-9">
                                                        <select name="client_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($clients as $client)
                                                                <option value="{{ $client->id }}"
                                                                    {{ $client->id == $employee->client_id ? 'selected' : '' }}>
                                                                    {{ $client->client_code }} </option>
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
                                                        <img width="200" src="{{ asset('storage') }}/{{ $employee->employee_avater }}"
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
                                                            {{ $employee->employee_unit_number }}>
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
                                                        <textarea name="employee_street2" rows="2" class="form-control" placeholder="Address"> {{ $employee->employee_street2 }} </textarea>
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
                                                            value="{{ $employee->employee_emr_contact }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Phone 1</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_emr_phone1"
                                                            class="form-control" placeholder="Phone 1"
                                                            value="{{ $employee->employee_emr_phone1 }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Address</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="employee_emr_address" rows="2" class="form-control" placeholder="Address"> {{ $employee->employee_emr_address }} </textarea>
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
                                                            value="{{ $employee->employee_emr_relation }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Phone 2</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_emr_phone2"
                                                            class="form-control" placeholder="Phone 2"
                                                            value="{{ $employee->employee_emr_phone2 }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Remarks</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="employee_emr_remarks" rows="2" class="form-control" placeholder="Remarks"> {{ $employee->employee_emr_remarks }} </textarea>
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
                                                                    {{ $department->id == $employee->departments_id ? 'selected' : '' }}>
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
                                                            value="{{ $employee->employee_work_time_start }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Join
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_joindate"
                                                            class="form-control" placeholder="Join Date"
                                                            value="{{ $employee->employee_joindate }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Confirmation
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_confirmationdate"
                                                            class="form-control" placeholder="Confirmation Date"
                                                            value="{{ $employee->employee_confirmationdate }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">PR Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_prdate" class="form-control"
                                                            placeholder="PR Date"
                                                            value="{{ $employee->employee_prdate }}">
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
                                                                    {{ $designation->id == $employee->designations_id ? 'selected' : '' }}>
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
                                                            value="{{ $employee->employee_work_time_end }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Probation
                                                        Period</label>
                                                    <div class="col-sm-9">
                                                        <select name="employee_probation" class="form-control"
                                                            id="">
                                                            <option value=""
                                                                {{ $employee->employee_probation == $employee->employee_probation ? 'selected' : '' }}>
                                                                Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Extention of
                                                        Probation</label>
                                                    <div class="col-sm-9">
                                                        <select name="employee_extentionprobation" class="form-control"
                                                            id="">
                                                            <option value=""
                                                                {{ $employee->employee_extentionprobation == $employee->employee_extentionprobation ? 'selected' : '' }}>
                                                                Select One</option>
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
                                                            value="{{ $employee->employee_resigndate }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Terminate
                                                        Reason</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="employee_resignreason" rows="2" placeholder="Terminate Reason" class="form-control"> {{ $employee->employee_resignreason }} </textarea>
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
                                                            <option value=""
                                                                {{ $employee->leave_aprv1_users_id == $employee->leave_aprv1_users_id ? 'selected' : '' }}>
                                                                Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Approved level
                                                        2</label>
                                                    <div class="col-sm-9">
                                                        <select name="leave_aprv2_users_id" class="form-control"
                                                            id="">
                                                            <option value=""
                                                                {{ $employee->leave_aprv2_users_id == $employee->leave_aprv2_users_id ? 'selected' : '' }}>
                                                                Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Approved level
                                                        3</label>
                                                    <div class="col-sm-9">
                                                        <select name="leave_aprv3_users_id" class="form-control"
                                                            id="">
                                                            <option value=""
                                                                {{ $employee->leave_aprv3_users_id == $employee->leave_aprv3_users_id ? 'selected' : '' }}>
                                                                Select One</option>
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
                                                            <option
                                                                value=""{{ $employee->claims_aprv1_users_id == $employee->claims_aprv1_users_id ? 'selected' : '' }}>
                                                                Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Approved level
                                                        2</label>
                                                    <div class="col-sm-9">
                                                        <select name="claims_aprv2_usersid" class="form-control"
                                                            id="">
                                                            <option value=""
                                                                {{ $employee->claims_aprv2_usersid == $employee->claims_aprv2_usersid ? 'selected' : '' }}>
                                                                Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Approved level
                                                        3</label>
                                                    <div class="col-sm-9">
                                                        <select name="claims_aprv3_users_id" class="form-control"
                                                            id="">
                                                            <option value=""
                                                                {{ $employee->claims_aprv3_users_id == $employee->claims_aprv3_users_id ? 'selected' : '' }}>
                                                                Select One</option>
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
                                                                {{ $employee->paymodes_id == 1 ? 'selected' : '' }}>Cash
                                                            </option>
                                                            <option value="2"
                                                                {{ $employee->paymodes_id == 2 ? 'selected' : '' }}>Cheque
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
                                                            value="{{ $employee->employee_bank_acc_title }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">GIRO Bank
                                                        Code</label>
                                                    <div class="col-sm-6">
                                                        <select name="employee_bank" class="form-control" id="">
                                                            <option value=""
                                                                {{ $employee->employee_bank == $employee->employee_bank ? 'selected' : '' }}>
                                                                Select One</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">GIRO Account
                                                        No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_bank_acc_no"
                                                            class="form-control" placeholder="GIRO Account No"
                                                            value="{{ $employee->employee_bank_acc_no }}">
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
                                                            value="{{ $employee->employee_fw_permit_number }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Application
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_fw_application_date"
                                                            class="form-control" placeholder="Application Date"
                                                            value="{{ $employee->employee_fw_application_date }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Renewal
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_fw_renewal_date"
                                                            class="form-control" placeholder="Renewal Date"
                                                            value="{{ $employee->employee_fw_renewal_date }}">
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
                                                            value="{{ $employee->employee_fw_arrival_date }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Issue
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="employee_fw_issue_date"
                                                            class="form-control" placeholder="Pass Issuance Date"
                                                            value="{{ $employee->employee_fw_issue_date }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Levy
                                                        Amount</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="employee_fw_levy_amount"
                                                            class="form-control" placeholder="Levy Amount"
                                                            value="{{ $employee->employee_fw_levy_amount }}">
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
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype" class="col-sm-2 control-label">Medical
                                                Reimbursement</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" value="1" name="medical_reimbursement">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="medical_reimbursement"
                                                    value="0" placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="medical_reimbursement"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype" class="col-sm-2 control-label">Annual
                                                Leave</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="" value="1">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="" value="0"
                                                    placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="emplleave_entitled[]"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype" class="col-sm-2 control-label">Medical
                                                Leave</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="" value="1">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="" value="0"
                                                    placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="emplleave_entitled[]"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype"
                                                class="col-sm-2 control-label">Hospitalisation
                                                Leave</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="" value="1">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="" value="0"
                                                    placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="emplleave_entitled[]"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype" class="col-sm-2 control-label">Off In
                                                Lieu</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="" value="1">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="" value="0"
                                                    placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="emplleave_entitled[]"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype" class="col-sm-2 control-label">Childcare
                                                Leave</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="" value="1">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="" value="0"
                                                    placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="emplleave_entitled[]"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype"
                                                class="col-sm-2 control-label">Maternity/Paternity Leave</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="" value="1">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="" value="0"
                                                    placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="emplleave_entitled[]"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype"
                                                class="col-sm-2 control-label">Reservist</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="" value="1">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="" value="0"
                                                    placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="emplleave_entitled[]"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype" class="col-sm-2 control-label">Compassionate
                                                Leave</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="" value="1">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="" value="0"
                                                    placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="emplleave_entitled[]"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype" class="col-sm-2 control-label">Marriage
                                                Leave</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="" value="1">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="" value="0"
                                                    placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="emplleave_entitled[]"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype" class="col-sm-2 control-label">Unpaid Annual
                                                Leave</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="" value="1">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="" value="0"
                                                    placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="emplleave_entitled[]"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                            <label for="emplleave_leavetype" class="col-sm-2 control-label">Unpaid Medical
                                                Leave</label>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="" value="1">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="" value="0"
                                                    placeholder="Days">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="emplleave_entitled[]"
                                                    value="0" placeholder="Days">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div>
                                        <a href="#" class="btn btn-sm btn-secondary w-md">Back</a>
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
