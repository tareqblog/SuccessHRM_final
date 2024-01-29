@extends('layouts.master')
@section('title')
    Job Posting
@endsection
@section('page-title')
    Job Posting Management
@endsection
@section('body')

    <body>
    @endsection
    @section('css')
        <!-- quill css -->
        <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Update Job Posting</h4>
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
                        <form action="{{ route('job.update', $job->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Job Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Job Title"
                                                name="job_title" value="{{ $job->job_title }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Job Category</label>
                                        <div class="col-sm-9">
                                            <select name="job_category_id" class="form-control">
                                                <option value="">Select One</option>
                                                @foreach ($jobCategory as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $job->job_category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->jobcategory_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Job Salary</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Job Salary"
                                                value="{{ $job->job_salary }}" name="job_salary">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Internal Remark</label>
                                        <div class="col-sm-9">
                                            <textarea name="remark" rows="2" class="form-control editor" placeholder="Internal Remark"> {{ $job->remark }} </textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Postal Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="postal_code" class="form-control"
                                                placeholder="Postal Code" value="{{ $job->postal_code }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Job Status</label>
                                        <div class="col-sm-9">
                                            <select name="job_status" class="form-control">
                                                <option value="0">Select One</option>
                                                <option value="1" {{ $job->job_status == 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ $job->job_status == 0 ? 'selected' : '' }}>Close
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Street</label>
                                        <div class="col-sm-9">
                                            <textarea name="address" rows="2" class="form-control" placeholder="Street"> {{ $job->address }} </textarea>
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Co Owner</label>
                                        <div class="col-sm-9">
                                            <select name="co_owner_id" class="form-control">
                                                <option value="">Select One</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ $job->co_owner_id == $user->id ? 'selected' : '' }}>
                                                        {{ $user->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Client</label>
                                        <div class="col-sm-9">
                                            <select name="client_id" class="form-control">
                                                <option value="">Select One</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}"
                                                        {{ $job->client_id == $client->id ? 'selected' : '' }}>
                                                        {{ $client->client_code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Person In Charge</label>
                                        <div class="col-sm-9">
                                            <select name="person_incharge" class="form-control">
                                                <option value="">Select One</option>
                                                @foreach ($users as $user)
                                                    <option
                                                        value="{{ $user->id }}"{{ $job->person_incharge == $user->id ? 'selected' : '' }}>
                                                        {{ $user->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Job Type</label>
                                        <div class="col-sm-9">
                                            <select name="job_type_id" class="form-control">
                                                <option value="">Select One</option>
                                                @foreach ($jobType as $type)
                                                    <option value="{{ $type->id }}"
                                                        {{ $job->job_type_id == $type->id ? 'selected' : '' }}>
                                                        {{ $type->jobtype_code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Short Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="short_desc" rows="2" class="form-control editor" placeholder="Short Description"> {{ $job->short_desc }} </textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Job Added Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="job_added_date" class="form-control"
                                                placeholder="Job Added Date" value="{{ $job->job_added_date }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Unit No</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="unit_no" class="form-control"
                                                placeholder="Unit No" value="{{ $job->unit_no }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Display Address</label>
                                        <div class="col-sm-9">
                                            <textarea rows="2" name="display_address" class="form-control" placeholder="Display Address"> {{ $job->display_address }} </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" class='editor'  rows="2"> {{ $job->description }} </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5>SEO Search</h5>
                                <div class="col-lg-6">
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Meta Tag Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="meta_title" class="form-control"
                                                placeholder="Search Title" value="{{ $job->meta_title }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Meta Tag Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="meta_description" rows="2" class="form-control" placeholder="Search Description"> {{ $job->meta_description }} </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-4">
                                        <label for="one" class="col-sm-3 col-form-label">Meta Tag Keyword</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="meta_tag" class="form-control"
                                                placeholder="Search Keyword" value="{{ $job->meta_tag }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{ route('job.index') }}" class="btn btn-sm btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- ckeditor -->
        <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
        <script>
            var allEditors = document.querySelectorAll('.editor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(allEditors[i]);
            }
        </script>
        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
        <script>
            function job_link() {
                // Get the text field
                var copyText = document.getElementById("job_link");

                // Select the text field
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(copyText.value);

                // Alert the copied text
                //   alert("Copied the text: " + copyText.value);
            }
        </script>
    @endsection
