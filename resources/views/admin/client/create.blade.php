@extends('layouts.master')
@section('title')
    Create Client
@endsection
@section('page-title')
    Client Create
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
                            <a href="#" class="btn btn-sm btn-success">Create New</a>
                            <a href="#" class="btn btn-sm btn-success">Search</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="row">
                            <div class="col-lg-1">
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#genarel" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Genarel</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="genarel" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Client
                                                        Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_code" class="form-control"
                                                            placeholder="Client Code">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Client
                                                        Name <span class="text-danger">*</span> </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_name" class="form-control"
                                                            placeholder="Client Name" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Manager /
                                                        Consultant (In Charge) <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select name="payroll_employees_id" class="form-control" required>
                                                            <option value="">Select One</option>
                                                            @foreach ($employees as $employee)
                                                                <option value="{{ $employee->id }}">
                                                                    {{ $employee->employee_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="three" class="col-sm-3 col-form-label">Payroll
                                                        Person In Charge</label>
                                                    <div class="col-sm-9">
                                                        <select name="payroll_users_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Remark</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="client_remarks" rows="2" class="form-control" placeholder="Remark"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                {{-- <div class="row mb-4">
                                                    <label for="five" class="col-sm-3 col-form-label">Renewal
                                                        TNC</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="renewal_tnc_one" class="form-control"
                                                            placeholder="Renewal Date">
                                                    </div>
                                                </div> --}}
                                                <div class="row mb-4">
                                                    <label for="six" class="col-sm-3 col-form-label">Renewal
                                                        TNC</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="tnc_renewal_date" class="form-control"
                                                            placeholder="Renewal Date">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="seven" class="col-sm-3 col-form-label">Industry
                                                        <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select name="industry_types_id" class="form-control" required>
                                                            <option value="">Select One</option>
                                                            @foreach ($industries as $industry)
                                                                <option value="{{ $industry->id }}">
                                                                    {{ $industry->industry_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="nine" class="col-sm-3 col-form-label">TNC Template
                                                        <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select name="tnc_templates_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($tncs as $tnc)
                                                                <option value="{{ $tnc->id }}">
                                                                    {{ $tnc->tnc_template_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="ten" class="col-sm-3 col-form-label">Terms
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <select name="client_terms_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($client_terms as $term)
                                                                <option value="{{ $term->id }}">
                                                                    {{ $term->client_term_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Address Information</h5>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="eleven" class="col-sm-3 col-form-label">Attention
                                                        Person</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_attention_person"
                                                            class="form-control" placeholder="Attention Person">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twelve" class="col-sm-3 col-form-label">Contact
                                                        Person <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_contact_person"
                                                            class="form-control" placeholder="Contact Person" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="thirteen" class="col-sm-3 col-form-label">Contact
                                                        Number <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_contact_number"
                                                            class="form-control" placeholder="Contact Number" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="fourteen" class="col-sm-3 col-form-label">Fax</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_fax" class="form-control"
                                                            placeholder="Fax">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="fifteen" class="col-sm-3 col-form-label">Postal
                                                        Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_postal_code"
                                                            class="form-control" placeholder="Postal Code">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="sixteen" class="col-sm-3 col-form-label">Street</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="client_street" rows="2" class="form-control" placeholder="Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="seventeen" class="col-sm-3 col-form-label">Attention
                                                        Designation</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_attention_designation"
                                                            class="form-control" placeholder="Attention Designation">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="eighteen"
                                                        class="col-sm-3 col-form-label">Designation</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="designation" class="form-control"
                                                            placeholder="Designation">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="nineteen" class="col-sm-3 col-form-label">Phone
                                                        Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_phone" class="form-control"
                                                            placeholder="Phone Number">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twenteen" class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="client_email" class="form-control"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_one" class="col-sm-3 col-form-label">Unit
                                                        No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_unit_number"
                                                            class="form-control" placeholder="Unit No">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_two" class="col-sm-3 col-form-label">Web
                                                        Site</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="client_website"
                                                            placeholder="Web Site">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div>
                                        <a href="{{ route('clients.index') }}"
                                            class="btn btn-sm btn-secondary w-md">Cancel</a>
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
