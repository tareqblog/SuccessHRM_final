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
                @include('admin.include.errors')
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="row">
                        <div class="col-lg-12">
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
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="genarel_info" role="tabpanel">
                            <form action="{{ route('candidate.update', $candidate->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Candidate
                                                    Code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_code" class="form-control"
                                                        placeholder="Candidate code"
                                                        value="{{ $candidate->candidate_code }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Candidate
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_name" class="form-control"
                                                        placeholder="Candidate name"
                                                        value="{{ $candidate->candidate_name }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Date of
                                                    Birth</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="candidate_birthdate" class="form-control"
                                                        placeholder="Date of Birth"
                                                        value="{{ $candidate->candidate_birthdate }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Race</label>
                                                <div class="col-sm-9">
                                                    <select name="races_id" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="three" class="col-sm-3 col-form-label">Mobile</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="candidate_mobile"
                                                        placeholder="Mobile"
                                                        value="{{ $candidate->candidate_mobile }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="three" class="col-sm-3 col-form-label">Home Tel</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="candidate_home_phone"
                                                        placeholder="Home Tel"
                                                        value="{{ $candidate->candidate_home_phone }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Type Of
                                                    Pass</label>
                                                <div class="col-sm-9">
                                                    <select name="passtypes_id" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="three" class="col-sm-3 col-form-label">Height</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="candidate_height"
                                                        placeholder="Height"
                                                        value="{{ $candidate->candidate_height }}">
                                                </div>
                                            </div>
                                            {{-- <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">SHRC/SRC</label>
                                                <div class="col-sm-9">
                                                    <select  class="form-control" name="src">
                                                        <option value="">Select One</option>
                                                        <option value="">SHRC</option>
                                                        <option value="">SRC</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            {{-- <div class="row mb-4">
                                                <label for="one" class="col-sm-4 col-form-label">Position
                                                    Applied</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="position_applied" class="form-control"
                                                        placeholder="Position Applied">
                                                </div>
                                            </div> --}}
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">NRIC/FIN
                                                    No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_nric" class="form-control"
                                                        placeholder="NRIC/FIN No."
                                                        value="{{ $candidate->candidate_nric }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-9">
                                                    <select name="dbsexes_id" class="form-control">
                                                        <option value="">Select One</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Religion</label>
                                                <div class="col-sm-9">
                                                    <select name="religions_id" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Marital
                                                    Status</label>
                                                <div class="col-sm-9">
                                                    <select name="marital_statuses_id" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-4 col-form-label">Numbers of
                                                    Children</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="children_no" class="form-control"
                                                        placeholder="Numbers of Children"
                                                        value="{{ $candidate->children_no }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="candidate_email" class="form-control"
                                                        placeholder="Email" value="{{ $candidate->candidate_email }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Weight</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_weight" class="form-control"
                                                        placeholder="Weight" {{ $candidate->candidate_weight }}>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Black
                                                    List</label>
                                                <div class="col-sm-9">
                                                    <input type="radio" name="candidate_isBlocked" value="1">
                                                    <label for="yes"
                                                        {{ $candidate->candidate_isBlocked == 1 ? 'selected' : '' }}>Yes</label>
                                                    <input type="radio" name="candidate_isBlocked-list" id="no"
                                                        value="0"
                                                        {{ $candidate->candidate_isBlocked == 0 ? 'selected' : '' }}>
                                                    <label for="no">No</label>
                                                </div>
                                            </div>
                                            <!-- sample modal content -->
                                            {{-- <div id="myModal" class="modal fade" tabindex="-1"
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
                                                                <textarea name="reason_of_blacklist"
                                                                    class="form-control mb-2" rows="4"
                                                                    placeholder="Reason of Blacklist"></textarea>
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-info">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal --> --}}

                                        </div>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="row mb-4">
                                            {{-- <label for="one" class="col-sm-3 col-form-label">User Right</label> --}}
                                            <div class="col-sm-9">
                                                @if($candidate->avatar)
                                                    <img width="200"
                                                        src="{{ asset('storage') }}/{{ $candidate->avatar }}"
                                                        alt="avatar">
                                                @else
                                                    <img src="{{ URL::asset('build/images/avatar.png') }}"
                                                        alt="avatar" class="mb-2">
                                                @endif
                                                <input type="file" name="avatar" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 ms-3 mb-3">
                                        <div>
                                            <a href="{{ route('candidate.index') }}"
                                                class="btn btn-sm btn-secondary w-md">Back</a>
                                            <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                                            <a href="#" class="btn btn-sm btn-warning w-md">Print</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="contact_info" role="tabpanel">
                            <form action="{{ route('candidate.update', $candidate->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <h5>Address Information</h5>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Postal Code
                                                    1</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_postal_code" class="form-control"
                                                        placeholder="Postal Code"
                                                        value="{{ $candidate->candidate_postal_code }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Unit No
                                                    1</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_unit_number" class="form-control"
                                                        placeholder="Unit No"
                                                        value="{{ $candidate->candidate_nite_number }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Address
                                                    1</label>
                                                <div class="col-sm-9">
                                                    <textarea name="candidate_street" rows="2" class="form-control"
                                                        placeholder="Address"> {{ $candidate->candidate_street }} </textarea>
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
                                                    <input type="text" name="candidate_postal_code2"
                                                        class="form-control" placeholder="Postal Code"
                                                        value="{{ $candidate->candidate_postal_code2 }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Unit No
                                                    2</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_unit_number2"
                                                        class="form-control" placeholder="Unit No"
                                                        value="{{ $candidate->candidate_unit_number2 }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Address
                                                    2</label>
                                                <div class="col-sm-9">
                                                    <textarea name="candidate_street2" rows="2" class="form-control"
                                                        placeholder="Address">{{ $candidate->candidate_street2 }}</textarea>
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
                                                    <input type="text" name="candidate_emr_contact" class="form-control"
                                                        placeholder="Contact Person"
                                                        value="{{ $candidate->candidate_emr_contact }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Phone 1</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_emr_phone1" class="form-control"
                                                        placeholder="Phone 1"
                                                        value="{{ $candidate->candidate_emr_phone1 }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea name="candidate_emr_address" rows="2" class="form-control"
                                                        placeholder="Address"> {{ $candidate->candidate_emr_address }} </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Relationship</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_emr_relation"
                                                        class="form-control" placeholder="Relationship"
                                                        value="{{ $candidate->candidate_emr_relation }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Phone 2</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_emr_phone2" class="form-control"
                                                        placeholder="Phone 2"
                                                        value="{{ $candidate->candidate_emr_phone2 }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Remarks</label>
                                                <div class="col-sm-9">
                                                    <textarea name="candidate_emr_remarks" rows="2" class="form-control"
                                                        placeholder="Remarks"> {{ $candidate->candidate_emr_remarks }} </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 ms-3 mb-3">
                                        <div>
                                            <a href="{{ route('candidate.index') }}"
                                                class="btn btn-sm btn-secondary w-md">Back</a>
                                            <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                                            <a href="#" class="btn btn-sm btn-warning w-md">Print</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="bank_info" role="tabpanel">
                            <form action="{{ route('candidate.update', $candidate->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Pay Mode</label>
                                                <div class="col-sm-9">
                                                    <select name="paymodes_id" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                        <option value="1"
                                                            {{ $candidate->paymodes_id == 1 ? 'selected' : '' }}>
                                                            Cash</option>
                                                        <option value="2"
                                                            {{ $candidate->paymodes_id == 1 ? 'selected' : '' }}>
                                                            Cheque
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">GIRO Account
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_bank_acc_title"
                                                        class="form-control" placeholder="GIRO Account Name"
                                                        value="{{ $candidate->candidate_bank_acc_title }}">
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
                                                    <select name="candidate_bank" class="form-control" id="">
                                                        <option value="">Select One</option>
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
                                                    <input type="text" name="candidate_bank_acc_no" class="form-control"
                                                        placeholder="GIRO Account No"
                                                        value="{{ $candidate->candidate_bank_acc_no }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 ms-3 mb-3">
                                        <div>
                                            <a href="{{ route('candidate.index') }}"
                                                class="btn btn-sm btn-secondary w-md">Back</a>
                                            <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                                            <a href="#" class="btn btn-sm btn-warning w-md">Print</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="qualification" role="tabpanel">
                            <form action="{{ route('candidate.update', $candidate->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <h5>Qualification and Skill</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">N-Levels</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="candidate_n_level"
                                                        placeholder="Course"
                                                        value="{{ $candidate->candidate_n_level }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">O-Levels</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_o_level" class="form-control"
                                                        placeholder="Course"
                                                        value="{{ $candidate->candidate_o_level }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">A-Levels</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_a_level" class="form-control"
                                                        placeholder="Course"
                                                        value="{{ $candidate->candidate_a_level }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Diploma</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_diploma" class="form-control"
                                                        placeholder="Course"
                                                        value="{{ $candidate->candidate_diploma }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Degree</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_degree" class="form-control"
                                                        placeholder="Course"
                                                        value="{{ $candidate->candidate_degree }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Other</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_other" class="form-control"
                                                        placeholder="Course"
                                                        value="{{ $candidate->candidate_other }}">
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
                                                <input type="text" name="candidate_written" class="form-control"
                                                    placeholder="eg: English - good"
                                                    value="{{ $candidate->candidate_written }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-3 col-form-label">Spoken</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="candidate_spocken" class="form-control"
                                                    placeholder="eg: English - good"
                                                    {{ $candidate->candidate_spocken }}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 ms-3 mb-3">
                                        <div>
                                            <a href="{{ route('candidate.index') }}"
                                                class="btn btn-sm btn-secondary w-md">Back</a>
                                            <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                                            <a href="#" class="btn btn-sm btn-warning w-md">Print</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="character_referees" role="tabpanel">
                            <form action="{{ route('candidate.update', $candidate->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <h5>Character Referee's</h5>
                                <p>Name 2 persons who are not your relatives</p>
                                <div class="row mb-5">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_referee_name1"
                                                        class="form-control" placeholder="Name"
                                                        value="{{ $candidate->candidate_referee_name1 }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Years
                                                    Known</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_referee_year_know1"
                                                        class="form-control" placeholder="Year"
                                                        value="{{ $candidate->candidate_referee_year_know1 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Occupation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="candidate_referee_occupation1" placeholder="Occupation"
                                                        value="{{ $candidate->candidate_referee_occupation1 }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-4 col-form-label">Contact No /
                                                    Email
                                                    Address</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="candidate_referee_contact1"
                                                        class="form-control" placeholder="Contact No"
                                                        value="{{ $candidate->candidate_referee_contact1 }}">
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
                                                    <input type="text" class="form-control"
                                                        name="candidate_referee_name2" placeholder="Name"
                                                        value="{{ $candidate->candidate_referee_name2 }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Years
                                                    Known</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_referee_year_know2"
                                                        class="form-control" placeholder="Year"
                                                        value="{{ $candidate->candidate_referee_year_know2 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Occupation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="candidate_referee_occupation2"
                                                        class="form-control" placeholder="Occupation"
                                                        value="{{ $candidate->candidate_referee_occupation2 }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-4 col-form-label">Contact No /
                                                    Email
                                                    Address</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="candidate_referee_contact2"
                                                        class="form-control" placeholder="Contact No"
                                                        value="{{ $candidate->candidate_referee_contact2 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 ms-3 mb-3">
                                        <div>
                                            <a href="{{ route('candidate.index') }}"
                                                class="btn btn-sm btn-secondary w-md">Back</a>
                                            <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                                            <a href="#" class="btn btn-sm btn-warning w-md">Print</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="declaration" role="tabpanel">
                            <form action="{{ route('candidate.update', $candidate->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
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
                                                            <input type="radio" name="candidate_dec_bankrupt" value="1"
                                                                {{ $candidate->candidate_dec_bankrupt == 1 ? 'selected' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_bankrupt" value="0"
                                                                {{ $candidate->candidate_dec_bankrupt == 0 ? 'selected' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="candidate_dec_bankrupt_details"
                                                            placeholder="If Yes, Please specify"
                                                            value="{{ $candidate->candidate_dec_bankrupt_details }}">
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
                                                            <input type="radio" name="candidate_dec_physical" value="1"
                                                                {{ $candidate->candidate_dec_physical == 1 ? 'selected' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_physical" value="0"
                                                                {{ $candidate->candidate_dec_physical == 0 ? 'selected' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="candidate_dec_physical_details"
                                                            placeholder="If Yes, Please specify"
                                                            value="{{ $candidate->candidate_dec_physical_details }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="declaration_bankrupt" class=" control-label">3. Are you
                                                    currently undergoing long-term medical treatment?</label>
                                                <div class="radio d-flex">
                                                    <div class="col-sm-3">
                                                        <label>
                                                            <input type="radio" name="candidate_dec_lt_medical"
                                                                value="1"
                                                                {{ $candidate->candidate_dec_lt_medical == 1 ? 'selected' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_lt_medical"
                                                                value="0"
                                                                {{ $candidate->candidate_dec_lt_medical == 0 ? 'selected' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="candidate_dec_lt_medical_details"
                                                            value="{{ $candidate->candidate_dec_lt_medical_details }}"
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
                                                            <input type="radio" name="candidate_dec_law" value="1"
                                                                {{ $candidate->candidate_dec_law == 1 ? 'selected' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_law" value="0"
                                                                {{ $candidate->candidate_dec_law == 0 ? 'selected' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="candidate_dec_law_details"
                                                            value="{{ $candidate->candidate_dec_law_details }}"
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
                                                            <input type="radio" name="candidate_dec_warning" value="1"
                                                                {{ $candidate->candidate_dec_warning == 1 ? 'selected' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_warning" value="0"
                                                                {{ $candidate->candidate_dec_warning == 0 ? 'selected' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="candidate_dec_warning_details"
                                                            value="{{ $candidate->candidate_dec_warning_details }}"
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
                                                            <input type="radio" name="candidate_dec_applied" value="1"
                                                                {{ $candidate->candidate_dec_applied == 1 ? 'selected' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_applied" value="0"
                                                                {{ $candidate->candidate_dec_applied == 0 ? 'selected' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="db_specify"
                                                            name="candidate_dec_applied_details"
                                                            value="{{ $candidate->candidate_dec_applied_details }}"
                                                            placeholder="If Yes, Please specify">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-9 ms-3 mb-3">
                                        <div>
                                            <a href="{{ route('candidate.index') }}"
                                                class="btn btn-sm btn-secondary w-md">Back</a>
                                            <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                                            <a href="#" class="btn btn-sm btn-warning w-md">Print</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="terms_conditions" role="tabpanel">
                            <form action="{{ route('candidate.update', $candidate->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
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
                                            coming.
                                        </p>
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
                                                <label for="one" class="col-sm-2 col-form-label">Join
                                                    Date</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" name="candidate_joindate"
                                                        placeholder="Join Date"
                                                        value="{{ $candidate->candidate_joindate }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-9 ms-3 mb-3">
                                        <div>
                                            <a href="{{ route('candidate.index') }}"
                                                class="btn btn-sm btn-secondary w-md">Back</a>
                                            <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                                            <a href="#" class="btn btn-sm btn-warning w-md">Print</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- Upload Resume tab --}}
                        <div class="tab-pane" id="upload_resume" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Upload Resume</h4>
                                        <div class="text-end">
                                            <a data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-create"
                                                class="btn btn-sm btn-info">Upload New Resume</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-2">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Main</th>
                                                <th>Upload By</th>
                                                <th>File Name</th>
                                                <th>Document Type</th>
                                                <th>Upload Date & Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($client_files as $file)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td></td>
                                                    <td>
                                                        @if($file->created_by)
                                                            {{ \App\Models\Employee::where(['id' => $file->created_by])->pluck('employee_code')->first() }}
                                                        @else
                                                            User Not Found
                                                        @endif
                                                    </td>
                                                    <td>{{ $file->file_type->uploadfiletype_code }}</td>
                                                    <td>{{ $file->file_path }}</td>
                                                    <td>{{ $file->created_at }}</td>
                                                    <td style="display: flex;">
                                                        <a href="{{ asset('storage') }}/{{ $file->file_path }}"
                                                            class="btn btn-info btn-sm me-3" download>Donwload</a>
                                                        <form
                                                            action="{{ route('candidate.file.delete', $file->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this item?')"
                                                                type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="50">No data found !</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="upload_file" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Upload File</h4>
                                        <div class="text-end">
                                            <a data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-create"
                                                class="btn btn-sm btn-info">Upload New File</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-2">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Upload By</th>
                                                <th>Document Type</th>
                                                <th>File Name</th>
                                                <th>Upload Date & Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($client_files as $file)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        @if($file->created_by)
                                                            {{ \App\Models\Employee::where(['id' => $file->created_by])->pluck('employee_code')->first() }}
                                                        @else
                                                            User Not Found
                                                        @endif
                                                    </td>
                                                    <td>{{ $file->file_type->uploadfiletype_code }}</td>
                                                    <td>{{ $file->file_path }}</td>
                                                    <td>{{ $file->created_at }}</td>
                                                    <td style="display: flex;">
                                                        <a href="{{ asset('storage') }}/{{ $file->file_path }}"
                                                            class="btn btn-info btn-sm me-3" download>Donwload</a>
                                                        <form
                                                            action="{{ route('candidate.file.delete', $file->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this item?')"
                                                                type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="50">No data found !</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <hr class="mt-3">
                            </div>
                        </div>
                        <div class="tab-pane" id="remark" role="tabpanel">
                            <form action="{{ route('candidate.remark', $candidate->id) }}"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Create Remarks</h5>
                                        <p>Name: {{ $candidate->candidate_name }}</p>
                                        <p>NRIC: {{ $candidate->candidate_nric }}</p>

                                        <div class="row mb-4">
                                            <input type="hidden" value="{{ $candidate->id }}" name="candidate_id">
                                            <label for="one" class="col-sm-2 col-form-label">Remark Type</label>
                                            <div class="col-sm-9">
                                                <select name="remarkstype_id" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach($remarks_type as $type)
                                                        <option value="{{ $type->id }}">
                                                            {{ $type->remarkstype_code }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-2 col-form-label">Notice</label>
                                            <div class="col-sm-9">
                                                <select name="isNotice" class="form-control">
                                                    <option value="">Select One</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-1 col-form-label">Remark Type</label>
                                            <div class="col-sm-8">
                                                <textarea name="remarks" id="ckeditor-classic"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-info">Save</button>
                                    </div>

                                </div>
                            </form>
                            <div class="row">
                                <div class="col-lg-12 mt-2">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Assaign</th>
                                                <th>Remarks Type</th>
                                                <th>Comments</th>
                                                <th>Created By</th>
                                                <th>Created Time</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($client_remarks as $remark)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $remark->assaign->name }}</td>
                                                    <td>{{ $remark->remarksType->remarkstype_code }}</td>
                                                    <td>{!! $remark->remarks !!}</td>
                                                    <td>{{ $remark->assaign->name }}</td>
                                                    <td>{{ $remark->created_at->format('H:i:s') }}
                                                    </td>
                                                    <td>{{ $remark->created_at->format('d-M-y') }}
                                                    </td>
                                                    <td style="display: flex;">
                                                        <a href="#" class="btn btn-info btn-sm me-3" download>Edit</a>
                                                        <form
                                                            action="{{ route('candidate.remark.delete', $remark->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this item?')"
                                                                type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="50">No data found !</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <hr class="mt-3">
                            </div>
                        </div>

                        <div class="tab-pane" id="payroll" role="tabpanel">
                            <h5>Create Payroll</h5>
                            <form action="{{ route('candidate.payroll', $candidate->id) }}"
                                method="POST">
                                @csrf
                                <div class="row mb-5">
                                    <div class="col-lg-12">
                                        <label for="one" class="col-form-label">Name:
                                            {{ $candidate->candidate_name }}</label>
                                        <br>
                                        <label for="one" class="col-form-label">NRIC:
                                            {{ $candidate->candidate_nric }}</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                                <label for="one" class="col-sm-3 col-form-label">Job Type <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select name="job_type" class="form-control">
                                                        <option value="">Select One</option>
                                                        @foreach($job_types as $job)
                                                            <option value="{{ $job->id }}"> {{ $job->jobtype_code }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Admin Fee
                                                    (Monthly)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="admin_fee_monthly" class="form-control"
                                                        placeholder="Admin Fee">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Client
                                                    Company<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select name="client_company" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                        @foreach($clients as $client)
                                                            <option value="{{ $client->id }}">
                                                                {{ $client->client_name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Invoice
                                                    Rate</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="invoice_rate" class="form-control"
                                                        placeholder="Invoice Rate">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Daily
                                                    Rate</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="daily_rate" class="form-control"
                                                        placeholder="Daily Rate">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Job
                                                    Title <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="job_title" class="form-control"
                                                        placeholder="Job Title">
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
                                                        <option value="1">1</option>
                                                        <option value="0.3">0.3</option>
                                                        <option value="Fixed">Fixed</option>
                                                        <option value="Others">Others</option>
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
                                                <label for="one" class="col-sm-3 col-form-label">Cost
                                                    Centre</label>
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
                                                <label for="one" class="col-sm-3 col-form-label">Start
                                                    Date <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="start_date" class="form-control"
                                                        placeholder="Start Date">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Sales
                                                    Period</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="sales_period" class="form-control"
                                                        placeholder="Sales Period">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Invoice
                                                    No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="invoice_no" class="form-control"
                                                        placeholder="Invoice No.">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Charge
                                                    (%)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="charge" class="form-control"
                                                        placeholder="Charge (%)">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Closed By
                                                    1</label>
                                                <div class="col-sm-9">
                                                    <select name="clods_by1" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Closed By
                                                    2</label>
                                                <div class="col-sm-9">
                                                    <select name="closed_by2" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Closed By
                                                    3</label>
                                                <div class="col-sm-9">
                                                    <select name="closed_by3" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Cut
                                                    off</label>
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
                                                    <input type="text" name="admin_fee_daily" class="form-control"
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
                                                    <input type="text" name="salary" class="form-control"
                                                        placeholder="Salary">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Daily Rate
                                                    (Night
                                                    Shift)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="daily_rate_night_shift"
                                                        class="form-control" placeholder="Daily Rate (Night Shift)">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Programme</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="programme" class="form-control"
                                                        placeholder="Programme">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Hourly
                                                    Rate</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="hourly_rate" class="form-control"
                                                        placeholder="Hourly Rate">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Insurance
                                                    Fee</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="insurance_fee" class="form-control"
                                                        placeholder="Insurance Fee">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Team
                                                    Lead</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="team_lead" class="form-control"
                                                        placeholder="Team Lead">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Allowance</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="allowance" class="form-control"
                                                        placeholder="Allowance">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Probation
                                                    Period</label>
                                                <div class="col-sm-9">
                                                    <select name="probation_period" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                        <option value="1 Month">1 Month</option>
                                                        <option value="2 Month">2 Month</option>
                                                        <option value="3 Month">3 Month</option>
                                                        <option value="4 Month">4 Month</option>
                                                        <option value="5 Month">5 Month</option>
                                                        <option value="6 Month">6 Month</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">End
                                                    Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="end_date" class="form-control"
                                                        placeholder="End Date">
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
                                                    <input type="text" name="po_no" class="form-control"
                                                        placeholder="PO No">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Contribute
                                                    CPF</label>
                                                <div class="col-sm-9">
                                                    <select name="contribute_cpf" id="" class="form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Closed Rate
                                                    1</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="closed_rate1" class="form-control"
                                                        placeholder="Closed Rate 1">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Closed Rate
                                                    2</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="closed_rate2" class="form-control"
                                                        placeholder="Closed Rate 2">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Closed Rate
                                                    3</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="closed_rate3" class="form-control"
                                                        placeholder="Closed Rate 3">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Payroll
                                                    Remarks</label>
                                                <div class="col-sm-9">
                                                    <textarea name="payroll_remark" rows="2" class="form-control"
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
                                                <th>Create Time</th>
                                                <th>Create Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($payrolls as $payroll)

                                                <tr>
                                                    <td>{{ $loop->index+1 }} </td>
                                                    <td>{{ $payroll->salary }} </td>
                                                    <td>{{ $payroll->company->client_name }} </td>
                                                    <td>{{ $payroll->payroll_remark }} </td>
                                                    <td>{{ $payroll->created_at->format('H:i:s') }}
                                                    </td>
                                                    <td>{{ $payroll->created_at->format('d-M-y') }}
                                                    </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('candidate.payroll.delete', $payroll->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this item?')"
                                                                type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="50" class="text-warning text-center">
                                                        No data found!
                                                    </td>
                                                </tr>
                                            @endforelse
                                            <tr>
                                            </tr>
                                        </tbody>
                                        {{-- <tfoot>
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
                                            </tfoot> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->

                <!--  Create modal example -->
                <div class="modal fade bs-example-modal-lg-create" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Upload File</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form
                                    action="{{ route('candidate.file.upload', $candidate->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="file_type_for" value="1" class="form-control">
                                    <div class="mt-5 mt-lg-4 mt-xl-0">
                                        <div class="row mb-4">
                                            <label for="file_path" class="col-sm-3 col-form-label">Upload
                                                File</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="file_path" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="twente_four" class="col-sm-3 col-form-label">File
                                                Type</label>
                                            <div class="col-sm-9">
                                                <select name="file_type_id" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach($fileTypes as $file)
                                                        <option value="{{ $file->id }}">
                                                            {{ $file->uploadfiletype_code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!--  Edit modal example -->
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

    <script language="javascript" type="text/javascript">
        if (window.location.hash) { // Check if url hash is not empty
            var hash = window.location.hash; // nav-y1
            document.querySelector('[href="' + hash + '"]').click();
        }
    </script>
    @endsection
