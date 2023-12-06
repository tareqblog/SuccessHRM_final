@extends('layouts.master')
@section('title')
Edit Client
@endsection
@section('css')
<!-- quill css -->
<link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet"
    type="text/css" />
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
                    <form>
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="genarel" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="one" class="col-sm-3 col-form-label">Client
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="one" class="form-control"
                                                        placeholder="Client Name">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="two" class="col-sm-3 col-form-label">Manager /
                                                    Consultant (In Charge)</label>
                                                <div class="col-sm-9">
                                                    <select name="two" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="three" class="col-sm-3 col-form-label">Payroll
                                                    Person In Charge</label>
                                                <div class="col-sm-9">
                                                    <select name="three" class="form-control">
                                                        <option value="">Select One</option>
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
                                            <div class="row mb-4">
                                                <label for="five" class="col-sm-3 col-form-label">Renewal
                                                    TNC</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="five" class="form-control"
                                                        placeholder="Renewal Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-5 mt-lg-4 mt-xl-0">
                                            <div class="row mb-4">
                                                <label for="six" class="col-sm-3 col-form-label">Renewal
                                                    TNC</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="six" class="form-control"
                                                        placeholder="Renewal Date">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="seven" class="col-sm-3 col-form-label">Industry
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <select name="seven" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="eight" class="col-sm-3 col-form-label">Status
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <select name="eight" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="nine" class="col-sm-3 col-form-label">TNC Template
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <select name="nine" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="ten" class="col-sm-3 col-form-label">Terms
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <select name="ten" class="form-control">
                                                        <option value="">Select One</option>
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
                                                    <input type="text" name="eleven" class="form-control"
                                                        placeholder="Attention Person">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="twelve" class="col-sm-3 col-form-label">Contact
                                                    Person</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="twelve" class="form-control"
                                                        placeholder="Contact Person">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="thirteen" class="col-sm-3 col-form-label">Contact
                                                    Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="thirteen" class="form-control"
                                                        placeholder="Contact Number">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="fourteen" class="col-sm-3 col-form-label">Fax</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="fourteen" class="form-control"
                                                        placeholder="Fax">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="fifteen" class="col-sm-3 col-form-label">Postal Code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="field_eleven" class="form-control"
                                                        placeholder="Postal Code">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="sixteen" class="col-sm-3 col-form-label">Street</label>
                                                <div class="col-sm-9">
                                                    <textarea name="sixteen" rows="2" class="form-control"
                                                        placeholder="Address"></textarea>
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
                                                    <input type="text" name="seventeen" class="form-control"
                                                        placeholder="Attention Designation">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="eighteen"
                                                    class="col-sm-3 col-form-label">Designation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="eighteen" class="form-control"
                                                        placeholder="Designation">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="nineteen" class="col-sm-3 col-form-label">Phone
                                                    Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nineteen" class="form-control"
                                                        placeholder="Phone Number">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="twenteen" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="twenteen" class="form-control"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="twente_one" class="col-sm-3 col-form-label">Unit No</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="twente_one" class="form-control"
                                                        placeholder="Unit No">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="twente_two" class="col-sm-3 col-form-label">Web Site</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="twente_two"
                                                        placeholder="Web Site">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="upload_file" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="#">
                                            <div class="mt-5 mt-lg-4 mt-xl-0">
                                                <div class="row mb-4">
                                                    <label for="twente_three" class="col-sm-3 col-form-label">Upload
                                                        File</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="twente_three" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twente_four" class="col-sm-3 col-form-label">File
                                                        Type</label>
                                                    <div class="col-sm-9">
                                                        <select name="twente_four" class="form-control">
                                                            <option value="">Select One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-info">Save</button>
                                            </div>
                                        </form>
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
                                        <form action="#">
                                            <div class="row mb-4">
                                                <label for="twente_four"
                                                    class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-8">
                                                    <div id="ckeditor-classic"></div>
                                                </div>
                                                <div class="col-sm-2"></div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-info mt-2">Save</button>
                                        </form>
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
                                        <form action="#">
                                            <div class="row mb-4">
                                                <label for="twente_four" class="col-sm-2 col-form-label">Department
                                                    Name</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control"
                                                        placeholder="Department Name">
                                                </div>
                                                <div class="col-sm-6"></div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                                                <div class="col-sm-8">
                                                    <textarea name="" rows="2" class="form-control"
                                                        placeholder="Remarks"></textarea>
                                                </div>
                                                <div class="col-sm-2"></div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-info mt-2">Save</button>
                                        </form>
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
                                <form action="">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-4">
                                                <label for="twente_four" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="twente_four" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="twente_four" class="col-sm-3 col-form-label">Direct Number
                                                    (DID)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Direct Number">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="twente_four" class="col-sm-3 col-form-label">Remarks</label>
                                                <div class="col-sm-9">
                                                    <textarea name="" rows="2" class="form-control"
                                                        placeholder="Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-4">
                                                <label for="twente_four" class="col-sm-3 col-form-label">Mobile</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Mobile">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="twente_four"
                                                    class="col-sm-3 col-form-label">Department</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control">
                                                        <option value="">Select One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="twente_four"
                                                    class="col-sm-3 col-form-label">Defination</label>
                                                <div class="col-sm-9">
                                                    <textarea name="" rows="2" class="form-control"
                                                        placeholder="Defination"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h5>Login Information</h5>
                                            <div class="row mb-4">
                                                <label for="twente_four" class="col-sm-3 col-form-label">Login ID</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Login Email">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="twente_four"
                                                    class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="twente_four"
                                                    class="col-sm-3 col-form-label">Confirm Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-info">Save</button>
                                </form>
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
    <script
        src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}">
    </script>

    <!-- init js -->
    <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    @endsection
