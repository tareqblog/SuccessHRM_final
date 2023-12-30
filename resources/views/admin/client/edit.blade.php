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
                            <a href="{{route('clients.create')}}" class="btn btn-sm btn-success">Create New</a>
                            <a href="{{route('clients.index')}}" class="btn btn-sm btn-success">Search</a>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="row">
                            <div class="col-lg-5">
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#General" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">General</span>
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
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="General" role="tabpanel">
                                <form action="{{ route('clients.update', $client->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
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
                                                        Name<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_name" class="form-control"
                                                            placeholder="Client Name" value="{{ $client->client_name }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="two" class="col-sm-3 col-form-label">Manager /
                                                        Consultant (In Charge) <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select name="employees_id" class="form-control" required>
                                                            <option value="">Select One</option>
                                                            @foreach ($employees as $employee)
                                                                <option value="{{ $employee->id }}"
                                                                    {{ $employee->id == $client->employees_id ? 'selected' : '' }}>
                                                                    {{ $employee->employee_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="three" class="col-sm-3 col-form-label">Payroll
                                                        Person In Charge</label>
                                                    <div class="col-sm-9">
                                                        <select name="payroll_employees_id" class="form-control">
                                                            <option value="">Select One</option>
                                                            @foreach ($employees_payroll as $user)
                                                                <option value="{{ $user->id }}"
                                                                    {{ $user->id == $client->payroll_employees_id ? 'selected' : 0 }}>
                                                                    {{ $user->employee_name }}
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
                                                        <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select name="industry_types_id" class="form-control" required>
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
                                                        <span class="text-danger">*</span></label>
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
                                                    </label>
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
                                                        Person<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_contact_person"
                                                            class="form-control" placeholder="Contact Person"
                                                            value="{{ $client->client_contact_person }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="thirteen" class="col-sm-3 col-form-label">Contact
                                                        Number<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_contact_number"
                                                            class="form-control" placeholder="Contact Number"
                                                            value="{{ $client->client_contact_number }}" required>
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
                            </div>
                            <div class="tab-pane" id="upload_file" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="{{ route('client.file.upload', $client->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="0" name="file_type_for">
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
                                                            @foreach ($fileTypes as $file)
                                                                <option value="{{ $file->id }}">
                                                                    {{ $file->uploadfiletype_code }}</option>
                                                            @endforeach
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
                                                    <th>Upload By</th>
                                                    <th>Document Type</th>
                                                    <th>File Name</th>
                                                    <th>Upload Date & Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($client_files as $file)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>@if($file->created_by)
                                                            {{ \App\Models\Employee::where(['id' =>$file->created_by ])->pluck('employee_code')->first() }}
                                                        @else
                                                            User Not Found
                                                        @endif
                                                        </td>
                                                        <td>
                                                                {{ $file->file_type->uploadfiletype_code }}
                                                        </td>
                                                        <td>{{ $file->file_path }}</td>
                                                        <td>{{ $file->created_at }}</td>
                                                        <td style="display: flex;">
                                                            <a href="{{ asset('storage') }}/{{ $file->file_path }}"
                                                                class="btn btn-info btn-sm me-3" download>Donwload</a>
                                                            <form action="{{ route('client.file.delete', $file->id) }}"
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
                            <div class="tab-pane" id="follow_up" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h5>Create Follow Up</h5>
                                        <form action="{{ route('client.followup', $client->id) }}" method="POST">
                                            @csrf
                                            <div class="row mb-4">
                                                <label for="twente_four"
                                                    class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" name="clients_id" value="{{ $client->id }}">
                                                    <textarea name="description" id="ckeditor-classic" rows="2"></textarea>
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
                                                    <th>Create By</th>
                                                    <th>Description</th>
                                                    <th>Create Date & Time</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($client_followup as $file)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>@if($file->created_by)
                                                            {{ \App\Models\Employee::where(['id' =>$file->created_by ])->pluck('employee_code')->first() }}
                                                        @else
                                                            User Not Found
                                                        @endif
                                                        </td>
                                                        <td>{!! $file->description !!}</td>
                                                        <td>{{ $file->created_at }}</td>
                                                        <td style="display: flex;">

                                                            <form action="{{ route('client.followup.delete', $file->id) }}"
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
                        </div>
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

        <script language="javascript" type="text/javascript">
  if(window.location.hash) { // Check if url hash is not empty
      var hash = window.location.hash; // nav-y1
      document.querySelector('[href="'+hash+'"]').click();
  }
</script>
    @endsection
