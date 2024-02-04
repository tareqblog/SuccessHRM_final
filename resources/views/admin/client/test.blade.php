@extends('layouts.master')
@section('title')
    Client Management
@endsection
@section('page-title')
    Client Management
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endsection
@section('body')

<style>
    .fixed-table-container {
        position: fixed;
        bottom: 0;
        width: 78%;
        background-color: #fff;
        border-top: 1px solid #ddd;
        padding: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        height: 250px;
        overflow:scroll;
    }

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
        width: 100vw;
        border-radius: 0;
    }
</style>
    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($managers as $manager)
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading{{ $loop->index }}">
                                                <button class="accordion-button fw-medium collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse{{ $loop->index }}"
                                                    aria-expanded="false" aria-controls="flush-collapse{{ $loop->index }}">
                                                    Managers: {{ $manager->employee_name }} - Total
                                                    {{ count($candidatesByManager[$manager->id]) }} Resumes
                                                </button>
                                            </h2>
                                            <div id="flush-collapse{{ $loop->index }}" class="accordion-collapse collapse"
                                                aria-labelledby="flush-heading{{ $loop->index }}"
                                                data-bs-parent="#accordionFlushExample" style="">
                                                <table class="table table-bordered mb-0" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Candidate Name</th>
                                                            <th>Candidate Email</th>
                                                            <th>Resume</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($candidatesByManager[$manager->id] ?? [] as $candidate)
                                                            <tr>
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>{{ $candidate['candidate_name'] }}</td>
                                                                <td>{{ $candidate['candidate_email'] }}</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div><!-- end accordion -->
                                </div><!-- end card-body -->
                            </div>
                        </div>
                    @endforeach
                    @foreach ($team_leader as $team)
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading{{ $loop->index }}">
                                                <button class="accordion-button fw-medium collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse{{ $loop->index }}"
                                                    aria-expanded="false"
                                                    aria-controls="flush-collapse{{ $loop->index }}">
                                                    Team Leader: {{ $team->employee_name }} - Total
                                                    {{ count($candidatesByTeam[$team->id]) }} Resumes
                                                </button>
                                            </h2>
                                            <div id="flush-collapse{{ $loop->index }}" class="accordion-collapse collapse"
                                                aria-labelledby="flush-heading{{ $loop->index }}"
                                                data-bs-parent="#accordionFlushExample" style="">
                                                <table class="table table-bordered mb-0" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Candidate Name</th>
                                                            <th>Candidate Email</th>
                                                            <th>Candidate Resume</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($candidatesByTeam[$team->id] ?? [] as $candidate)
                                                            <tr>
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>{{ $candidate['candidate_name'] }}</td>
                                                                <td>{{ $candidate['candidate_email'] }}</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div><!-- end accordion -->
                                </div><!-- end card-body -->
                            </div>
                        </div>
                    @endforeach
                    @foreach ($consultents as $consultent)
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading{{ $loop->index }}">
                                                <button class="accordion-button fw-medium collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse{{ $loop->index }}"
                                                    aria-expanded="false"
                                                    aria-controls="flush-collapse{{ $loop->index }}">
                                                    Consultent: {{ $consultent->employee_name }} - Total
                                                    {{ count($candidatesByConsultent[$consultent->id]) }} Resumes
                                                </button>
                                            </h2>
                                            <div id="flush-collapse{{ $loop->index }}" class="accordion-collapse collapse"
                                                aria-labelledby="flush-heading{{ $loop->index }}"
                                                data-bs-parent="#accordionFlushExample" style="">
                                                <table class="table table-bordered mb-0" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Candidate Name</th>
                                                            <th>Candidate Email</th>
                                                            <th>Candidate Resume</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($candidatesByConsultent[$consultent->id] ?? [] as $candidate)
                                                            <tr>
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>{{ $candidate['candidate_name'] }}</td>
                                                                <td>{{ $candidate['candidate_email'] }}</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div><!-- end accordion -->
                                </div><!-- end card-body -->
                            </div>
                        </div>
                    @endforeach
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="accordion accordion-active-resume" id="accordionactive-resumeExample">
                                    <div class="accordion-item">
                                        {{-- {{ $loop->index }} --}}
                                        <h2 class="accordion-header" id="active-resume-heading">
                                            <button class="accordion-button fw-medium collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#active-resume-collapse"
                                                aria-expanded="false" aria-controls="active-resume-collapse">
                                                Active Resume
                                            </button>
                                        </h2>
                                        <div id="active-resume-collapse" class="accordion-collapse collapse"
                                            aria-labelledby="active-resume-heading"
                                            data-bs-parent="#accordionactive-resumeExample" style="">
                                            <h5 class="bg-success px-4 py-1 text-white">Candidates Detail</h5>
                                            <table class="table table-bordered mb-0" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Candidate Name</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Manager</th>
                                                        <th>Consultant / Leader</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach ($followUp ?? [] as $candidate)
                                                        @dump($candidate)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="accordion accordion-follow_ups" id="follow_ups">
                                    <div class="accordion-item">
                                        {{-- {{ $loop->index }} --}}
                                        <h2 class="accordion-header" id="follow_ups-heading">
                                            <button class="accordion-button fw-medium collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#follow_ups-collapse"
                                                aria-expanded="false" aria-controls="follow_ups-collapse">
                                                Follow Ups
                                            </button>
                                        </h2>

                                        <div id="follow_ups-collapse" class="accordion-collapse collapse"
                                            aria-labelledby="follow_ups-heading" data-bs-parent="#follow_ups"
                                            style="">
                                            <h5 class="bg-success px-4 py-1 text-white">Candidates Detail</h5>

                                            @foreach ($followUps ?? [] as $day => $candidates)
                                            <p class="bg-info px-4 py-1 text-bold mt-2"><strong>Day {{$day >= 6 ? 'Morethen 5' : $day}}</strong></p>
                                            <table class="table table-bordered mb-0" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Candidate Name</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Manager</th>
                                                        <th>Consultant / Leader</th>
                                                        <th>Date Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($candidates ?? [] as $candidate)
                                                        <tr style="cursor: pointer" class="accordion-row" id="{{ $candidate['id'] }}"  data-candidate-name="{{ $candidate['candidate_name'] }}" >
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_mobile'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>{{ \Carbon\Carbon::parse($candidate['created_at'])->format('d-M-Y') }}</td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="accordion accordion-Interview" id="Interview">
                                    <div class="accordion-item">
                                        {{-- {{ $loop->index }} --}}
                                        <h2 class="accordion-header" id="Interview-heading">
                                            <button class="accordion-button fw-medium collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#Interview-collapse"
                                                aria-expanded="false" aria-controls="Interview-collapse">
                                                Interview
                                            </button>
                                        </h2>

                                        <div id="Interview-collapse" class="accordion-collapse collapse"
                                            aria-labelledby="Interview-heading" data-bs-parent="#Interview"
                                            style="">
                                            <h5 class="bg-success px-4 py-1 text-white">Candidates Detail</h5>
                                            <table class="table table-bordered mb-0" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Candidate Name</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Manager</th>
                                                        <th>Consultant / Leader</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($interviews ?? [] as $candidate)
                                                        <tr style="cursor: pointer" class="accordion-row" id="{{ $candidate['id'] }}"  data-candidate-name="{{ $candidate['candidate_name'] }}" >
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="accordion accordion-blacklist" id="blacklist">
                                    <div class="accordion-item">
                                        {{-- {{ $loop->index }} --}}
                                        <h2 class="accordion-header" id="blacklist-heading">
                                            <button class="accordion-button fw-medium collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#blacklist-collapse"
                                                aria-expanded="false" aria-controls="blacklist-collapse">
                                                Not Suitable/FAJ/Blacklist
                                            </button>
                                        </h2>

                                        <div id="blacklist-collapse" class="accordion-collapse collapse"
                                            aria-labelledby="blacklist-heading" data-bs-parent="#blacklist"
                                            style="">
                                            <h5 class="bg-success px-4 py-1 text-white">Candidates Detail</h5>
                                            <table class="table table-bordered mb-0" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Candidate Name</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Manager</th>
                                                        <th>Consultant / Leader</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($blackListed ?? [] as $candidate)
                                                    <tr style="cursor: pointer" class="accordion-row" id="{{ $candidate['id'] }}"  data-candidate-name="{{ $candidate['candidate_name'] }}" >
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="accordion accordion-total-candidate" id="kiv">
                                    <div class="accordion-item">
                                        {{-- {{ $loop->index }} --}}
                                        <h2 class="accordion-header" id="kiv-heading">
                                            <button class="accordion-button fw-medium collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#kiv-collapse"
                                                aria-expanded="false" aria-controls="kiv-collapse">
                                                KIV
                                            </button>
                                        </h2>

                                        <div id="kiv-collapse" class="accordion-collapse collapse"
                                            aria-labelledby="kiv-heading" data-bs-parent="#kiv" style="">
                                            <h5 class="bg-success px-4 py-1 text-white">Candidates Detail</h5>
                                            <table class="table table-bordered mb-0" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Candidate Name</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Manager</th>
                                                        <th>Consultant / Leader</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach ($followUp ?? [] as $candidate)
                                                        @dump($candidate) --}}
                                                        {{-- <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr> --}}
                                                    {{-- @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="accordion accordion-total-candidate" id="total-candidate">
                                    <div class="accordion-item">
                                        {{-- {{ $loop->index }} --}}
                                        <h2 class="accordion-header" id="total-candidate-heading">
                                            <button class="accordion-button fw-medium collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#total-candidate-collapse"
                                                aria-expanded="false" aria-controls="total-candidate-collapse">
                                                Total Candidate Assign to Client
                                            </button>
                                        </h2>

                                        <div id="total-candidate-collapse" class="accordion-collapse collapse"
                                            aria-labelledby="total-candidate-heading" data-bs-parent="#total-candidate"
                                            style="">
                                            <table class="table table-bordered mb-0" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Candidate Name</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Client Name</th>
                                                        <th>Consultant / Leader</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($assignToClients ?? [] as $candidate)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="fixed-table-container" id="resumeTable" style="display: none">
    <div class="d-flex bd-highlight">
        <div class="flex-grow-1 bd-highlight">
            <h6><span id="cand_name"></span> Remarks</h6>
        </div>
        <div class="bd-highlight" style="margin: 0"><h1 onclick="removeRemark()" style="cursor: pointer; margin: 0 0 0;">-</h1></div>
    </div>

    <table class="table" id="resumeDataTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Client</th>
                <th scope="col">Remark Type</th>
                <th scope="col">Remarks</th>
                <th scope="col">Create By</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody id="candidateResume">

        </tbody>
    </table>
</div>

    @endsection
    @section('scripts')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#candidateTable').DataTable();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let rows = document.querySelectorAll('.accordion-row');
            let dataTableInitialized = false;

            rows.forEach(function (row) {
                row.addEventListener('click', function () {
                    let candidate_id = this.getAttribute('id');

                    let candidate_name = this.getAttribute('data-candidate-name');
                    document.getElementById('cand_name').innerHTML = candidate_name;

                    $.ajax({
                        type: 'GET',
                        url: '/ATS/get/candidate/remarks/' + candidate_id,
                        success: function (response) {
                            let resumeTable = document.getElementById('resumeTable');

                            if (resumeTable.style.display === 'none') {
                                resumeTable.style.display = 'block';
                            }

                            var remarkData = response.remarks;
                            if (dataTableInitialized) {
                                $('#resumeDataTable').DataTable().destroy();
                            }
                            $('#candidateResume').empty();
                            for (var i = 0; i < remarkData.length; i++) {
                                let count = 1 + i;
                                var newRowHtml = '<tr>' +
                                    '<th scope="row">' + count + '</th>' +
                                    '<td>' + remarkData[i].candidate_name + '</td>' +
                                    '<td>' + remarkData[i].remarkstype + '</td>' +
                                    '<td>' + remarkData[i].remarks + '</td>' +
                                    '<td>' + remarkData[i].created_by + '</td>' +
                                    '<td>' + remarkData[i].date + '</td>' +
                                    '</tr>';

                                $('#candidateResume').append(newRowHtml);
                            }

                            if (!dataTableInitialized) {
                                $('#resumeDataTable').DataTable({
                                    "pageLength": 3
                                });
                                dataTableInitialized = true;
                            } else {
                                $('#resumeDataTable').DataTable().destroy();
                                $('#resumeDataTable').DataTable({
                                    "pageLength": 3
                                });
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.resumePath').on('click', function() {
                var filePath = $(this).data('file-path');
                const iframe = document.getElementById('pdfViewer');
                var publicUrl = "{{ asset(Storage::url('')) }}" + "/" + filePath;
                iframe.src = publicUrl;
                iframe.width = "100%";
                iframe.height = "600px";
            });
        });

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

        function removeRemark()
        {
            let resumeTable = document.getElementById('resumeTable');
            if (resumeTable.style.display === 'block') {
                resumeTable.style.display = 'none';
            }
            $('#candidateResume').empty();
        }
    </script>
@endsection
