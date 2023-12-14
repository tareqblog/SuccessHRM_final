@extends('layouts.master')
@section('title')
    Edit Client
@endsection
@section('css')
    <!-- quill css -->
    <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Client Edit
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Edit Client</h4>
                        <div class="text-end">
                            <a href="#" class="btn btn-sm btn-success">Create New</a>
                            <a href="#" class="btn btn-sm btn-success">Search</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="row">
                            <div class="col-lg-5">
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#genarel" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Genarel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#upload_file" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Upload File</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#follow_up" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Follow Up</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#department" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Department</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#supervisor" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Supervisor</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <form action="{{ route('clients.update', $client->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
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
                                                            placeholder="Client Code" value="{{ $client->client_code }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="one" class="col-sm-3 col-form-label">Client
                                                        Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_name" class="form-control"
                                                            placeholder="Client Name" value="{{ $client->client_name }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Manager /
                                                        Consultant (In Charge)</label>
                                                    <div class="col-sm-9">
                                                        <select name="payroll_employees_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($employees as $employee)
                                                                <option value="{{ $employee->id }}"
                                                                    {{ $employee->id == $client->payroll_employees_id ? 'selected' : '' }}>
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
                                                                <option value="{{ $user->id }}"
                                                                    {{ $user->id == $client->payroll_users_id ? 'selected' : 0 }}>
                                                                    {{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="four" class="col-sm-3 col-form-label">Remark</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="client_remarks" rows="2" class="form-control" placeholder="Remark"> {{ $client->client_remarks }} </textarea>
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
                                                        <input type="date" name="tnc_renewal_date"
                                                            class="form-control" placeholder="Renewal Date"
                                                            value="{{ $client->tnc_renewal_date }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="seven" class="col-sm-3 col-form-label">Industry
                                                        *</label>
                                                    <div class="col-sm-9">
                                                        <select name="industry_types_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($industries as $industry)
                                                                <option value="{{ $industry->id }}"
                                                                    {{ $industry->id == $client->industry_types_id ? 'selected' : 0 }}>
                                                                    {{ $industry->industry_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="nine" class="col-sm-3 col-form-label">TNC Template
                                                        *</label>
                                                    <div class="col-sm-9">
                                                        <select name="tnc_templates_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($tncs as $tnc)
                                                                <option value="{{ $tnc->id }}"
                                                                    {{ $tnc->id == $client->tnc_templates_id ? 'selected' : 0 }}>
                                                                    {{ $tnc->tnc_template_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="ten" class="col-sm-3 col-form-label">Terms
                                                        *</label>
                                                    <div class="col-sm-9">
                                                        <select name="client_terms_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($client_terms as $term)
                                                                <option value="{{ $term->id }}"
                                                                    {{ $term->id == $client->client_terms_id ? 'selected' : 0 }}>
                                                                    {{ $term->client_term_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="ten" class="col-sm-3 col-form-label">Status
                                                        *</label>
                                                    <div class="col-sm-9">
                                                        <select name="clients_status" class="form-control">
                                                            <option value="1"
                                                                {{ $client->clients_status == 1 ? 'selected' : '' }}>Active
                                                            </option>
                                                            <option value="0"
                                                                {{ $client->clients_status == 0 ? 'selected' : '' }}>
                                                                In-Active</option>
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
                                                            class="form-control" placeholder="Attention Person"
                                                            value="{{ $client->client_attention_person }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twelve" class="col-sm-3 col-form-label">Contact
                                                        Person</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_contact_person"
                                                            class="form-control" placeholder="Contact Person"
                                                            value="{{ $client->client_contact_person }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="thirteen" class="col-sm-3 col-form-label">Contact
                                                        Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_contact_number"
                                                            class="form-control" placeholder="Contact Number"
                                                            value="{{ $client->client_contact_number }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="fourteen" class="col-sm-3 col-form-label">Fax</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_fax" class="form-control"
                                                            placeholder="Fax" value="{{ $client->client_fax }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="fifteen" class="col-sm-3 col-form-label">Postal
                                                        Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_postal_code"
                                                            class="form-control" placeholder="Postal Code"
                                                            value="{{ $client->client_postal_code }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="sixteen" class="col-sm-3 col-form-label">Street</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="client_street" rows="2" class="form-control" placeholder="Address"> {{ $client->client_street }} </textarea>
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
                                                            class="form-control" placeholder="Attention Designation"
                                                            value="{{ $client->client_attention_designation }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="eighteen"
                                                        class="col-sm-3 col-form-label">Designation</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="designation" class="form-control"
                                                            placeholder="Designation" value="{{ $client->designation }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="nineteen" class="col-sm-3 col-form-label">Phone
                                                        Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_phone" class="form-control"
                                                            placeholder="Phone Number"
                                                            value="{{ $client->client_phone }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twenteen" class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="client_email" class="form-control"
                                                            placeholder="Email" value="{{ $client->client_email }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_one" class="col-sm-3 col-form-label">Unit
                                                        No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_unit_number"
                                                            class="form-control" placeholder="Unit No"
                                                            value="{{ $client->client_unit_number }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_two" class="col-sm-3 col-form-label">Web
                                                        Site</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="client_website"
                                                            placeholder="Web Site" value="{{ $client->client_website }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="upload_file" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            {{-- <form action="#">
                                                <div class="mt-5 mt-lg-4 mt-xl-0">
                                                    <div class="row mb-4">
                                                        <label for="twente_three" class="col-sm-3 col-form-label">Upload
                                                            File</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" name="upload_file"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="twente_four" class="col-sm-3 col-form-label">File
                                                            Type</label>
                                                        <div class="col-sm-9">
                                                            <select name="twente_four" name="file_type"
                                                                class="form-control">
                                                                <option value="">Select One</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-info">Save</button>
                                                </div>
                                            </form> --}}
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Document Type</th>
                                                        <th>File Name</th>
                                                        <th>Upload Time</th>
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
                                                        <th>Document Type</th>
                                                        <th>File Name</th>
                                                        <th>Upload Time</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <hr class="mt-3">
                                    </div>
                                </div>
                                <div class="tab-pane" id="follow_up" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5>Create Follow Up</h5>
                                            {{-- <form action="#">
                                                <div class="row mb-4">
                                                    <label for="twente_four"
                                                        class="col-sm-2 col-form-label">Description</label>
                                                    <div class="col-sm-8">
                                                        <div id="ckeditor-classic"></div>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-info mt-2">Save</button>
                                            </form> --}}
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Document Type</th>
                                                        <th>File Name</th>
                                                        <th>Upload Time</th>
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
                                                        <th>Document Type</th>
                                                        <th>File Name</th>
                                                        <th>Upload Time</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <hr class="mt-3">
                                    </div>
                                </div>
                                <div class="tab-pane" id="department" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5>Create Department</h5>
                                            {{-- <form action="#">
                                                <div class="row mb-4">
                                                    <label for="twente_four" class="col-sm-2 col-form-label">Department
                                                        Name</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="department_name" class="form-control"
                                                            placeholder="Department Name">
                                                    </div>
                                                    <div class="col-sm-6"></div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="remarks" rows="2" class="form-control" placeholder="Remarks"></textarea>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-info mt-2">Save</button>
                                            </form> --}}
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Document Type</th>
                                                        <th>File Name</th>
                                                        <th>Upload Time</th>
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
                                                        <th>Document Type</th>
                                                        <th>File Name</th>
                                                        <th>Upload Time</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <hr class="mt-3">
                                    </div>
                                </div>
                                <div class="tab-pane" id="supervisor" role="tabpanel">
                                    {{-- <form action="">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row mb-4">
                                                    <label for="twente_four" class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="supervisor_name" class="form-control"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_four" class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="supervisor_email"
                                                            class="form-control" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_four" class="col-sm-3 col-form-label">Direct Number
                                                        (DID)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="super_name" class="form-control"
                                                            placeholder="Direct Number">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_four"
                                                        class="col-sm-3 col-form-label">Remarks</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="super_remarks" rows="2" class="form-control" placeholder="Remarks"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row mb-4">
                                                    <label for="twente_four"
                                                        class="col-sm-3 col-form-label">Mobile</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="mobile"
                                                            placeholder="Mobile">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_four"
                                                        class="col-sm-3 col-form-label">Department</label>
                                                    <div class="col-sm-9">
                                                        <select name="department" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_four"
                                                        class="col-sm-3 col-form-label">Defination</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="defination" rows="2" class="form-control" placeholder="Defination"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5>Login Information</h5>
                                                <div class="row mb-4">
                                                    <label for="twente_four" class="col-sm-3 col-form-label">Login
                                                        ID</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" class="form-control"
                                                            placeholder="Login Email">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_four"
                                                        class="col-sm-3 col-form-label">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_four" class="col-sm-3 col-form-label">Confirm
                                                        Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control"
                                                            placeholder="Confirm Password" name="password_confirm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-info">Save</button>
                                    </form> --}}
                                    <div class="col-lg-12 mt-2">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Document Type</th>
                                                    <th>File Name</th>
                                                    <th>Upload Time</th>
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
                                                    <th>Document Type</th>
                                                    <th>File Name</th>
                                                    <th>Upload Time</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <hr class="mt-3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div>
                                        <a href="#" class="btn btn-sm btn-secondary w-md">Cancel</a>
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
        <!-- ckeditor -->
        <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    @endsection
