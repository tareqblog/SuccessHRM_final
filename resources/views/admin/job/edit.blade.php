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
        @include('admin.include.select2')
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <h6 class="card-title mb-0">Update Job Posting</h6>
                            </div>
                            <div class="p-2 bd-highlight">

                            </div>
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
                        <form action="{{ route('job.update', $job->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">

                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="job_title" class="col-sm-5 col-form-label fw-bold">Job Title</label>
                                        <div class="col-sm-7">
                                            <input type="text" id="job_title" class="form-control" placeholder="Job Title" name="job_title" value="{{ $job->job_title ?? old('job_title') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="clientSelect" class="col-sm-5 col-form-label fw-bold">Client</label>
                                        <div class="col-sm-7">
                                            <select id="clientSelect" name="client_id" class="form-control single-select-field">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}" {{ $client->id == $job->client_id ? 'selected' : ''}}>{{ $client->client_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="job_category_id" class="col-sm-5 col-form-label fw-bold">Job Category</label>
                                        <div class="col-sm-7">
                                            <select name="job_category_id" id="job_category_id" class="form-control single-select-field">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($jobCategory as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $job->job_category_id ? 'selected' : ''}}> {{ $category->jobcategory_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="leadersContainer" class="col-sm-5 col-form-label fw-bold">Person In Charge</label>
                                        <div class="col-sm-7">
                                            <select id="leadersContainer" name="person_incharge" class="form-control single-select-field">
                                                <option value="" selected> Choose One </option>
                                                @foreach ($incharges as $incharge)
                                                    <option value="{{$incharge->id}}" {{ $incharge->id == $job->person_incharge ? 'selected' : '' }}>{{ $incharge->employee_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="job_salary" class="col-sm-5 col-form-label fw-bold">Job Salary</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" placeholder="Job Salary" value="{{ $job->job_salary ?? old('job_salary') }}" name="job_salary" id="job_salary">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="job_type_id" class="col-sm-5 col-form-label fw-bold">Job Type</label>
                                        <div class="col-sm-7">
                                            <select id="job_type_id" name="job_type_id" class="form-control single-select-field">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($jobType as $type)
                                                    <option value="{{ $type->id }}" {{ $type->id == $job->job_type_id ? 'selected' : ''}}>{{ $type->jobtype_code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="remark" class="col-sm-5 col-form-label fw-bold">Internal Remark</label>
                                        <div class="col-sm-7">
                                            <textarea id="remark" name="remark" rows="2" class="form-control editor" placeholder="Internal Remark"> {{ $job->remark ?? old('remark') }} </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="short_desc" class="col-sm-5 col-form-label fw-bold">Short Description</label>
                                        <div class="col-sm-7">
                                            <textarea name="short_desc" id="short_desc" rows="2" class="form-control editor" placeholder="Short Description"> {{ $job->short_desc ?? old('short_desc') }} </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="job_added_date" class="col-sm-5 col-form-label fw-bold">Job Added Date</label>
                                        <div class="col-sm-7">
                                            <input type="date" id="job_added_date" name="job_added_date" class="form-control" placeholder="Job Added Date" value="{{ $job->job_added_date ?? old('job_added_date') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="postal_code" class="col-sm-5 col-form-label fw-bold">Postal Code</label>
                                        <div class="col-sm-7">
                                            <input type="text" id="postal_code" name="postal_code" class="form-control" placeholder="Postal Code" value="{{ $job->postal_code ?? old('postal_code') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="unit_no" class="col-sm-5 col-form-label fw-bold">Unit No</label>
                                        <div class="col-sm-7">
                                            <input type="text" id="unit_no" name="unit_no" class="form-control" placeholder="Unit No" value="{{ $job->unit_no ?? old('unit_no') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="address" class="col-sm-5 col-form-label fw-bold">Street</label>
                                        <div class="col-sm-7">
                                            <textarea name="address" id="address" rows="2" class="form-control" placeholder="Street"> {{ isset($job->address) ? $job->address : old('address') }} </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="display_address" class="col-sm-5 col-form-label fw-bold">Display Address</label>
                                        <div class="col-sm-7">
                                            <textarea rows="2" id="display_address" name="display_address" class="form-control" placeholder="Display Address">{{ isset($job->display_address) ? $job->display_address : old('display_address') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-1">
                                    <div class="row">
                                        <label for="description" class="col-sm-12 col-md-2 col-form-label fw-bold">Description</label>
                                        <div class="col-sm-12 col-md-10">
                                            <div class="d-flex flex-row-reverse description_textarea">
                                                <textarea name="description" id="description" class="editor" rows="2"> {{ isset($job->description) ? $job->description : old('description') }} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="mt-4"><u>SEO Search</u></h5>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="meta_title" class="col-sm-5 col-form-label fw-bold">Meta Tag Title</label>
                                        <div class="col-sm-7">
                                            <input type="text" id="meta_title" name="meta_title" class="form-control" placeholder="Search Title" value="{{ isset($job->meta_title) ? $job->meta_title : old('meta_title') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-1">
                                    <div class="row">
                                        <label for="meta_tag" class="col-sm-5 col-form-label fw-bold">Meta Tag Keyword</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="meta_tag" id="meta_tag" class="form-control" placeholder="Search Keyword" value="{{ isset($job->meta_tag) ? $job->meta_tag : old('meta_tag') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-1">
                                    <div class="row">
                                        <label for="meta_description" class="col-sm-12 col-md-2 col-form-label fw-bold">Meta Tag Description</label>
                                        <div class="col-sm-12 col-md-10">
                                            <div class="d-flex flex-row-reverse description_textarea">
                                                <textarea name="meta_description" id="meta_description" class="editor" rows="2"> {{ isset($job->meta_description) ? $job->meta_description : old('meta_description') }} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{ route('job.index') }}" class="btn btn-sm btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-sm btn-info">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @include('admin.include.select2js')
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
                var copyText = document.getElementById("job_link");

                copyText.select();
                copyText.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(copyText.value);
            }
        </script>
    @endsection
