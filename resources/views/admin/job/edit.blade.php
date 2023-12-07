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
<link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet"
    type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Update Job Posting</h4>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Job Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Job Title">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Job Category</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Job Salary</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Job Salary">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Internal Remark</label>
                                <div class="col-sm-9">
                                    <textarea name="" rows="2" class="form-control" placeholder="Internal Remark"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Job Status *</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Select One</option>
                                        <option value="">Active</option>
                                        <option value="">Close</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Postal Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Postal Code">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Street</label>
                                <div class="col-sm-9">
                                    <textarea name="" rows="2" class="form-control" placeholder="Street"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Co Owner</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Client</label>
                                <div class="col-sm-8">
                                    <select name="" id="" class="form-control">
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-sm btn-info">Refresh</button>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Person In Charge</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Job Type</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea  rows="2" class="form-control" placeholder="Short Description"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Job Added Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" placeholder="Job Added Date">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Unit No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Unit No">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Display Address</label>
                                <div class="col-sm-9">
                                    <textarea  rows="2" class="form-control" placeholder="Display Address"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Job Link</label>
                                <div class="col-sm-7">
                                    <input type="text" id="job_link" class="form-control" placeholder="Job Link" value="this is ok" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <button onclick="job_link()" class="btn btn-sm btn-info" >Copy Link</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row mb-4">
                                <label for="one" class="col-sm-1 col-form-label">Job Title</label>
                                <div class="col-sm-10">
                                    <div id="ckeditor-classic"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h5>SEO Search</h5>
                        <div class="col-lg-6">
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Meta Tag Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Search Title">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Meta Tag Description</label>
                                <div class="col-sm-9">
                                    <textarea name="" rows="2" class="form-control" placeholder="Search Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Meta Tag Keyword</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Search Keyword">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#" class="btn btn-sm btn-secondary">Back</a>
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
<script
    src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}">
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
