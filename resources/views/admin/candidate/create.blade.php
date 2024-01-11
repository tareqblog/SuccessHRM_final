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
                            <a href="{{ route('candidate.index') }}" class="btn btn-sm btn-success">Search</a>
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
                                </ul>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="General_info" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Candidate
                                                        Code</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_code" class="form-control"
                                                            placeholder="Candidate code" disabled
                                                            value="--System Generate--">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Candidate
                                                        Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_name" class="form-control"
                                                            placeholder="Candidate name" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Date of
                                                        Birth</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="candidate_birthdate"
                                                            class="form-control" placeholder="Date of Birth">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-4 col-form-label">Race</label>
                                                    <div class="col-sm-8">
                                                        <select name="races_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($race_data as $row)
                                                                <option value="{{ $row->id }}"
                                                                    {{ old('races_id') == $row->id ? 'selected' : '' }}>
                                                                    {{ old('races_id') . $row->race_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two"
                                                        class="col-sm-4 col-form-label">Nationality</label>
                                                    <div class="col-sm-8">
                                                        <select name="nationality_id" class="form-control"
                                                            id="mySelect">
                                                            <option value="">Select One</option>
                                                            @foreach ($nationality as $nation)
                                                                <option value="{{ $nation->id }}"
                                                                    {{ old('nationality_id') == $nation->id ? 'selected' : '' }}>
                                                                    {{ old('nationality_id') . $nation->nationality_code }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4" id="myNationality" style="display: none;">
                                                    <label for="two" class="col-sm-4 col-form-label">Date of
                                                        issue</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="nationality_date_of_issue"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="three" class="col-sm-4 col-form-label">Mobile</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="candidate_mobile" placeholder="Mobile" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="three" class="col-sm-4 col-form-label">Home Tel</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="candidate_home_phone" placeholder="Home Tel">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-4 col-form-label">Type Of
                                                        Pass</label>
                                                    <div class="col-sm-8">
                                                        <select name="passtypes_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($passtype_data as $row)
                                                                <option value="{{ $row->id }}"
                                                                    {{ old('passtype_id') == $row->id ? 'selected' : '' }}>
                                                                    {{ $row->passtype_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="three" class="col-sm-4 col-form-label">Height</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="candidate_height" placeholder="Height">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-4 col-form-label">Outlet</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="candidate_outlet_id" required>
                                                            <option value="">Select One</option>
                                                            @foreach ($outlet_data as $row)
                                                                <option value="{{ $row->id }}"
                                                                    {{ old('candidate_outlet_id') == $row->id ? 'selected' : '' }}>
                                                                    {{ $row->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">NRIC/FIN
                                                        No.</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_nric" class="form-control"
                                                            placeholder="NRIC/FIN No.">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Gender</label>
                                                    <div class="col-sm-8">
                                                        <select name="dbsexes_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-4 col-form-label">Religion</label>
                                                    <div class="col-sm-8">
                                                        <select name="religions_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($religion_data as $row)
                                                                <option value="{{ $row->id }}"
                                                                    {{ old('religions_id') == $row->id ? 'selected' : '' }}>
                                                                    {{ $row->religion_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-4 col-form-label">Marital
                                                        Status</label>
                                                    <div class="col-sm-8">
                                                        <select name="marital_statuses_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($marital_data as $row)
                                                                <option value="{{ $row->id }}"
                                                                    {{ old('marital_statuses_id') == $row->id ? 'selected' : '' }}>
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
                                                            placeholder="Numbers of Children">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" name="candidate_email" class="form-control"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-4 col-form-label">Weight</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_weight"
                                                            class="form-control" placeholder="Weight">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-4 col-form-label">Black
                                                        List</label>
                                                    <div class="col-sm-8">

                                                        <select name="candidate_isBlocked" class="form-control">
                                                            <option value="">Select One</option>
                                                            <option value="1"
                                                                {{ old('candidate_isBlocked') == 1 ? 'selected' : '' }}>Yes
                                                            </option>
                                                            <option value="0"
                                                                {{ old('candidate_isBlocked') == 0 ? 'selected' : '' }}>No
                                                            </option>
                                                        </select>
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
                                                {{-- <label for="one" class="col-sm-4 col-form-label">User Right</label> --}}
                                                <div class="col-sm-8">
                                                    <img src="{{ URL::asset('build/images/avatar.png') }}" alt="avatar"
                                                        class="mb-2">
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
                                                    <label for="one" class="col-sm-4 col-form-label">Postal Code
                                                        1</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_postal_code"
                                                            class="form-control" placeholder="Postal Code">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Unit No
                                                        1</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_unit_number"
                                                            class="form-control" placeholder="Unit No">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-4 col-form-label">Address
                                                        1</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="candidate_street" rows="2" class="form-control" placeholder="Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Postal Code
                                                        2</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_postal_code2"
                                                            class="form-control" placeholder="Postal Code">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Unit No
                                                        2</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_unit_number2"
                                                            class="form-control" placeholder="Unit No">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-4 col-form-label">Address
                                                        2</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="candidate_street2" rows="2" class="form-control" placeholder="Address"></textarea>
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
                                                    <label for="one" class="col-sm-4 col-form-label">Contact
                                                        Person</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_emr_contact"
                                                            class="form-control" placeholder="Contact Person">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Phone 1</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_emr_phone1"
                                                            class="form-control" placeholder="Phone 1">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-4 col-form-label">Address</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="candidate_emr_address" rows="2" class="form-control" placeholder="Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one"
                                                        class="col-sm-4 col-form-label">Relationship</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_emr_relation"
                                                            class="form-control" placeholder="Relationship">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Phone 2</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_emr_phone2"
                                                            class="form-control" placeholder="Phone 2">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-4 col-form-label">Remarks</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="candidate_emr_remarks" rows="2" class="form-control" placeholder="Remarks"></textarea>
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
                                                    <label for="one" class="col-sm-4 col-form-label">Pay Mode</label>
                                                    <div class="col-sm-8">
                                                        <select name="paymodes_id" class="form-control" id="">
                                                            <option value="">Select One</option>
                                                            @foreach ($paymode_data as $row)
                                                                <option value="{{ $row->id }}"
                                                                    {{ old('paymodes_id') == $row->id ? 'selected' : '' }}>
                                                                    {{ $row->paymode_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">GIRO Account
                                                        Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_bank_acc_title"
                                                            class="form-control" placeholder="GIRO Account Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">GIRO
                                                        Bank</label>
                                                    <div class="col-sm-8">
                                                        <select name="candidate_bank" class="form-control"
                                                            id="">
                                                            <option value="">Select One</option>
                                                            @foreach ($Paybanks as $data)
                                                                <option value="{{ $data->id }}"
                                                                    {{ old('candidate_bank') == $data->id ? 'selected' : '' }}>
                                                                    {{ $data->Paybank_code }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">GIRO Account
                                                        No</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_bank_acc_no"
                                                            class="form-control" placeholder="GIRO Account No">
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
                                                    <label for="one" class="col-sm-4 col-form-label">N-Levels</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="candidate_n_level" placeholder="Course">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">O-Levels</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_o_level"
                                                            class="form-control" placeholder="Course">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">A-Levels</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_a_level"
                                                            class="form-control" placeholder="Course">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Diploma</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_diploma"
                                                            class="form-control" placeholder="Course">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Degree</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_degree"
                                                            class="form-control" placeholder="Course">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Other</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_other" class="form-control"
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
                                                <label for="one" class="col-sm-4 col-form-label">Written</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="candidate_written" class="form-control"
                                                        placeholder="eg: English - good">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-4 col-form-label">Spoken</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="candidate_spocken" class="form-control"
                                                        placeholder="eg: English - good">
                                                </div>
                                            </div>
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
                                                    <label for="one" class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_referee_name1"
                                                            class="form-control" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Years
                                                        Known</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_referee_year_know1"
                                                            class="form-control" placeholder="Year">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one"
                                                        class="col-sm-4 col-form-label">Occupation</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="candidate_referee_occupation1" placeholder="Occupation">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Contact No /
                                                        Email
                                                        Address</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_referee_contact1"
                                                            class="form-control" placeholder="Contact No">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="candidate_referee_name2" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Years
                                                        Known</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_referee_year_know2"
                                                            class="form-control" placeholder="Year">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one"
                                                        class="col-sm-4 col-form-label">Occupation</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_referee_occupation2"
                                                            class="form-control" placeholder="Occupation">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-4 col-form-label">Contact No /
                                                        Email
                                                        Address</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="candidate_referee_contact2"
                                                            class="form-control" placeholder="Contact No">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane" id="declaration" role="tabpanel">
                                    <h5 class="mb-5">Declaration</h5>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="form-group mb-2">
                                                    <label for="declaration_bankrupt" class=" control-label">1. Are
                                                        you / Have you ever been an undischarged bankrupt?</label>
                                                    <div class="radio d-flex">
                                                        <div class="col-sm-4">
                                                            <label>
                                                                <input type="radio" name="candidate_dec_bankrupt"
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_bankrupt"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" style="display: none;" class="form-control" id="db_specify"
                                                                name="candidate_dec_bankrupt_details" value=""
                                                                placeholder="If Yes, Please specify">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="declaration_bankrupt" class=" control-label">2. Are you
                                                        suffering from any physical / mental impairment or chronic /
                                                        pre-existing illness?</label>
                                                    <div class="radio d-flex">
                                                        <div class="col-sm-4">
                                                            <label>
                                                                <input type="radio" name="candidate_dec_physical"
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_physical"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" style="display: none;" class="form-control" id="db_specify"
                                                                name="candidate_dec_physical_details" value=""
                                                                placeholder="If Yes, Please specify">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="declaration_bankrupt" class=" control-label">3. Are you
                                                        currently undergoing long-term medical treatment?</label>
                                                    <div class="radio d-flex">
                                                        <div class="col-sm-4">
                                                            <label>
                                                                <input type="radio" name="candidate_dec_lt_medical"
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_lt_medical"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" style="display: none;" class="form-control" id="db_specify"
                                                                name="candidate_dec_lt_medical_details" value=""
                                                                placeholder="If Yes, Please specify">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="declaration_bankrupt" class=" control-label">4. Have you
                                                        ever been convicted or found guilty of an offence in Court Of Law in
                                                        any country?</label>
                                                    <div class="radio d-flex">
                                                        <div class="col-sm-4">
                                                            <label>
                                                                <input type="radio" name="candidate_dec_law"
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_law"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" style="display: none;" class="form-control" id="db_specify"
                                                                name="candidate_dec_law_details" value=""
                                                                placeholder="If Yes, Please specify">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="declaration_bankrupt" class=" control-label">5. Have you
                                                        ever been issued warning letters, suspended or dismissed from
                                                        employment before?</label>
                                                    <div class="radio d-flex">
                                                        <div class="col-sm-4">
                                                            <label>
                                                                <input type="radio" name="candidate_dec_warning"
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_warning"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" style="display: none;" class="form-control" id="db_specify"
                                                                name="candidate_dec_warning_details" value=""
                                                                placeholder="If Yes, Please specify">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="declaration_bankrupt" class=" control-label">6. Have you
                                                        applied for any job with this company before?</label>
                                                    <div class="radio d-flex">
                                                        <div class="col-sm-4">
                                                            <label>
                                                                <input type="radio" name="candidate_dec_applied"
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_applied"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" style="display: none;"  class="form-control" id="db_specify"
                                                                name="candidate_dec_applied_details" value=""
                                                                placeholder="If Yes, Please specify">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="tab-pane" id="declaration" role="tabpanel">
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
                                                                <input type="radio" name="candidate_dec_bankrupt"
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_bankrupt"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6" id="candidate_dec_bankrupt_details"
                                                            style="display: none;">
                                                            <input type="text" class="form-control"
                                                                name="candidate_dec_bankrupt_details"
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
                                                                <input type="radio" name="candidate_dec_physical"
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_physical"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control"
                                                                id="candidate_dec_physical_details"
                                                                name="candidate_dec_physical_details"
                                                                placeholder="If Yes, Please specify"
                                                                id="candidate_dec_physical_details"
                                                                style="display: none;">
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
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_lt_medical"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control"
                                                                id="candidate_dec_lt_medical_details"
                                                                name="candidate_dec_lt_medical_details"
                                                                placeholder="If Yes, Please specify"
                                                                style="display: none;">
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
                                                                <input type="radio" name="candidate_dec_law"
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_law"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control"
                                                                id="candidate_dec_law_details"
                                                                name="candidate_dec_law_details"
                                                                placeholder="If Yes, Please specify"
                                                                style="display: none;">
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
                                                                <input type="radio" name="candidate_dec_warning"
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_warning"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control"
                                                                id="candidate_dec_warning_details"
                                                                name="candidate_dec_warning_details"
                                                                placeholder="If Yes, Please specify"
                                                                style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="declaration_bankrupt" class=" control-label">6. Have you
                                                        applied for any job with this company before?</label>
                                                    <div class="radio d-flex">
                                                        <div class="col-sm-3">
                                                            <label>
                                                                <input type="radio" name="candidate_dec_applied"
                                                                    value="1">Yes
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="candidate_dec_applied"
                                                                    value="0">No
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control"
                                                                id="candidate_dec_applied_details"
                                                                name="candidate_dec_applied_details"
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
                                                    <div class="col-sm-4">
                                                        <input type="date" class="form-control"
                                                            name="candidate_joindate" placeholder="Join Date">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 ms-3 mb-3">
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
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        </div>
    @endsection

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>

        <script src="{{ asset('build/js/ajax/candidateGenarel.js') }}"></script>
        <script src="{{ asset('build/js/ajax/candidateDeclaration.js') }}"></script>
    @endsection
