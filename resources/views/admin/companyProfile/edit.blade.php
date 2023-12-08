@extends('layouts.master')
@section('title')
Company Profile
@endsection
@section('page-title')
Company Profile
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Update Company Profile</h4>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Company Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Fax</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Fax">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <select name="" id="" class="form-control">
                                            <option value="">Select One</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">GST No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="GST No">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea name="" rows="2" placeholder="Address"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Remark Time Set (in Minute)</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Remark Time Set (in Minute)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Tel</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Tel">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Website</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Website">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">GST %</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="%">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="one" class="col-sm-3 col-form-label">Remark</label>
                                    <div class="col-sm-9">
                                        <textarea name="" rows="2" placeholder="Remark"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#" class="btn btn-sm btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
