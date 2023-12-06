@extends('layouts.master')
@section('title')
Create Candidate
@endsection
@section('page-title')
Candidate Create
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Create New Candidate</h4>
                    <div class="text-end">
                        <a href="#" class="btn btn-sm btn-success">Create New</a>
                        <a href="#" class="btn btn-sm btn-success">Search</a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="row">
                        <div class="col-lg-10">
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
                                    <a class="nav-link" data-bs-toggle="tab" href="#bank_info" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Bank Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#qualification" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Qualification</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#character_referees" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Character Referee's</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#declaration" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Declaration</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#terms_conditions" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Terms & Conditions</span>
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
                                                <label for="one" class="col-sm-4 col-form-label">Candidate Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="--System Genarated--" disabled>
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
                                                <label for="one" class="col-sm-3 col-form-label">Date of Birth</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="one" class="form-control"
                                                        placeholder="Date of Birth">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Race</label>
                                                <div class="col-sm-9">
                                                    <select name="two" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="three" class="col-sm-3 col-form-label">Mobile</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Mobile">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="three" class="col-sm-3 col-form-label">Home Tel</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Home Tel">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Type Of Pass</label>
                                                <div class="col-sm-9">
                                                    <select name="two" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="three" class="col-sm-3 col-form-label">Height</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Height">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">SHRC/SRC</label>
                                                <div class="col-sm-9">
                                                    <select name="two" class="form-control">
                                                        <option value="">Select One</option>
                                                        <option value="">SHRC</option>
                                                        <option value="">SRC</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-4 col-form-label">Position
                                                    Applied</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        placeholder="Position Applied">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">NRIC/FIN No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="NRIC/FIN No.">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-9">
                                                    <select name="two" class="form-control">
                                                        <option value="">Select One</option>
                                                        <option value="">Male</option>
                                                        <option value="">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Religion</label>
                                                <div class="col-sm-9">
                                                    <select name="two" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-4 col-form-label">Numbers of
                                                    Children</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        placeholder="Numbers of Children">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select name="two" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Weight</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Weight">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Black List</label>
                                                <div class="col-sm-9">
                                                    <input type="radio" name="black-list" id="yes"
                                                    data-bs-toggle="modal" data-bs-target="#myModal">
                                                    <label for="yes">Yes</label>
                                                    <input type="radio" name="black-list" id="no">
                                                    <label for="no">No</label>
                                                </div>
                                            </div>

                                            <!-- sample modal content -->
                                            <div id="myModal" class="modal fade" tabindex="-1"
                                                aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Reason of Black list</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="">
                                                                <label for="reason_of_blacklist">Reason Of Blacklist</label>
                                                                <textarea name="" class="form-control mb-2" rows="4" placeholder="Reason of Blacklist"></textarea>
                                                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
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
