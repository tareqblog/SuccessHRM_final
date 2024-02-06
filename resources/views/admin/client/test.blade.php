@extends('layouts.master')
@section('title')
    Client Management
@endsection
@section('page-title')
    Client Management
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link href="{{ URL::asset('build/libs/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css" />
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
            overflow: scroll;
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
                    @foreach ($managers as $key => $manager)
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
                                                <table class="table table-bordered mb-0 myTable">
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
                                                <table class="table table-bordered mb-0 myTable" id="9">
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
                                                <table class="table table-bordered mb-0 myTable" id="myTable8">
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
                                            <table class="table table-bordered mb-0" id="myTable7">
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
                                                    @foreach ($activeResumes ?? [] as $candidate)
                                                        <tr style="cursor: pointer" class="accordion-row"
                                                            id="{{ $candidate['id'] }}"
                                                            data-candidate-name="{{ $candidate['candidate_name'] }}">
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>

                                                                {{-- @dump($candidate->getMainResumeFilePath()) --}}
                                                                <button type="button"
                                                                    class="btn btn-info btn-sm me-2 mb-2 resumePath"
                                                                    data-bs-toggle="modal" data-bs-target="#showResume"
                                                                    data-file-path="{{ $candidate->getMainResumeFilePath() }}">d</button>
                                                            </td>
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
                                                <p class="bg-info px-4 py-1 text-bold mt-2"><strong>Day
                                                        {{ $day >= 6 ? 'Morethen 5' : $day }}</strong></p>
                                                <table class="table table-bordered mb-0" id="myTable{{ $day }}">
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
                                                            <tr style="cursor: pointer" class="accordion-row"
                                                                id="{{ $candidate['id'] }}"
                                                                data-candidate-name="{{ $candidate['candidate_name'] }}">
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>{{ $candidate['candidate_name'] }}</td>
                                                                <td>{{ $candidate['candidate_mobile'] }}</td>
                                                                <td>{{ $candidate['candidate_email'] }}</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>{{ \Carbon\Carbon::parse($candidate['created_at'])->format('d-M-Y') }}
                                                                </td>
                                                                <td>

                                                                    {{-- @dump($candidate->getMainResumeFilePath()) --}}
                                                                    <button type="button"
                                                                        class="btn btn-info btn-sm me-2 mb-2 resumePath"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#showResume"
                                                                        data-file-path="{{ $candidate->getMainResumeFilePath() }}">d</button>
                                                                </td>
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
                                            <table class="table table-bordered mb-0" id="myTable10">
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
                                                        <tr style="cursor: pointer" class="accordion-row"
                                                            id="{{ $candidate['id'] }}"
                                                            data-candidate-name="{{ $candidate['candidate_name'] }}">
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>

                                                                {{-- @dump($candidate->getMainResumeFilePath()) --}}
                                                                <button type="button"
                                                                    class="btn btn-info btn-sm me-2 mb-2 resumePath"
                                                                    data-bs-toggle="modal" data-bs-target="#showResume"
                                                                    data-file-path="{{ $candidate->getMainResumeFilePath() }}">d</button>
                                                            </td>
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
                                            <table class="table table-bordered mb-0" id="myTable11">
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
                                                        <tr style="cursor: pointer" class="accordion-row"
                                                            id="{{ $candidate['id'] }}"
                                                            data-candidate-name="{{ $candidate['candidate_name'] }}">
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>

                                                                {{-- @dump($candidate->getMainResumeFilePath()) --}}
                                                                <button type="button"
                                                                    class="btn btn-info btn-sm me-2 mb-2 resumePath"
                                                                    data-bs-toggle="modal" data-bs-target="#showResume"
                                                                    data-file-path="{{ $candidate->getMainResumeFilePath() }}">d</button>
                                                            </td>
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
                                            <table class="table table-bordered mb-0" id="myTable12">
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

                                                    @if (isset($kibs))
                                                        @foreach ($kivs ?? [] as $candidate)
                                                            <tr style="cursor: pointer" class="accordion-row"
                                                                id="{{ $candidate['id'] }}"
                                                                data-candidate-name="{{ $candidate['candidate_name'] }}">
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>{{ $candidate['candidate_name'] }}</td>
                                                                <td>{{ $candidate['candidate_email'] }}</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>

                                                                    {{-- @dump($candidate->getMainResumeFilePath()) --}}
                                                                    <button type="button"
                                                                        class="btn btn-info btn-sm me-2 mb-2 resumePath"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#showResume"
                                                                        data-file-path="{{ $candidate->getMainResumeFilePath() }}">d</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
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
                                            <table class="table table-bordered mb-0" id="myTable13">
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
                                                            <td></td>
                                                            <td>

                                                                {{-- @dump($candidate->getMainResumeFilePath()) --}}
                                                                <button type="button"
                                                                    class="btn btn-info btn-sm me-2 mb-2 resumePath"
                                                                    data-bs-toggle="modal" data-bs-target="#showResume"
                                                                    data-file-path="{{ $candidate->getMainResumeFilePath() }}">d</button>
                                                            </td>
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
                <div class="bd-highlight" style="margin: 0">
                    <h1 onclick="removeRemark()" style="cursor: pointer; margin: 0 0 0;">-</h1>
                </div>
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

        <div class="row">
            <div class="col-xl-3">
                <div class="card card-h-100">
                    <div class="card-body">
                        <button class="btn btn-primary w-100" id="btn-new-event"><i class="mdi mdi-plus"></i> Create
                            New Event</button>

                        <div id="external-events">
                            <br>
                            <p class="text-muted">Drag and drop your event or click in the calendar</p>
                            <div class="external-event fc-event bg-success" data-class="bg-success">
                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>New Event Planning
                            </div>
                            <div class="external-event fc-event bg-info" data-class="bg-info">
                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Meeting
                            </div>
                            <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating Reports
                            </div>
                            <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create New theme
                            </div>
                        </div>

                        <div class="row justify-content-center mt-5">
                            <img src="{{ URL::asset('build/images/calendar-img.png') }}" alt=""
                                class="img-fluid d-block">
                        </div>

                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-xl-9">
                <div class="card card-h-100">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        <div style='clear:both'></div>

        <!-- Add New Event MODAL -->
        <div class="modal fade" id="event-modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header py-3 px-4 border-bottom-0">
                        <h5 class="modal-title" id="modal-title">Event</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                    </div>
                    <div class="modal-body p-4">
                        <form class="needs-validation" name="event-form" id="form-event" novalidate>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Event Name</label>
                                        <input class="form-control" placeholder="Insert Event Name" type="text"
                                            name="title" id="event-title" required value="" />
                                        <div class="invalid-feedback">Please provide a valid event name</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-select shadow-none" name="category" id="event-category"
                                            required>
                                            <option value="" selected> --Select-- </option>
                                            <option value="bg-danger">Danger</option>
                                            <option value="bg-success">Success</option>
                                            <option value="bg-primary">Primary</option>
                                            <option value="bg-info">Info</option>
                                            <option value="bg-dark">Dark</option>
                                            <option value="bg-warning">Warning</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a valid event category</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-light me-1"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- end modal-content-->
            </div> <!-- end modal dialog-->
        </div>
        <!-- end modal-->

        @include('admin.candidate.inc.resume__modal')
    @endsection
    @section('scripts')
        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script src="{{ URL::asset('build/libs/fullcalendar/main.min.js') }}"></script>
        {{-- <script src="{{ URL::asset('build/js/pages/calendar.init.js') }}"></script> --}}

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let defaultEvents = @json($allRemarks);
                console.log("Candidates:", defaultEvents);

                var addEvent = new bootstrap.Modal(document.getElementById('event-modal'), {
                    keyboard: false
                })
                document.getElementById('event-modal');
                var modalTitle = document.getElementById('modal-title');
                var formEvent = document.getElementById('form-event');
                var selectedEvent = null;
                var newEventData = null;
                var forms = document.getElementsByClassName('needs-validation');
                var selectedEvent = null;
                var newEventData = null;
                var eventObject = null;
                /* initialize the calendar */

                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var Draggable = FullCalendar.Draggable;
                var externalEventContainerEl = document.getElementById('external-events');

                // init dragable
                new Draggable(externalEventContainerEl, {
                    itemSelector: '.external-event',
                    eventData: function(eventEl) {
                        return {
                            title: eventEl.innerText,
                            start: new Date(),
                            className: eventEl.getAttribute('data-class')
                        };
                    }
                });

                var draggableEl = document.getElementById('external-events');
                var calendarEl = document.getElementById('calendar');

                function addNewEvent(info) {
                    addEvent.show();
                    formEvent.classList.remove("was-validated");
                    formEvent.reset();
                    selectedEvent = null;
                    modalTitle.innerText = 'Add Event';
                    newEventData = info;
                }

                function getInitialView() {
                    if (window.innerWidth >= 768 && window.innerWidth < 1200) {
                        return 'timeGridWeek';
                    } else if (window.innerWidth <= 768) {
                        return 'listMonth';
                    } else {
                        return 'dayGridMonth';
                    }
                }

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    timeZone: 'local',
                    editable: false,
                    initialView: getInitialView(),
                    themeSystem: 'bootstrap',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                    },
                    // responsive
                    windowResize: function(view) {
                        var newView = getInitialView();
                        calendar.changeView(newView);
                    },
                    eventDidMount: function(info) {
                        if (info.event.extendedProps.status === 'done') {

                            // Change background color of row
                            info.el.style.backgroundColor = 'red';

                            // Change color of dot marker
                            var dotEl = info.el.getElementsByClassName('fc-event-dot')[0];
                            if (dotEl) {
                                dotEl.style.backgroundColor = 'white';
                            }
                        }
                    },
                    eventClick: function(info) {
                        document.getElementById("btn-delete-event").style.display = "block";
                        addEvent.show();
                        formEvent.reset();
                        document.getElementById("event-title").value[0] = "";
                        selectedEvent = info.event;
                        document.getElementById("event-title").value = selectedEvent.title;
                        document.getElementById('event-category').value = selectedEvent.classNames[0];
                        newEventData = null;
                        modalTitle.innerText = 'Edit Event';
                        newEventData = null;
                    },
                    dateClick: function(info) {
                        document.getElementById("btn-delete-event").style.display = "none";
                        addNewEvent(info);
                    },
                    events: defaultEvents
                });
                calendar.render();

                /*Add new event*/
                // Form to add new event

                formEvent.addEventListener('submit', function(ev) {
                    ev.preventDefault();

                    var updatedTitle = document.getElementById("event-title").value;
                    var updatedCategory = document.getElementById('event-category').value;

                    // validation
                    if (forms[0].checkValidity() === false) {
                        forms[0].classList.add('was-validated');
                    } else {
                        if (selectedEvent) {
                            selectedEvent.setProp("title", updatedTitle);
                            selectedEvent.setProp("classNames", [updatedCategory]);
                        } else {
                            var newEvent = {
                                title: updatedTitle,
                                start: newEventData.date,
                                allDay: newEventData.allDay,
                                className: updatedCategory
                            }
                            calendar.addEvent(newEvent);
                        }
                        addEvent.hide();
                    }
                });

                document.getElementById("btn-delete-event").addEventListener("click", function(e) {
                    if (selectedEvent) {
                        selectedEvent.remove();
                        selectedEvent = null;
                        selectedEvent.hide();
                    }
                });
                document.getElementById("btn-new-event").addEventListener("click", function(e) {
                    document.getElementById("btn-delete-event").style.display = "none";
                    addNewEvent({
                        date: new Date(),
                        allDay: true
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.myTable').DataTable();
                $('#myTable1').DataTable();
                $('#myTable2').DataTable();
                $('#myTable3').DataTable();
                $('#myTable4').DataTable();
                $('#myTable5').DataTable();
                $('#myTable6').DataTable();
                $('#myTable7').DataTable();
                $('#myTable8').DataTable();
                $('#myTable9').DataTable();
                $('#myTable10').DataTable();
                $('#myTable11').DataTable();
                $('#myTable12').DataTable();
                $('#myTable13').DataTable();
            });

            $(document).ready(function() {
                $('#candidateTable').DataTable();
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let rows = document.querySelectorAll('.accordion-row');
                let dataTableInitialized = false;

                rows.forEach(function(row) {
                    row.addEventListener('click', function() {
                        let candidate_id = this.getAttribute('id');

                        let candidate_name = this.getAttribute('data-candidate-name');
                        document.getElementById('cand_name').innerHTML = candidate_name;

                        $.ajax({
                            type: 'GET',
                            url: '/ATS/get/candidate/remarks/' + candidate_id,
                            success: function(response) {
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
                            error: function(error) {
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
                    console.log(publicUrl);
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
                    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                        .format('YYYY-MM-DD'));
                });
            });

            function removeRemark() {
                let resumeTable = document.getElementById('resumeTable');
                if (resumeTable.style.display === 'block') {
                    resumeTable.style.display = 'none';
                }
                $('#candidateResume').empty();
            }
        </script>
    @endsection
