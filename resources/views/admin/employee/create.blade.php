@extends('layouts.master')
@section('title')
Create Employee
@endsection
@section('page-title')
Employee Create
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Create New Employee</h4>
                    <div class="text-end">
                        <a href="#" class="btn btn-sm btn-success">Create New</a>
                        <a href="#" class="btn btn-sm btn-success">Search</a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="row">
                        <div class="col-lg-7">
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
                    <form>
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="genarel_info" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Reg No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Reg No.">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">DID</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Mobile">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Payroll</label>
                                                <div class="col-sm-9">
                                                    <select name="two" class="form-control">
                                                        <option value="">Yes</option>
                                                        <option value="">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="three" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select name="three" class="form-control">
                                                        <option value="">Active</option>
                                                        <option value="">In-active</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Remark</label>
                                                <div class="col-sm-9">
                                                    <textarea name="four" rows="2" class="form-control"
                                                        placeholder="Remark"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">User Right</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Date Of Birth</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="one" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="one" class="form-control"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">CPF Entitled</label>
                                                <div class="col-sm-9">
                                                    <select name="two" class="form-control">
                                                        <option value="">Yes</option>
                                                        <option value="">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Position Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        placeholder="Position Title">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="row mb-4">
                                            {{-- <label for="one" class="col-sm-3 col-form-label">User Right</label> --}}
                                            <div class="col-sm-9">
                                                <img src="{{ URL::asset('build/images/avatar.png') }}"
                                                    alt="avatar" class="mb-2">
                                                <input type="file" class="form-control">
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
                                                <label for="one" class="col-sm-3 col-form-label">Postal Code 1</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Postal Code">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Unit No 1</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Unit No">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Address 1</label>
                                                <div class="col-sm-9">
                                                    <textarea name="four" rows="2" class="form-control"
                                                        placeholder="Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Postal Code 2</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Postal Code">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Unit No 2</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Unit No">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Address 2</label>
                                                <div class="col-sm-9">
                                                    <textarea name="four" rows="2" class="form-control"
                                                        placeholder="Address"></textarea>
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
                                                <label for="one" class="col-sm-3 col-form-label">Contact Person</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Contact Person">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Phone 1</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Phone 1">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea name="four" rows="2" class="form-control"
                                                        placeholder="Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Relationship</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Relationship">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Phone 2</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Phone 2">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Remarks</label>
                                                <div class="col-sm-9">
                                                    <textarea name="four" rows="2" class="form-control"
                                                        placeholder="Remarks"></textarea>
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
                                                <label for="one" class="col-sm-3 col-form-label">Department</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Work time
                                                    (Start)</label>
                                                <div class="col-sm-9">
                                                    <input type="time" name="one" class="form-control"
                                                        placeholder="Unit No">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Join Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" placeholder="Join Date">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Confirmation
                                                    Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control"
                                                        placeholder="Confirmation Date">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">PR Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" placeholder="PR Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Destination</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Work time (End)</label>
                                                <div class="col-sm-9">
                                                    <input type="time" name="one" class="form-control"
                                                        placeholder="Work time (End)">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Probation
                                                    Period</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Extention of
                                                    Probation</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Termination /
                                                    Resignation Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control"
                                                        placeholder="Termination / Resignation Date">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Terminate
                                                    Reason</label>
                                                <div class="col-sm-9">
                                                    <textarea name="" rows="2" placeholder="Terminate Reason"
                                                        class="form-control"></textarea>
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
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Approved level
                                                    2</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Approved level
                                                    3</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
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
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Approved level
                                                    2</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Approved level
                                                    3</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
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
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                        <option value="">Cash</option>
                                                        <option value="">Cheque</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">GIRO Account
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="GIRO Account Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Pay Mode</label>
                                                <div class="col-sm-6">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">GIRO Account No</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="GIRO Account No">
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
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Work Permit Number">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Application
                                                    Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="one" class="form-control"
                                                        placeholder="Application Date">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Renewal Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="one" class="form-control"
                                                        placeholder="Renewal Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Date of Arrival</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="one" class="form-control"
                                                        placeholder="Date of Arrival">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Issue Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="one" class="form-control"
                                                        placeholder="Pass Issuance Date">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Levy Amount</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Levy Amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="leave" role="tabpanel">
                                {{-- <div class="row">
                                    <div class="col-lg-12">
                                            <table>
                                                <th>
                                                    <td>Leave Title</td>
                                                    <td>Hide</td>
                                                    <td>Balance (2023)</td>
                                                    <td>Entitled (2023)</td>
                                                </th>
                                                <tbody>
                                                    <tr>
                                                        <td>Medical Reimbursement</td>
                                                        <td><input type="checkbox" ></td>
                                                        <td><input type="text" class="form-control" placeholder="Days" ></td>
                                                        <td><input type="text" class="form-control" placeholder="Days" ></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                    </div>
                                </div> --}}
                                <div class="form-group mb-2">
                                    <label for="emplleave_leavetype" class="col-sm-2 control-label">Leave Title</label>
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
                                        <label for="emplleave_leavetype" class="col-sm-2 control-label">Hospitalisation
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
