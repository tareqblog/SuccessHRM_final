@extends('layouts.master')
@section('title')
Edit Candidate
@endsection
@section('css')
<!-- quill css -->
<link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet"
    type="text/css" />
@endsection
@section('page-title')
Candidate Edit
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Edit Candidate</h4>
                    <div class="text-end">
                        <a href="#" class="btn btn-sm btn-success">Create New</a>
                        <a href="#" class="btn btn-sm btn-success">Search</a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="row">
                        <div class="col-lg-12">
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
                                    <a class="nav-link" data-bs-toggle="tab" href="#family" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Family</span>
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
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#upload_resume" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Upload Resume</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#upload_file" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Upload File</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#remark" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Remark</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#payroll" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Payroll</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#working_hour" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Working Hour</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <form>
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="General_info" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-4 col-form-label">Candidate Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="candidate_code" class="form-control"
                                                        placeholder="--System Genarated--" disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Date of Birth</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="dob" class="form-control"
                                                        placeholder="Date of Birth">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Race</label>
                                                <div class="col-sm-9">
                                                    <select name="race" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="three" class="col-sm-3 col-form-label">Mobile</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="three" class="col-sm-3 col-form-label">Home Tel</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="home_tel" placeholder="Home Tel">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Type Of Pass</label>
                                                <div class="col-sm-9">
                                                    <select name="type_of_pass" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="three" class="col-sm-3 col-form-label">Height</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="height" class="form-control" placeholder="Height">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">SHRC/SRC</label>
                                                <div class="col-sm-9">
                                                    <select name="two" name="src" class="form-control">
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
                                                    <input type="text" name="position" class="form-control"
                                                        placeholder="Position Applied">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">NRIC/FIN No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="fin_no" class="form-control"
                                                        placeholder="NRIC/FIN No.">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-9">
                                                    <select name="two" name="gender" class="form-control">
                                                        <option value="">Select One</option>
                                                        <option value="">Male</option>
                                                        <option value="">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Religion</label>
                                                <div class="col-sm-9">
                                                    <select name="two" name="religion" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-4 col-form-label">Numbers of
                                                    Children</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="no_children" class="form-control"
                                                        placeholder="Numbers of Children">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select name="two" name="status" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Weight</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="weight" placeholder="Weight">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Black List</label>
                                                <div class="col-sm-9">
                                                    <input type="radio" name="black_list" id="yes"
                                                        data-bs-toggle="modal" data-bs-target="#myModal">
                                                    <label for="yes">Yes</label>
                                                    <input type="radio" name="black_list" id="no">
                                                    <label for="no">No</label>
                                                </div>
                                            </div>
                                            <!-- sample modal content -->
                                            <div id="myModal" class="modal fade" tabindex="-1"
                                                aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Reason of Black
                                                                list</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="">
                                                                <label for="reason_of_blacklist">Reason Of
                                                                    Blacklist</label>
                                                                <textarea name="reason_of_blacklist" class="form-control mb-2" rows="4"
                                                                    placeholder="Reason of Blacklist"></textarea>
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-info">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                        </div>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="row mb-4">
                                            <div class="col-sm-9">
                                                <img src="{{ URL::asset('build/images/avatar.png') }}"
                                                    alt="avatar" class="mb-2">
                                                <input type="file" name="avatar" class="form-control">
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
                                                    <input type="text" name="postal_code_1" class="form-control"
                                                        placeholder="Postal Code">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Unit No 1</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="unit_no_1" class="form-control"
                                                        placeholder="Unit No">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Address 1</label>
                                                <div class="col-sm-9">
                                                    <textarea name="address_1" rows="2" class="form-control"
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
                                                    <input type="text" name="postal_code_2" class="form-control"
                                                        placeholder="Postal Code">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Unit No 2</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="unite_2" class="form-control"
                                                        placeholder="Unit No">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Address 2</label>
                                                <div class="col-sm-9">
                                                    <textarea name="address_2" rows="2" class="form-control"
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
                                                    <input type="text" name="contact_person" class="form-control"
                                                        placeholder="Contact Person">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Phone 1</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="phone_1" class="form-control"
                                                        placeholder="Phone 1">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea name="address_" rows="2" class="form-control"
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
                                                    <input type="text" name="relationship" class="form-control"
                                                        placeholder="Relationship">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Phone 2</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="phone_2" class="form-control"
                                                        placeholder="Phone 2">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Remarks</label>
                                                <div class="col-sm-9">
                                                    <textarea name="remarks" rows="2" class="form-control"
                                                        placeholder="Remarks"></textarea>
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
                                                    <select name="pay_mode" class="form-control" id="">
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
                                                    <input type="text" name="account_name" class="form-control"
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
                                                    <select name="pay_mode_2" class="form-control" id="">
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
                                                    <input type="text" name="account_no" class="form-control"
                                                        placeholder="GIRO Account No">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="qualification" role="tabpanel">
                                <h5>Qualification and Skill</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">N-Levels</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="n_levels" class="form-control" placeholder="Course">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">O-Levels</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="o_levels" class="form-control"
                                                        placeholder="Course">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">A-Levels</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="a_levels" class="form-control"
                                                        placeholder="Course">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Diploma</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="diploma" class="form-control" placeholder="Course">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Degree</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="degree" class="form-control"
                                                        placeholder="Course">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Other</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="other" class="form-control"
                                                        placeholder="Course">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <p>Please state languages and proficiency level, e.g. excellent, good, fair, poor
                                    </p>
                                    <div class="col-lg-6">
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-3 col-form-label">Written</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="written" class="form-control"
                                                    placeholder="eg: English - good">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-3 col-form-label">Spoken</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="spoken" class="form-control"
                                                    placeholder="eg: English - good">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="family" role="tabpanel">
                                <h5>Create Family Background</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="f_name" class="form-control" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Relationship</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="f_relationship" name="one" class="form-control"
                                                        placeholder="Relationship">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Contact No</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="contact_no" class="form-control"
                                                        placeholder="Contact No">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Age</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="age" class="form-control"
                                                        placeholder="Age">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Occupation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="occupation" class="form-control"
                                                        placeholder="Occupation">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-2">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>Relationship</th>
                                                    <th>Contact</th>
                                                    <th>Occuption</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>Relationship</th>
                                                    <th>Contact</th>
                                                    <th>Occuption</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="character_referees" role="tabpanel">
                                <h5>Character Referee's</h5>
                                <p>Name 2 persons who are not your relatives</p>
                                <div class="row mb-5">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="not_relatives_name" class="form-control" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Years Known</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="year" class="form-control"
                                                        placeholder="Year">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Occupation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="occupation" class="form-control" placeholder="Occupation">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-4 col-form-label">Contact No / Email
                                                    Address</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="r_contact_no" class="form-control"
                                                        placeholder="Contact No">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name_2" class="form-control" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Years Known</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="year_2" class="form-control"
                                                        placeholder="Year">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Occupation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="occupation_2" placeholder="Occupation">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-4 col-form-label">Contact No / Email
                                                    Address</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="contact_3" class="form-control"
                                                        placeholder="Contact No">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="declaration" role="tabpanel">
                                <h5 class="mb-5">Declaration</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="form-group mb-2">
                                                <label for="declaration_bankrupt" class=" control-label">1. Are
                                                    you / Have you ever been an undischarged bankrupt?</label>
                                                <div class="radio d-flex">
                                                    <div class="col-sm-3">
                                                        <label>
                                                            <input type="radio" name="question_1"
                                                                value="1">Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="question_1" value="0">No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="question_1_field" value=""
                                                            placeholder="If Yes, Please specify">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="declaration_bankrupt" class=" control-label">2. Are you
                                                    suffering from any physical / mental impairment or chronic /
                                                    pre-existing illness?</label>
                                                <div class="radio d-flex">
                                                    <div class="col-sm-3">
                                                        <label>
                                                            <input type="radio" name="question_2"
                                                                value="1">Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="question_2" value="0">No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="question_2_field" value=""
                                                            placeholder="If Yes, Please specify">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="declaration_bankrupt" class=" control-label">3. Are you
                                                    currently undergoing long-term medical treatment?</label>
                                                <div class="radio d-flex">
                                                    <div class="col-sm-3">
                                                        <label>
                                                            <input type="radio" name="question_3"
                                                                value="1">Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="question_3" value="0">No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="question_3_field" value=""
                                                            placeholder="If Yes, Please specify">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="declaration_bankrupt" class=" control-label">4. Have you
                                                    ever been convicted or found guilty of an offence in Court Of Law in
                                                    any country?</label>
                                                <div class="radio d-flex">
                                                    <div class="col-sm-3">
                                                        <label>
                                                            <input type="radio" name="question_4"
                                                                value="1">Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="question_4" value="0">No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="question_4_field" value=""
                                                            placeholder="If Yes, Please specify">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="declaration_bankrupt" class=" control-label">5. Have you
                                                    ever been issued warning letters, suspended or dismissed from
                                                    employment before?</label>
                                                <div class="radio d-flex">
                                                    <div class="col-sm-3">
                                                        <label>
                                                            <input type="radio" name="question_5"
                                                                value="1">Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="question_5" value="0">No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="question_5_field" value=""
                                                            placeholder="If Yes, Please specify">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="declaration_bankrupt" class=" control-label">6. Have you
                                                    applied for any job with this company before?</label>
                                                <div class="radio d-flex">
                                                    <div class="col-sm-3">
                                                        <label>
                                                            <input type="radio" name="question_6"
                                                                value="1">Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="question_6" value="0">No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="question_6_field" value=""
                                                            placeholder="If Yes, Please specify">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="terms_conditions" role="tabpanel">
                                <h5 class="mb-5">Terms & Conditions</h5>
                                <div class="row">
                                    <div class="col-lg-11 m-auto">
                                        <h5>1. Temporary Placement</h5>
                                        <p><strong>A.</strong> Temporary candidates are required to serve 1 week notice
                                            to <strong>SUCCESS HUMAN RESOURCE CENTRE PTE LTD / SUCCESS RESOURCE CENTRE
                                                PTE LTD</strong> upon resignation, failing which salary in lieu of
                                            notice will be deducted (include OT claims).</p>
                                        <p><strong>B.</strong> All candidates shall not accept any employment offer
                                            directly from the client of <strong>SUCCESS HUMAN RESOURCE CENTRE PTE LTD /
                                                SUCCESS RESOURCE CENTRE PTE LTD</strong> within 1 year from the last
                                            working day of the assignment.</p>
                                        <h5>2. Permanent / Contract Placement</h5>
                                        <p>The candidates shall agree to commit themselves for a period of 2 months
                                            (excluding notice period) upon accepting the job offered by <strong>SUCCESS
                                                HUMAN RESOURCE CENTRE PTE LTD / SUCCESS RESOURCE CENTRE PTE LTD</strong>
                                            whether by writing or verbally, expressed or implied, failing which the
                                            candidates will have to compensate 30% of their offered salary to
                                            <strong>SUCCESS HUMAN RESOURCE CENTRE PTE LTD / SUCCESS RESOURCE CENTRE PTE
                                                LTD.</strong> This 30% compensation clause also applies to candidates
                                            who are terminated by our clients due to misconduct, poor performance or
                                            attendance, frequent medical leave, absence without calling or habitual late
                                            coming.</p>
                                        <p>All candidates shall not have any direct contact with the clients for a
                                            period of 1 year after an interview arranged by <strong>SUCCESS HUMAN
                                                RESOURCE CENTRE PTE LTD / SUCCESS RESOURCE CENTRE PTE LTD</strong>
                                            unless approval is granted by the Agency.</p>
                                        <p>I agree to all the Terms & Conditions of this employment and hereby declare
                                            that all the particulars given in this application is true, complete and
                                            accurate to the best of my knowledge and if this declaration is in any part
                                            false or incorrect, the Agency / Company will reserve the right to terminate
                                            my services instantly. </p>
                                        <p>I hereby authorize/consent <strong>SUCCESS HUMAN RESOURCE CENTRE PTE LTD /
                                                SUCCESS RESOURCE CENTRE PTE LTD</strong> to obtain and share all the
                                            information given in this application form/resume to any clients for job
                                            search purposes only. I understand and agree that all modes of communication
                                            (Call, SMS, Email and Fax) may be necessary to execute the job search. In
                                            order to opt out in the future, an email has to be submitted and
                                            acknowledged by <strong>SUCCESS HUMAN RESOURCE CENTRE PTE LTD / SUCCESS
                                                RESOURCE CENTRE PTE LTD</strong>, who will duly comply with the request,
                                            failing which, I will have no claim or recourse against the above-mentioned
                                            companies.</p>

                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-2 col-form-label">Join Date</label>
                                                <div class="col-sm-3">
                                                    <input type="date" name="join_date" class="form-control" placeholder="Join Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="upload_resume" role="tabpanel">
                                <div class="row mb-5">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <form action="">
                                                    <label for="one" class="col-sm-3 col-form-label">Upload</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="upload" class="form-control" placeholder="Name">
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-info mt-3">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-2">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Main</th>
                                                    <th>File Name</th>
                                                    <th>Document Type</th>
                                                    <th>Create Time</th>
                                                    <th>Create Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Main</th>
                                                    <th>File Name</th>
                                                    <th>Document Type</th>
                                                    <th>Create Time</th>
                                                    <th>Create Date</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="upload_file" role="tabpanel">
                                <div class="row mb-5">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <form action="">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Upload</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="upload_2" class="form-control" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">File Type</label>
                                                    <div class="col-sm-9">
                                                        <select name="file_type" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                            <option value="">NRIC</option>
                                                            <option value="">Passport</option>
                                                            <option value="">Education Cert</option>
                                                            <option value="">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-info mt-3">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-2">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Document Title</th>
                                                    <th>Document Type</th>
                                                    <th>File Name</th>
                                                    <th>Create Time</th>
                                                    <th>Create Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Document Title</th>
                                                    <th>Document Type</th>
                                                    <th>File Name</th>
                                                    <th>Create Time</th>
                                                    <th>Create Date</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="remark" role="tabpanel">
                                <h5>Create Remarks</h5>
                                <a href="#" class="btn btn-sm btn-success">Create New Remarks</a>
                                <div class="row mb-5">
                                    <form action="">
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Name: WONG
                                                        SHYAN-EE</label>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">NRIC:
                                                        S9913596D</label>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">File Type</label>
                                                    <div class="col-sm-9">
                                                        <select name="file_type" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Notice</label>
                                                    <div class="col-sm-9">
                                                        <select name="notice" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-2 col-form-label">Remark</label>
                                                <div class="col-sm-8">
                                                    <div id="ckeditor-classic"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-info mt-3">Save</button>
                                    </form>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-2">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Assign</th>
                                                    <th>Remark Type</th>
                                                    <th>Company</th>
                                                    <th>Received Job</th>
                                                    <th>Comments</th>
                                                    <th>Created By</th>
                                                    <th>Create Time</th>
                                                    <th>Create Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Assign</th>
                                                    <th>Remark Type</th>
                                                    <th>Company</th>
                                                    <th>Received Job</th>
                                                    <th>Comments</th>
                                                    <th>Created By</th>
                                                    <th>Create Time</th>
                                                    <th>Create Date</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="payroll" role="tabpanel">
                                <h5>Create Payroll</h5>
                                <a href="#" class="btn btn-sm btn-success">Create New Remarks</a>
                                <form action="">
                                    <div class="row mb-5">
                                        <div class="col-lg-12">
                                            <label for="one" class="col-form-label">Name: WONG
                                                SHYAN-EE</label>
                                            <br>
                                            <label for="one" class="col-form-label">NRIC: S9913596D</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Job Type</label>
                                                    <div class="col-sm-9">
                                                        <select name="job_type" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Admin Fee
                                                        (Monthly)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="admin_fee" class="form-control" placeholder="Admin Fee">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Client
                                                        Company</label>
                                                    <div class="col-sm-9">
                                                        <select name="client_company" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Invoice
                                                        Rate</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="invoice" class="form-control"
                                                            placeholder="Invoice Rate">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Daily Rate</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="daily_rate" class="form-control"
                                                            placeholder="Daily Rate">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Job Title</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="job_title" class="form-control" placeholder="Job Title">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Department</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="department" class="form-control"
                                                            placeholder="Department">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">WICA</label>
                                                    <div class="col-sm-9">
                                                        <select name="wica" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">University</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="university" class="form-control"
                                                            placeholder="University">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Cost Centre</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="cost_center" class="form-control"
                                                            placeholder="Cost Centre">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Working
                                                        Hour</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="working_hour" class="form-control"
                                                            placeholder="Working Hour">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Start Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="start_date" class="form-control"
                                                            placeholder="Start Date">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Sales
                                                        Period</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="sales" class="form-control"
                                                            placeholder="Sales Period">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Invoice No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="invoice_no" class="form-control"
                                                            placeholder="Invoice No.">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Charge (%)</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="charge" class="form-control"
                                                            placeholder="Charge (%)">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Closed By 1</label>
                                                    <div class="col-sm-9">
                                                        <select name="clods_by_1" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Closed By 2</label>
                                                    <div class="col-sm-9">
                                                        <select name="closed_by_2" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Closed By 3</label>
                                                    <div class="col-sm-9">
                                                        <select name="closed_by_3" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Cut off</label>
                                                    <div class="col-sm-9">
                                                        <select name="cut_off" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                            <option value="">Yes</option>
                                                            <option value="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-info mt-3">Save</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Placement /
                                                        Recruitment Fee</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="recruitment_fee" class="form-control"
                                                            placeholder="Placement / Recruitment Fee">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Admin Fee
                                                        (Daily)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="admin_fee" class="form-control"
                                                            placeholder="Admin Fee (Daily)">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">AR No.</label>
                                                    <div class="col-sm-9">
                                                        <select name="ar_no" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Salary</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="salary" class="form-control" placeholder="Salary">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Daily Rate (Night
                                                        Shift)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="daily_rate" class="form-control"
                                                            placeholder="Daily Rate (Night Shift)">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Programme</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="programme" class="form-control" placeholder="Programme">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Hourly Rate</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="hourly_rate" class="form-control"
                                                            placeholder="Hourly Rate">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Insurance
                                                        Fee</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="insurance" class="form-control"
                                                            placeholder="Insurance Fee">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Team Lead</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="team_lead" class="form-control" placeholder="Team Lead">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Allowance</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="allowance" class="form-control" placeholder="Allowance">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Probation
                                                        Period</label>
                                                    <div class="col-sm-9">
                                                        <select name="probation_period" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">End Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="end_date" class="form-control" placeholder="End Date">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Guarantee
                                                        Period</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="guarantee_period" class="form-control"
                                                            placeholder="Guarantee Period">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">PO No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="po_no" class="form-control" placeholder="PO No">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Contribute
                                                        CPF</label>
                                                    <div class="col-sm-9">
                                                        <select name="contribute" id="" class="form-control">
                                                            <option value="">Yes</option>
                                                            <option value="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Closed Rate
                                                        1</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="closed_rate_1" class="form-control"
                                                            placeholder="Closed Rate 1">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Closed Rate
                                                        2</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="closed_rate_2" class="form-control"
                                                            placeholder="Closed Rate 2">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Closed Rate
                                                        3</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="closed_rate_3" class="form-control"
                                                            placeholder="Closed Rate 3">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Payroll
                                                        Remarks</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="payroll_remarks" rows="2" class="form-control"
                                                            placeholder="PO Remarks"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-lg-12 mt-2">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Salary</th>
                                                    <th>Company</th>
                                                    <th>Comments</th>
                                                    <th>Created By</th>
                                                    <th>Create Time</th>
                                                    <th>Create Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Salary</th>
                                                    <th>Company</th>
                                                    <th>Comments</th>
                                                    <th>Created By</th>
                                                    <th>Create Time</th>
                                                    <th>Create Date</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="working_hour" role="tabpanel">
                                <h5>Create Time Sheet</h5>
                                <form action="">
                                    <div class="row mb-5">
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Time Sheet
                                                        Type</label>
                                                    <div class="col-sm-9">
                                                        <select name="time_sheet" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Schedule
                                                        Type</label>
                                                    <div class="col-sm-9">
                                                        <select name="schedule_type" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Schedule
                                                        Day</label>
                                                    <div class="col-sm-9">
                                                        <select name="schedule_day" id="" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Remarks</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="remarks" rows="2" class="form-control"
                                                            placeholder="Remarks"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h5>Days Setting</h5>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="package_day" class="col-sm-2 control-label">Day</label>
                                                <label for="package_day" class="col-sm-3 control-label">Working Start
                                                    Time</label>
                                                <label for="package_day" class="col-sm-3 control-label">Working End
                                                    Time</label>
                                                <label for="package_day" class="col-sm-2 control-label">Lunch
                                                    Hours</label>
                                                <label for="package_day" class="col-sm-1 control-label">Work</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="row mt-2">
                                                    <label for="package_day"
                                                        class="col-sm-2 control-label">Sunday</label>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_start" class="form-control">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="" class="form-control">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Lunch Hours" readonly>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" name="lunch_hour" placeholder="Lunch Hours">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row mt-2">
                                                    <label for="package_day"
                                                        class="col-sm-2 control-label">Monday</label>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_start" class="form-control">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_end" class="form-control">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Lunch Hours" readonly>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" name="lunch_hour" placeholder="Lunch Hours">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row mt-2">
                                                    <label for="package_day"
                                                        class="col-sm-2 control-label">Tuesday</label>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_start" class="form-control">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_end" class="form-control">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Lunch Hours" readonly>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" name="lunch_hour" placeholder="Lunch Hours">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row mt-2">
                                                    <label for="package_day"
                                                        class="col-sm-2 control-label">Wednesday</label>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_start" class="form-control">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_end" class="form-control">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Lunch Hours" readonly>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" name="lunch_hour" placeholder="Lunch Hours">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row mt-2">
                                                    <label for="package_day"
                                                        class="col-sm-2 control-label">Thursday</label>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_start" class="form-control">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_end" class="form-control">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Lunch Hours" readonly>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" name="lunch_hour" placeholder="Lunch Hours">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row mt-2">
                                                    <label for="package_day"
                                                        class="col-sm-2 control-label">Friday</label>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_start" class="form-control">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_end" class="form-control">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Lunch Hours" readonly>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" name="lunch_hour" placeholder="Lunch Hours">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row mt-2">
                                                    <label for="package_day"
                                                        class="col-sm-2 control-label">Saturday</label>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_start" class="form-control">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="time" name="work_end" class="form-control">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Lunch Hours" readonly>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" name="lunch_hour" placeholder="Lunch Hours">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row mb-3 ms-2 mt-2">
                                <div class="col-sm-9">
                                    <div>
                                        <a href="#" class="btn btn-sm btn-secondary w-md">Back</a>
                                        <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                                        <a href="#" class="btn btn-sm btn-warning w-md">Print</a>
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
    <!-- ckeditor -->
    <script
        src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}">
    </script>

    <!-- init js -->
    <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    @endsection
