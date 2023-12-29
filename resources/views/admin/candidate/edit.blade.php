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
                        <a href="{{route('candidate.create')}}" class="btn btn-sm btn-success">Create New</a>
                        <a href="{{route('candidate.index')}}" class="btn btn-sm btn-success">Search</a>
                    </div>
                </div>
                @include('admin.include.errors')
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#General_info" role="tab">
                                        <span class="d-sm-block">General Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#contact_info" role="tab">
                                        <span class="d-sm-block">Contact Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#bank_info" role="tab">
                                        <span class="d-sm-block">Bank Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#qualification" role="tab">
                                        <span class="d-sm-block">Qualification</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#family" role="tab">
                                        <span class="d-sm-block">Family</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#character_referees" role="tab">
                                        <span class="d-sm-block">Character Referee's</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#declaration" role="tab">
                                        <span class="d-sm-block">Declaration</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#terms_conditions" role="tab">
                                        <span class="d-sm-block">Terms & Conditions</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#upload_resume" role="tab">
                                        <span class="d-sm-block">Upload Resume</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#upload_file" role="tab">
                                        <span class="d-sm-block">Upload File</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#remark" role="tab">
                                        <span class="d-sm-block">Remark</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#payroll" role="tab">
                                        <span class="d-sm-block">Payroll</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#working_hour" role="tab">
                                        <span class="d-sm-block">Working Hour</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="General_info" role="tabpanel">
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
                                                        @foreach ($race_data as $row)
                                                            <option value="{{ $row->id }}"
                                                                {{ $row->id == old('races_id', $candidate->races_id) ? 'selected' : '' }}>
                                                                {{ old('races_id') . $row->race_code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Nationality</label>
                                                <div class="col-sm-9">
                                                    <select name="nationality_id" class="form-control" id="mySelect">
                                                        <option value="">Select One</option>
                                                        @foreach($nationality as $nation)
                                                            <option value="{{ $nation->id }}" {{ $nation->id == old('nationality_id', $candidate->nationality_id) ? 'selected' : '' }}>
                                                                {{ $nation->en_nationality }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4" id="myNationality" style="display: none;">
                                                <label for="two" class="col-sm-3 col-form-label">Date of
                                                    issue</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="nationality_date_of_issue"
                                                        class="form-control">
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
                                                        @foreach ($passtype_data as $row)
                                                            <option value="{{ $row->id }}"
                                                                {{ $row->id==old('passtype_id',$candidate->passtypes_id ) ? 'selected' : '' }}>
                                                                {{ $row->passtype_code }}</option>
                                                        @endforeach
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
                                                        <option value="1" {{ old('dbsexes_id', $candidate->dbsexes_id)==1 ? 'selected' : '' }} >Male</option>
                                                        <option value="2" {{ old('dbsexes_id', $candidate->dbsexes_id)==2 ? 'selected' : '' }} >Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Religion</label>
                                                <div class="col-sm-9">
                                                    <select name="religions_id" class="form-control">
                                                        <option value="">Select One</option>
                                                        @foreach ($religion_data as $row)
                                                            <option value="{{ $row->id }}"
                                                                {{ $row->id == old('religions_id', $candidate->religions_id) ? 'selected' : '' }}>
                                                                {{ $row->religion_code }}</option>
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
                                                        @foreach ($marital_data as $row)
                                                            <option value="{{ $row->id }}"
                                                                {{ $row->id==old('marital_statuses_id',$candidate->marital_statuses_id ) ? 'selected' : '' }}>
                                                                {{ $row->marital_statuses_code }}</option>
                                                        @endforeach
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
                                                        placeholder="Weight"
                                                        value="{{ $candidate->candidate_weight }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="four" class="col-sm-3 col-form-label">Black
                                                    List</label>
                                                <div class="col-sm-9">
                                                    <input type="radio" name="candidate_isBlocked" value="1"
                                                    {{ $candidate->candidate_isBlocked == 1 ? 'checked' : '' }}>
                                                    <label for="yes">Yes</label>
                                                    <input type="radio" name="candidate_isBlocked" id="no" value="0"
                                                        {{ $candidate->candidate_isBlocked == 0 ? 'checked' : '' }}>
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
                                                        alt="avatar" id="avatar-preview">
                                                @else
                                                    <img width="200" src="{{ URL::asset('build/images/avatar.png') }}"
                                                        alt="avatars" id="avatar-preview" class="mb-2">
                                                @endif
                                                <input type="file" name="avatar" id="avatar-input" class="form-control" accept="images">


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
                                                        value="{{ $candidate->candidate_unit_number }}">
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
                                                            {{ $candidate->paymodes_id == 2 ? 'selected' : '' }}>
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
                                                <div class="col-sm-9">
                                                    <select name="candidate_bank" class="form-control" id="">
                                                        <option value="">Select One</option>
                                                        @foreach ($Paybanks as $data)
                                                            <option value="{{ $data->id }}"
                                                                {{ old('candidate_bank', $candidate->candidate_bank) == $data->id ? 'selected' : '' }}>
                                                                {{ $data->Paybank_code }} </option>
                                                        @endforeach

                                                    </select>
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
                                                    value="{{ $candidate->candidate_spocken }}">
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

                        <div class="tab-pane" id="family" role="tabpanel">
                            <h5>Create Family Background</h5>
                            <form action="{{ route('candidate.family', $candidate->id) }}"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="hidden" value="{{ $candidate->id }}" name="candidate_id">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Relationship</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="relationship" name="one"
                                                        class="form-control" placeholder="Relationship">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Contact
                                                    No</label>
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
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-info btn-sm">Save</button>
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
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Relationship</th>
                                                <th>Contact</th>
                                                <th>Occuption</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($families as $family)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }} </td>
                                                    <td>{{ $family->name }} </td>
                                                    <td>{{ $family->age }} </td>
                                                    <td>{{ $family->relationship }} </td>
                                                    <td>{{ $family->contact_no }} </td>
                                                    <td>{{ $family->occupation }} </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('candidate.family.delete', $family->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this item?')"
                                                                type="submit"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center text-warning" colspan="50">No data found!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                                            <div class="form-group mb-2" id="bankrupt">
                                                <label for="declaration_bankrupt" class=" control-label">1. Are
                                                    you / Have you ever been an undischarged bankrupt?</label>
                                                <div class="radio d-flex">
                                                    <div class="col-sm-3">
                                                        <label>
                                                            <input type="radio" name="candidate_dec_bankrupt" value="1"
                                                                {{ $candidate->candidate_dec_bankrupt == 1 ? 'checked' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_bankrupt" value="0"
                                                                {{ $candidate->candidate_dec_bankrupt == 0 ? 'checked' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6" id="candidate_dec_bankrupt_details"
                                                        style="display: none;">
                                                        <input type="text" class="form-control"
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
                                                                {{ $candidate->candidate_dec_physical == 1 ? 'checked' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_physical" value="0"
                                                                {{ $candidate->candidate_dec_physical == 0 ? 'checked' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control"
                                                            id="candidate_dec_physical_details"
                                                            name="candidate_dec_physical_details"
                                                            placeholder="If Yes, Please specify"
                                                            value="{{ $candidate->candidate_dec_physical_details }}"
                                                            id="candidate_dec_physical_details" style="display: none;">
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
                                                                {{ $candidate->candidate_dec_lt_medical == 1 ? 'checked' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_lt_medical"
                                                                value="0"
                                                                {{ $candidate->candidate_dec_lt_medical == 0 ? 'checked' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control"
                                                            id="candidate_dec_lt_medical_details"
                                                            name="candidate_dec_lt_medical_details"
                                                            value="{{ $candidate->candidate_dec_lt_medical_details }}"
                                                            placeholder="If Yes, Please specify" style="display: none;">
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
                                                                {{ $candidate->candidate_dec_law == 1 ? 'checked' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_law" value="0"
                                                                {{ $candidate->candidate_dec_law == 0 ? 'checked' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control"
                                                            id="candidate_dec_law_details"
                                                            name="candidate_dec_law_details"
                                                            value="{{ $candidate->candidate_dec_law_details }}"
                                                            placeholder="If Yes, Please specify" style="display: none;">
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
                                                                {{ $candidate->candidate_dec_warning == 1 ? 'checked' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_warning" value="0"
                                                                {{ $candidate->candidate_dec_warning == 0 ? 'checked' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control"
                                                            id="candidate_dec_warning_details"
                                                            name="candidate_dec_warning_details"
                                                            value="{{ $candidate->candidate_dec_warning_details }}"
                                                            placeholder="If Yes, Please specify" style="display: none;">
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
                                                                {{ $candidate->candidate_dec_applied == 1 ? 'checked' : '' }}>Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="candidate_dec_applied" value="0"
                                                                {{ $candidate->candidate_dec_applied == 0 ? 'checked' : '' }}>No
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control"
                                                            id="candidate_dec_applied_details"
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
                                                <label for="one" class="col-sm-3 col-form-label">Join
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
                                            <a data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-lg-create-resume"
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
                                                <th>Upload Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($candidate_resume as $resume)
                                                <tr>
                                                    <td>
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td>
                                                        @if ($resume->isMain == 0 )
                                                            <input type="radio" name="isMain" {{ $resume->isMain == 1 ? 'checked' : '' }} class="isMainRadio" data-candidate-id="{{$resume->id}}">
                                                            @else
                                                            <input type="radio" name="isMain" {{ $resume->isMain == 1 ? 'checked' : '' }} >
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $resume->modify_name->name }}
                                                    </td>
                                                    <td>
                                                        {{ $resume->resume_name }}
                                                    </td>
                                                    <td>
                                                        {{ $resume->updated_at }}
                                                    </td>
                                                    <td style="display: flex;">
                                                        <a href="{{ asset('storage') }}/{{ $resume->resume_file_path }}"
                                                            class="btn btn-info btn-sm me-3" download>Donwload</a>
                                                        <form
                                                            action="{{ route('candidate.resume.delete', $resume->id) }}"
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
                                            <label for="one" class="col-sm-3 col-form-label">Remark Type</label>
                                            <div class="col-sm-9">
                                                <select name="remarkstype_id" class="form-control" id="remark_type">
                                                    <option value="">Select One</option>
                                                    @foreach($remarks_type as $type)
                                                        <option value="{{ $type->id }}">
                                                            {{ $type->remarkstype_code }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="AssignToClient" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Client
                                                Company</label>
                                            <div class="col-sm-9">
                                                <select name="Assign_client_company" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($clients as $client)
                                                        <option value="{{$client->id}}">{{$client->company_name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="interviewTime" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Interview
                                                Time</label>
                                            <div class="col-sm-9">
                                                <input type="time" class="form-control" name="interview_time">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="interviewCompany" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Interview Company
                                                <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="interview_company" id="" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($clients as $client)
                                                    <option value="{{$client->id}}"> {{$client->company_name}} </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row mb-4" id="expectedSalary" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Expected
                                                Salary</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="interview_expected_salary">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="interviewPosition" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Interview
                                                Position <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="interview_position">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="receivedJobOffer" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Received Job
                                                Offer</label>
                                            <div class="col-sm-9">
                                                <select name="interview_received_job_offer" class="form-control">
                                                    <option value="pending">Pending</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4" id="shortlistClientCompany" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Client Company <span class="text-danger">*</span> </label>
                                            <div class="col-sm-9">
                                                <select name="client_company" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($clients as $client)
                                                        <option value="{{$client->id}}">{{$client->client_name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistDepartment" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Department</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="shortlistDepartment">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistPlacement" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Placement / Recruitment Fee </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="shortlistPlacement">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistJobTitle" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Job Title <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="shortlistJobTitle">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistJobType" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Job Type <span class="text-danger">*</span> </label>
                                            <div class="col-sm-9">
                                                <select name="shortlistJobType" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($job_types as $type)
                                                        <option value="{{$type->id}}">{{$type->jobtype_code}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistProbationPeriod" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Probation Period</label>
                                            <div class="col-sm-9">
                                                <select name="shortlistProbationPeriod" class="form-control">
                                                    <option value="">Select One</option>
                                                    <option value="0">No Probation</option>
                                                    <option value="1">1 Month</option>
                                                    <option value="2">2 Months</option>
                                                    <option value="3">3 Months</option>
                                                    <option value="4">4 Months</option>
                                                    <option value="5">5 Months</option>
                                                    <option value="6">6 Months</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistContractSigningDate" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Contract Signing
                                                Date <span class="text-danger"></span></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="shortlistContractSigningDate">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistEmailNoticeDate" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Email Notice Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="shortlistEmailNoticeDate">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="interviewEmailNoticeDate" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Email Notice Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="interviewEmailNoticeDate">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-3 col-form-label">Notice</label>
                                            <div class="col-sm-9">
                                                <select name="isNotice" class="form-control">
                                                    <option value="">Select One</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div style="margin-top: 100px;"></div>
                                        <div class="row mb-4" id="AssignToManager" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Assign To <span
                                                    class="text-danger">*</span> </label>
                                            <div class="col-sm-9">
                                                <select name="Assign_to_manager" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}"> {{$user->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4" id="clientArNo" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">AR No</label>
                                            <div class="col-sm-9">
                                                <select name="client_ar_no" id="" class="form-control">
                                                    <option value="0">Select On</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistSalary" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Salary <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="shortlistSalary">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistArNo" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">AR No</label>
                                            <div class="col-sm-9">
                                                <select name="shortlistArNo" class="form-control">
                                                    <option value="">Select One</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistHourlyRate" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Hourly
                                                Rate</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="shortlistHourlyRate">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistAdminFee" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Admin Fee</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="shortlistAdminFee">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistStartDate" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Start Date <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="shortlistStartDate">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistContractEndDate" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Contract End
                                                Date <span class="text-danger"></span></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="shortlistContractEndDate">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistReminderPeriod" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Reminder
                                                Period <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="shortlistReminderPeriod" class="form-control">
                                                    <option value="1 Week Before">1 Week Before</option>
                                                    <option value="2 Week Before">2 Week Before</option>
                                                    <option value="3 Week Before">3 Week Before</option>
                                                    <option value="4 Week Before">4 Week Before</option>
                                                    <option value="5 Week Before">5 Week Before</option>
                                                    <option value="6 Week Before">6 Week Before</option>
                                                    <option value="7 Week Before">7 Week Before</option>
                                                    <option value="8 Week Before">8 Week Before</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistContractSigningTime" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Contract Signing
                                                Time <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="time" class="form-control" name="shortlistContractSigningTime">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistLastDay" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Last Day</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="shortlistLastDay">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="shortlistEmailNoticeTime" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Email Notice
                                                Time</label>
                                            <div class="col-sm-9">
                                                <input type="time" class="form-control" name="shortlistEmailNoticeTime">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="AssignToTeamLeader" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Assign To <span
                                                    class="text-danger">*</span> </label>
                                            <div class="col-sm-9">
                                                <select name="team_leader" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="AssignToRC" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Assign To <span
                                                    class="text-danger">*</span> </label>
                                            <div class="col-sm-9">
                                                <select name="rc" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row mb-4" id="interviewDate" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Interview
                                                Date<span class="text-danger">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="interview_date">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="interviewBy" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Interview
                                                By</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="interview_by">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="jobOfferSalary" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Jobs Offer
                                                Salary</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="inteview_job_offer_salary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="attendInterview" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Attend
                                                Interview</label>
                                            <div class="col-sm-9">
                                                <select name="attendInterview" class="form-control">
                                                    <option value="pending">Pending</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="availableDate" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Available
                                                Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="available_date">
                                            </div>
                                        </div>
                                        <div class="row mb-4" id="emailNoticeTime" style="display: none;">
                                            <label for="one" class="col-sm-3 col-form-label">Email Notice
                                                Time</label>
                                            <div class="col-sm-9">
                                                <input type="time" name="interviewEmailNoticeTime" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row mb-4">
                                            <label for="one" class="col-sm-2 col-form-label">Remark</label>
                                            <div class="col-sm-10">
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
                                                <th>Assign</th>
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
                                                    <td>{{ $remark->Assign->name }}</td>
                                                    <td>{{ $remark->remarksType->remarkstype_code }}</td>
                                                    <td>{!! $remark->remarks !!}</td>
                                                    <td>{{ $remark->Assign->name }}</td>
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
                                        <label for="one" class="col-form-label"><b>Name :
                                            {{ $candidate->candidate_name }}</b></label>
                                        <br>
                                        <label for="one" class="col-form-label"><b>NRIC:
                                            {{ $candidate->candidate_nric }}</b></label>
                                    </div>
                                    <div class="col-lg-12 mt-5 mt-lg-4 mt-xl-0 row">
                                            <div class="row mb-4 col-lg-6">
                                                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                                <label for="one" class="col-sm-3 col-form-label">Job Type <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select name="job_type" class="form-control" id="jobTypes">
                                                        <option value="">Select One</option>
                                                        @foreach($job_types as $job)
                                                            <option value="{{ $job->id }}">
                                                                {{ $job->jobtype_code }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="recruitmentFee">
                                                <label for="one" class="col-sm-3 col-form-label">Placement /
                                                    Recruitment Fee</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="recruitment_fee" class="form-control"
                                                        placeholder="Placement / Recruitment Fee">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="adminFeeMonthly">
                                                <label for="one" class="col-sm-3 col-form-label">Admin Fee
                                                    (Monthly)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="admin_fee_monthly" class="form-control"
                                                        placeholder="Admin Fee">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="adminFeeDaily">
                                                <label for="one" class="col-sm-3 col-form-label">Admin Fee
                                                    (Daily)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="admin_fee_daily" class="form-control"
                                                        placeholder="Admin Fee (Daily)">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="clientCompany">
                                                <label for="one" class="col-sm-3 col-form-label">Client
                                                    Company<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select name="client_company" class="form-control">
                                                        <option value="">Select One</option>
                                                        @foreach($clients as $client)
                                                            <option value="{{ $client->id }}">
                                                                {{ $client->client_name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="arNo">
                                                <label for="one" class="col-sm-3 col-form-label">AR No.</label>
                                                <div class="col-sm-9">
                                                    <select name="ar_no" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="invoiceRate">
                                                <label for="one" class="col-sm-3 col-form-label">Invoice
                                                    Rate</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="invoice_rate" class="form-control"
                                                        placeholder="Invoice Rate">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="salary">
                                                <label for="one" class="col-sm-3 col-form-label">Salary</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="salary" class="form-control"
                                                        placeholder="Salary">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="dailyRate">
                                                <label for="one" class="col-sm-3 col-form-label">Daily
                                                    Rate</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="daily_rate" class="form-control"
                                                        placeholder="Daily Rate">
                                                </div>
                                            </div>

                                            <div class="row mb-4 col-lg-6" id="dailyRateNightShift">
                                                <label for="one" class="col-sm-3 col-form-label">Daily Rate
                                                    (Night
                                                    Shift)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="daily_rate_night_shift"
                                                        class="form-control" placeholder="Daily Rate (Night Shift)">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="jobTitle">
                                                <label for="one" class="col-sm-3 col-form-label">Job
                                                    Title <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="job_title" class="form-control"
                                                        placeholder="Job Title">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="programme">
                                                <label for="one" class="col-sm-3 col-form-label">Programme</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="programme" class="form-control"
                                                        placeholder="Programme">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="department">
                                                <label for="one" class="col-sm-3 col-form-label">Department</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="department" class="form-control"
                                                        placeholder="Department">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="hourlyRate">
                                                <label for="one" class="col-sm-3 col-form-label">Hourly
                                                    Rate</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="hourly_rate" class="form-control"
                                                        placeholder="Hourly Rate">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="wica">
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
                                            <div class="row mb-4 col-lg-6" id="insuranceFee">
                                                <label for="one" class="col-sm-3 col-form-label">Insurance
                                                    Fee</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="insurance_fee" class="form-control"
                                                        placeholder="Insurance Fee">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="university">
                                                <label for="one" class="col-sm-3 col-form-label">University</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="university" class="form-control"
                                                        placeholder="University">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="teamLead">
                                                <label for="one" class="col-sm-3 col-form-label">Team
                                                    Lead</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="team_lead" class="form-control"
                                                        placeholder="Team Lead">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="costCenter">
                                                <label for="one" class="col-sm-3 col-form-label">Cost
                                                    Centre</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="cost_center" class="form-control"
                                                        placeholder="Cost Centre">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="allowance">
                                                <label for="one" class="col-sm-3 col-form-label">Allowance</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="allowance" class="form-control"
                                                        placeholder="Allowance">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="workingHour">
                                                <label for="one" class="col-sm-3 col-form-label">Working
                                                    Hour</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="working_hour" class="form-control"
                                                        placeholder="Working Hour">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="probationPeriod">
                                                <label for="one" class="col-sm-3 col-form-label">Probation
                                                    Period</label>
                                                <div class="col-sm-9">
                                                    <select name="probation_period" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                        <option value="0">No Probation</option>
                                                        <option value="1">1 Month</option>
                                                        <option value="2">2 Month</option>
                                                        <option value="3">3 Month</option>
                                                        <option value="4">4 Month</option>
                                                        <option value="5">5 Month</option>
                                                        <option value="6">6 Month</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="startDate">
                                                <label for="one" class="col-sm-3 col-form-label">Start
                                                    Date <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="start_date" class="form-control"
                                                        placeholder="Start Date">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="endDate">
                                                <label for="one" class="col-sm-3 col-form-label">End
                                                    Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="end_date" class="form-control"
                                                        placeholder="End Date">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="salesPeriod">
                                                <label for="one" class="col-sm-3 col-form-label">Sales
                                                    Period</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="sales_period" class="form-control"
                                                        placeholder="Sales Period">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="guaranteePeriod">
                                                <label for="one" class="col-sm-3 col-form-label">Guarantee
                                                    Period</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="guarantee_period" class="form-control"
                                                        placeholder="Guarantee Period">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="invoiceNo">
                                                <label for="one" class="col-sm-3 col-form-label">Invoice
                                                    No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="invoice_no" class="form-control"
                                                        placeholder="Invoice No.">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="poNo">
                                                <label for="one" class="col-sm-3 col-form-label">PO No</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="po_no" class="form-control"
                                                        placeholder="PO No">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="charge">
                                                <label for="one" class="col-sm-3 col-form-label">Charge
                                                    (%)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="charge" class="form-control"
                                                        placeholder="Charge (%)">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="contributeCpf">
                                                <label for="one" class="col-sm-3 col-form-label">Contribute
                                                    CPF</label>
                                                <div class="col-sm-9">
                                                    <select name="contribute_cpf" id="" class="form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="closeBy1">
                                                <label for="one" class="col-sm-3 col-form-label">Closed By
                                                    1</label>
                                                <div class="col-sm-9">
                                                    <select name="close_by1" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="closeRate1">
                                                <label for="one" class="col-sm-3 col-form-label">Closed Rate
                                                    1</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="close_rate1" class="form-control"
                                                        placeholder="Closed Rate 1">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="closeBy2">
                                                <label for="one" class="col-sm-3 col-form-label">Closed By
                                                    2</label>
                                                <div class="col-sm-9">
                                                    <select name="close_by2" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="closeRate2">
                                                <label for="one" class="col-sm-3 col-form-label">Closed Rate
                                                    2</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="close_rate2" class="form-control"
                                                        placeholder="Closed Rate 2">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="closeBy3">
                                                <label for="one" class="col-sm-3 col-form-label">Closed By
                                                    3</label>
                                                <div class="col-sm-9">
                                                    <select name="close_by3" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="closeRate3">
                                                <label for="one" class="col-sm-3 col-form-label">Closed Rate
                                                    3</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="close_rate3" class="form-control"
                                                        placeholder="Closed Rate 3">
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="cutOff">
                                                <label for="one" class="col-sm-3 col-form-label">Cut
                                                    off</label>
                                                <div class="col-sm-9">
                                                    <select name="cut_off" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 col-lg-6" id="payrollRemark">
                                                <label for="one" class="col-sm-3 col-form-label">Payroll
                                                    Remarks</label>
                                                <div class="col-sm-9">
                                                    <textarea name="payroll_remark" rows="2" class="form-control"
                                                        placeholder="PO Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                        <button type="submit" class="btn btn-sm btn-info mt-3">Save</button>
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
                                                    <td>{{ $loop->index + 1 }} </td>
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

                        <div class="tab-pane" id="working_hour" role="tabpanel">
                            <h5>Create Time Sheet</h5>
                            <form
                                action="{{ route('candidate.working.hour', $candidate->id) }}"
                                method="POST">
                                @csrf
                                <div class="row mb-5">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Time Sheet
                                                    Type</label>
                                                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                                <div class="col-sm-9">
                                                    <select name="sheet_type_id" id="" class="form-control">
                                                        <option value="{{ $time?->sheet_type_id }}">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Schedule
                                                    Type</label>
                                                <div class="col-sm-9">
                                                    <select name="schedul_type" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                        <option value="Month End"
                                                            {{ $time?->schedul_type == 'Month End' ? 'selected' : '' }}>
                                                            Month End</option>
                                                        <option value="44 Hours"
                                                            {{ $time?->schedul_type == '44 Hours' ? 'selected' : '' }}>
                                                            44 Hours</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Schedule
                                                    Day</label>
                                                <div class="col-sm-9">
                                                    <select name="schedul_day" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                        @for ($i = 0; $i < 32; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ $i == $time?->schedul_day ? 'selected' : '' }}>
                                                                {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Remarks</label>
                                                <div class="col-sm-9">
                                                    <textarea name="remarks" rows="2" class="form-control"
                                                        placeholder="Remarks"> {{ $time?->remarks }} </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5>Days Setting</h5>
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label for="package_day" class="col-sm-2 control-label">Day</label>
                                        <div class="col-sm-3">
                                            <label for="package_day" class="control-label">Working Start Time</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="package_day" class="control-label">Working End Time</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="package_day" class="control-label">Lunch Hours</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="package_day" class="col-sm-2 control-label">Work</label>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mt-2">
                                                <label for="package_day" class="col-sm-2 control-label">Sunday</label>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" placeholder="Lunch Hours"
                                                        readonly>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="checkbox" name="" placeholder="Lunch Hours">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mt-2">
                                                <label for="package_day" class="col-sm-2 control-label">Monday</label>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" placeholder="Lunch Hours"
                                                        readonly>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="checkbox" name="" placeholder="Lunch Hours">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mt-2">
                                                <label for="package_day" class="col-sm-2 control-label">Tuesday</label>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" placeholder="Lunch Hours"
                                                        readonly>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="checkbox" name="" placeholder="Lunch Hours">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mt-2">
                                                <label for="package_day"
                                                    class="col-sm-2 control-label">Wednesday</label>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" placeholder="Lunch Hours"
                                                        readonly>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="checkbox" name="" placeholder="Lunch Hours">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mt-2">
                                                <label for="package_day" class="col-sm-2 control-label">Thursday</label>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" placeholder="Lunch Hours"
                                                        readonly>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="checkbox" name="" placeholder="Lunch Hours">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mt-2">
                                                <label for="package_day" class="col-sm-2 control-label">Friday</label>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" placeholder="Lunch Hours"
                                                        readonly>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="checkbox" name="" placeholder="Lunch Hours">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mt-2">
                                                <label for="package_day" class="col-sm-2 control-label">Saturday</label>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="time" name="" class="form-control">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" placeholder="Lunch Hours"
                                                        readonly>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="checkbox" name="" placeholder="Lunch Hours">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-info">Update</button>
                                    </div>
                                </div>
                            </form>
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
                <div class="modal fade bs-example-modal-lg-create-resume" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Upload Resume</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('candidate.resume', $candidate->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="candidates_id" value="{{ $candidate->id }}"
                                        class="form-control">
                                    <div class="mt-5 mt-lg-4 mt-xl-0">
                                        <div class="row mb-4">
                                            <label for="resume_name" class="col-sm-3 col-form-label">Resume Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="resume_name" class="form-control" value="{{old('resume_name')}}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="resume_file_path" class="col-sm-3 col-form-label">Upload
                                                File</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="resume_file_path" class="form-control">
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
    <script>
        // Get the radio button element
        var isMainRadio = document.getElementById('isMainRadio');

        // Add a change event listener
        isMainRadio.addEventListener('change', function() {

        });
    </script>
    <script>
        $(document).ready(function () {
            // Add a change event listener to all radio buttons with class 'isMainRadio'
            $('.isMainRadio').on('change', function () {
                // Get the candidate ID from the data attribute
                var currentCandidateId = $(this).data('candidate-id');

                // Make an Ajax request to update the isMain status
                $.ajax({
                    type: 'POST',
                    url: '/admin/candidate/main/' + currentCandidateId,
                    data: {
                        isMain: 1,
                        _token: '{{ csrf_token() }}' // Set to 1 when the radio button is checked
                    },
                    success: function (response) {
                        console.log(response.message);
                        // You can handle the success response here
                    },
                    error: function (error) {
                        console.error('Ajax request failed:', error);
                        // You can handle the error response here
                    }
                });
            });
        });
    </script>
    <script src="{{asset('build/js/ajax/candidateDeclaration.js')}}"></script>
    <script src="{{asset('build/js/ajax/candidate/genaral.js')}}"></script>
    <script src="{{asset('build/js/ajax/candidateRemark.js')}}"></script>
    <script src="{{asset('build/js/ajax/candidatePayroll.js')}}"></script>
    <script src="{{asset('build/js/ajax/imagePreview.js')}}"></script>
    @endsection
