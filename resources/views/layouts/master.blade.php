<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Success HR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Build with Digipixel Singapore" name="description" />
    <meta content="Digipixel" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">
    <script src="https://kit.fontawesome.com/6cc5870d50.js" crossorigin="anonymous"></script>
    <!-- include head css -->
    @include('layouts.head-css')
</head>

@yield('body')

<!-- Begin page -->
<div id="layout-wrapper">
    <!-- topbar -->
    @include('layouts.topbar')

    <!-- sidebar components -->
    @include('layouts.sidebar')
    @include('layouts.horizontal')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- footer -->
        @include('layouts.footer')

    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- customizer -->
@include('layouts.right-sidebar')

<!-- vendor-scripts -->
@include('layouts.vendor-scripts')

</body>

</html>
