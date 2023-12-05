@extends('admin.layouts.master')
@section('title')
    @lang('translation.Register')
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Contacts @endslot
        @slot('title') Admin Registration @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
    
                <h4 class="card-heading text-center mt-4">Set up Google Authenticator</h4>
   
                <div class="card-body" style="text-align: center;">
                    <p>Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code <strong>{{ $secret }}</strong></p>
                    <div>
                        {!! $QR_Image !!}
                    </div>
                    <p>You must set up your Google Authenticator app before continuing. You will be unable to login otherwise</p>
                    <div>
                        <!-- <a href="{ { route('admin.complete') } }" class="btn btn-primary">Complete Registration</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
