@extends('layouts.master')
@section('title')
    Create Client
@endsection
@section('page-title')
    Client Create
@endsection
@section('css')
    <!-- choices css -->
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Create New Client</h4>
                        <div class="text-end">
                            <a href="{{ route('clients.index') }}" class="btn btn-sm btn-success">Search</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="row">
                            <div class="col-lg-1">
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#General" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">General</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('admin.include.errors')
                        <!-- Tab panes -->
                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="General" role="tabpanel">
                                    <div class="row">
                                        <div class="row col-lg-6 mb-4">
                                            <label for="one" class="col-sm-3 col-form-label">Client
                                                Code <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="client_code" class="form-control"
                                                    placeholder="Client Code" value="{{ old('client_code') }}" required>
                                            </div>
                                        </div>
                                        <div class="row col-lg-6  mb-4">
                                            <label for="one" class="col-sm-3 col-form-label">Client
                                                Name <span class="text-danger">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="client_name" class="form-control"
                                                    placeholder="Client Name" value="{{ old('client_name') }}" required>
                                            </div>
                                        </div>

                                        <div class="row col-lg-6  mb-4">
                                            <label for="two" class="col-sm-3 col-form-label">Manager /
                                                Consultant (In Charge) <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="employees_id" class="form-control" required>
                                                    <option value="">Select One</option>
                                                    @foreach (manager_for_client() as $manager)
                                                        <option value="{{ $manager->id }}"
                                                            @readonly(true)>{{ $manager->employee_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row col-lg-6  mb-4">
                                            <label for="three" class="col-sm-3 col-form-label">Payroll
                                                Person In Charge</label>
                                            <div class="col-sm-9">
                                                <select name="payroll_employees_id" class="form-control">
                                                    @if (authRoleName() == 'Team Leader')
                                                        <option value="{{ Auth::user()->employe->id }}" selected
                                                            @readonly(true)>{{ Auth::user()->employe->employee_name }}
                                                        </option>
                                                    @elseif(authRoleName() == 'Aministrator')
                                                        <option value="" selected disabled>Select One</option>
                                                        @foreach (teamLeaders(Auth::user()->employe->id) as $leader)
                                                            <option value="{{ $leader->id }}"
                                                                {{ old('payroll_employees_id') == $leader->id ? 'selected' : '' }}>
                                                                {{ $leader->employee_name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row col-lg-6  mb-4">
                                            <label for="four" class="col-sm-3 col-form-label">Remark</label>
                                            <div class="col-sm-9">
                                                <textarea name="client_remarks" rows="2" class="form-control" placeholder="Remark">{{ old('client_remarks') }} </textarea>
                                            </div>
                                        </div>
                                        <div class="row col-lg-6  mb-4">
                                            <label for="six" class="col-sm-3 col-form-label">Renewal
                                                TNC</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="tnc_renewal_date" class="form-control"
                                                    placeholder="Renewal Date" value="{{ old('tnc_renewal_date') }}">
                                            </div>
                                        </div>
                                        <div class="row col-lg-6  mb-4">
                                            <label for="seven" class="col-sm-3 col-form-label">Industry /Job category
                                                <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="industry_types_id" class="form-control" required>
                                                    <option value="">Select One</option>
                                                    @foreach ($job_categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('industry_types_id') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->jobcategory_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row col-lg-6  mb-4">
                                            <label for="nine" class="col-sm-3 col-form-label">TNC Template
                                                <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="tnc_templates_id" class="form-control" required>
                                                    <option value="">Select One</option>
                                                    @foreach ($tncs as $tnc)
                                                        <option value="{{ $tnc->id }}"
                                                            {{ old('tnc_templates_id') == $tnc->id ? 'selected' : '' }}>
                                                            {{ $tnc->tnc_template_code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row col-lg-6  mb-4">
                                            <label for="ten" class="col-sm-3 col-form-label">Terms
                                            </label>
                                            <div class="col-sm-9">
                                                <select name="client_terms_id" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($client_terms as $term)
                                                        <option value="{{ $term->id }}"
                                                            {{ old('client_terms_id') == $term->id ? 'selected' : '' }}>
                                                            {{ $term->client_term_code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5>Address Information</h5>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="eleven" class="col-sm-3 col-form-label">Attention
                                            Person</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="client_attention_person" class="form-control"
                                                placeholder="Attention Person"
                                                value="{{ old('client_attention_person') }}">
                                        </div>
                                    </div>
                                    <div class="row col-lg-6 mb-4">
                                        <label for="twelve" class="col-sm-3 col-form-label">Contact
                                            Person <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="client_contact_person" class="form-control"
                                                placeholder="Contact Person" value="{{ old('client_contact_person') }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row col-lg-6 mb-4">
                                        <label for="thirteen" class="col-sm-3 col-form-label">Contact
                                            Number <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="client_contact_number" class="form-control"
                                                placeholder="Contact Number" value="{{ old('client_contact_number') }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="fourteen" class="col-sm-3 col-form-label">Fax</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="client_fax" class="form-control"
                                                placeholder="Fax" value="{{ old('client_fax') }}">
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="fifteen" class="col-sm-3 col-form-label">Postal
                                            Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="client_postal_code" class="form-control"
                                                placeholder="Postal Code" value="{{ old('client_postal_code') }}">
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="sixteen" class="col-sm-3 col-form-label">Street</label>
                                        <div class="col-sm-9">
                                            <textarea name="client_street" rows="2" class="form-control" placeholder="Address">{{ old('client_street') }} </textarea>
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="seventeen" class="col-sm-3 col-form-label">Attention
                                            Designation</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="client_attention_designation"
                                                class="form-control" placeholder="Attention Designation"
                                                value="{{ old('client_attention_designation') }}">
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="eighteen" class="col-sm-3 col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="client_designation" class="form-control"
                                                placeholder="Designation" value="{{ old('client_designation') }}">
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="nineteen" class="col-sm-3 col-form-label">Phone
                                            Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="client_phone" class="form-control"
                                                placeholder="Phone Number" value="{{ old('client_phone') }}">
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="twenteen" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="client_email" class="form-control"
                                                placeholder="Email" value="{{ old('client_email') }}">
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="twente_one" class="col-sm-3 col-form-label">Unit
                                            No</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="client_unit_number" class="form-control"
                                                placeholder="Unit No" value="{{ old('client_unit_number') }}">
                                        </div>
                                    </div>
                                    <div class="row col-lg-6  mb-4">
                                        <label for="twente_two" class="col-sm-3 col-form-label">Web
                                            Site</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="client_website"
                                                placeholder="Web Site" value="{{ old('client_website') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div>
                            <a href="{{ route('clients.index') }}" class="btn btn-sm btn-secondary w-md">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-info w-md">Submit</button>
                            <a href="#" class="btn btn-sm btn-primary w-md">Print TNC SRC</a>
                            <a href="#" class="btn btn-sm btn-primary w-md">Print TNC SHRC</a>
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
        <!-- choices js -->
        <script src="{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-advanced.init.js') }}"></script>
    @endsection
