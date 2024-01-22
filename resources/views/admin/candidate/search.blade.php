@extends('layouts.master')
@section('title')
Search Function
@endsection
@section('page-title')
Search Candidate Detail
@endsection
@section('body')
<body>
@endsection
@section('content')

<style>
    @keyframes slideInFromBottom {
        from {
            transform: translate3d(0, 100%, 0);
        }
        to {
            transform: translate3d(0, 0, 0);
        }
    }

    .modal.bottom .modal-dialog {
        animation: slideInFromBottom 0.8s ease-out;
        transform-origin: 50% 100%;
        height: 400px;
        margin: 0;
    }

    .modal.bottom .modal-content {
        width: 100vw; /* Full width of the viewport */
        border-radius: 0; /* Optional: Remove border-radius */
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Search Table</h4>
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
                <form action="{{ route('candidate.search.resutl') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row mb-4">
                                <label for="one" class="col-sm-3 col-form-label">Keyword</label>
                                <div class="col-sm-8">
                                    <input type="text" name="keyword" class="form-control" placeholder="Keyword">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-3 col-form-label">Grouping</label>
                                <div class="col-sm-8">
                                    <select name="" id="" class="form-control">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mb-4">
                                <label for="one" class="col-sm-3 col-form-label">Keyword</label>
                                <div class="col-sm-8">
                                     <input type="text" name="daterange" value="{{ old('daterange', '2023-12-01 - 2024-01-25') }}" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="one" class="col-sm-3 col-form-label">Existing Folder</label>
                                <div class="col-sm-8">
                                    <select name="" id="" class="form-control">
                                        <option value="">Create New</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-5 text-center">
                            <button type="submit" class="btn btn-info btn-sm">Search</button>
                            <button type="submit" class="btn btn-warning btn-sm">Save to Profile</button>
                            <button type="submit" class="btn btn-success btn-sm">Save All</button>
                        </div>

                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Candidate</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Resume Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($data))
                                @foreach ($data as $key => $item)
                                    <tr class="open-modal" data-bs-toggle="modal" data-bs-target="#candidateModal" data-candidate-id="{{ $item['candidate_id'] }}" data-candidate-name="{{ $item['candidate_name'] }}">
                                        <th>{{++$key}}</th>
                                        <th>{{ $item['candidate_name']}}</th>
                                        <th>{{ $item['candidate_mobile']}}</th>
                                        <th>{{ $item['candidate_email']}}</th>
                                        <td>
                                            {{ $item['resume_details'] }}
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Candidate</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Resume Detail</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade bottom" id="candidateModal" tabindex="-1" aria-labelledby="candidateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="modalContent"></span> Remarks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Client</th>
                            <th>Type</th>
                            <th>Remark</th>
                            <th>Created By</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="candidate_remark">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Client</th>
                            <th>Type</th>
                            <th>Remark</th>
                            <th>Created By</th>
                            <th>Date</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>

    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY-MM-DD'
                },
                endDate: moment().format('YYYY-MM-DD')
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var modalTriggerElements = document.querySelectorAll('.open-modal');

        modalTriggerElements.forEach(function (element) {
            element.addEventListener('click', function () {
                var modalContent = document.getElementById('modalContent');
                modalContent.innerHTML = this.getAttribute('data-candidate-name');
                let candidate_id = this.getAttribute('data-candidate-id');
                console.log(candidate_id);
                $.ajax({
                    type: 'GET',
                    url: '/ATS/get/candidate/remarks/' + candidate_id,
                    success: function(response) {
                        console.log('response');
                        var remarks = response.remarks;
                        var tbody = $('#candidate_remark');
                        tbody.empty();
                        for (var i = 1; i <= remarks.length; i++) {
                            var row = '<tr>' +
                                '<th>' + i + '</th>' +
                                '<th>' -- '</th>' +
                                '<th>' + remarks[i].remarkstype_id + '</th>' +
                                '<th>' + remarks[i].remarks + '</th>' +
                                '<td>' + remarks[i].created_by + '</td>' +
                                '<td>' + remarks[i].created_at + '</td>' +
                                '</tr>';
                            tbody.append(row);
                        }

                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    });
</script>
@endsection
