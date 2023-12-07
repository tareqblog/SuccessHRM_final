@extends('layouts.master')
@section('title')
Leave Management
@endsection
@section('page-title')
Leave Management
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
                <h4 class="card-title mb-0">Update Leave</h4>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Group</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Employee Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Employee Name">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Type of Leave</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Leave Duration</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Select One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Date (From)</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" placeholder="Date (From)">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Date (To)</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" placeholder="Date (To)">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Total Hours</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" placeholder="Total Hours">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Upload File</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" placeholder="Upload File">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Remarks</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" class="form-control" placeholder="Remarks"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-9 text-danger">
                                    Pending
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
