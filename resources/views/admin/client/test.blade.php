@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('page-title')
    Dashboard
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link href="{{ URL::asset('build/libs/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('body')
    <style>
        .fc-event-time {
            display: none;
        }

        .fc-daygrid-event-dot {
            display: none;
        }

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

        .form-select {
            font-size: 0.8rem;
            line-height: 1;
            padding: 0 0.8rem;
            margin: 0;
        }
    </style>

    <body>
    @endsection
    @section('content')

    @php
        $auth = Auth::user()->employe;
    @endphp
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
                                                            id="{{ $candidate['candidate_id'] }}"
                                                            data-candidate-name="{{ $candidate->candidate['candidate_name'] }}">
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate->candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate->candidate['candidate_home_phone'] }}</td>
                                                            <td>{{ $candidate->candidate['candidate_email'] }}</td>
                                                            <td>{{ $candidate->candidate['manager']['employee_name'] }}
                                                            </td>
                                                            <td>{{ $candidate->candidate?->consultant?->employee_name ?? $candidate->candidate?->team_leader?->employee_name }}
                                                            </td>
                                                            <td class="d-flex flex-row">
                                                                @if ($auth->roles_id == 4)
                                                                    @include('admin.dashboard.inc.select')
                                                                @endif
                                                                <a class="btn btn-warning btn-sm me-2 resumePath" href="{{ URL::to('/ATS/candidate/'.$candidate->candidate_id.'/edit#remark') }}">R</a>
                                                                @if($candidate->candidate->getMainResumeFilePath() != null)
                                                                <button type="button"
                                                                    class="btn btn-info me-2 resumePath  btn-sm"
                                                                    data-bs-toggle="modal" data-bs-target="#showResume"
                                                                    data-file-path="{{ $candidate->candidate->getMainResumeFilePath() }}">D</button>
                                                                @endif
                                                                <a onclick="changeRemarkBlock({{ $candidate['id'] }})" class="btn btn-danger btn-sm me-2 resumePath">X</a>
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
                                                        {{ $day >= 6 ? 'More Then 5 Day' : $day }}</strong></p>
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
                                                                id="{{ $candidate['candidate_id'] }}"
                                                                data-candidate-name="{{ $candidate->candidate['candidate_name'] }}">
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>{{ $candidate->candidate['candidate_name'] }}</td>
                                                                <td>{{ $candidate->candidate['candidate_home_phone'] }}
                                                                </td>
                                                                <td>{{ $candidate->candidate['candidate_email'] }}</td>
                                                                <td>{{ $candidate->candidate['manager']['employee_name'] }}
                                                                </td>
                                                                <td>{{ $candidate->candidate?->consultant?->employee_name ?? $candidate->candidate?->team_leader?->employee_name }}
                                                                </td>
                                                                <td>{{ \Carbon\Carbon::parse($candidate->candidate['created_at'])->format('d-M-Y') }}
                                                                </td>
                                                                <td class="d-flex flex-row">
                                                                    @if ($auth->roles_id == 4)
                                                                        @include('admin.dashboard.inc.select')
                                                                    @endif
                                                                    <a class="btn btn-warning btn-sm me-2 resumePath" href="{{ URL::to('/ATS/candidate/'.$candidate->candidate_id.'/edit#remark') }}">R</a>
                                                                    @if($candidate->candidate->getMainResumeFilePath() != null)
                                                                        <button type="button"
                                                                            class="btn btn-info btn-sm me-2 mb-2 resumePath  btn-sm"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#showResume"
                                                                            data-file-path="{{ $candidate->candidate->getMainResumeFilePath() }}">D</button>
                                                                    @endif
                                                                    <a onclick="changeRemarkBlock({{ $candidate['id'] }})" class="btn btn-danger btn-sm me-2 mb-2 resumePath  btn-sm">X</a>
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
                                                            id="{{ $candidate['candidate_id'] }}"
                                                            data-candidate-name="{{ $candidate->candidate['candidate_name'] }}">
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate->candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate->candidate['candidate_home_phone'] }}
                                                            </td>
                                                            <td>{{ $candidate->candidate['candidate_email'] }}</td>
                                                            <td>{{ $candidate->candidate['manager']['employee_name'] }}
                                                            </td>
                                                            <td>{{ $candidate->candidate?->consultant?->employee_name ?? $candidate->candidate?->team_leader?->employee_name }}
                                                            </td>
                                                            <td class="d-flex flex-row">
                                                                @if ($auth->roles_id == 4)
                                                                    @include('admin.dashboard.inc.select')
                                                                @endif
                                                                <a class="btn btn-warning btn-sm me-2 resumePath" href="{{ URL::to('/ATS/candidate/'.$candidate->candidate_id.'/edit#remark') }}">R</a>
                                                                @if($candidate->candidate->getMainResumeFilePath() != null)
                                                                <button type="button"
                                                                    class="btn btn-info btn-sm me-2 mb-2 resumePath btn-sm"
                                                                    data-bs-toggle="modal" data-bs-target="#showResume"
                                                                    data-file-path="{{ $candidate->candidate->getMainResumeFilePath() }}">D</button>
                                                                @endif
                                                                <a onclick="changeRemarkBlock({{ $candidate['id'] }})" class="btn btn-danger btn-sm me-2 mb-2 resumePath btn-sm">X</a>
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
                                                Not Suitable/FAJ/Blacklist/Drop
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
                                                        {{-- remark_id --}}
                                                        <tr style="cursor: pointer" class="accordion-row"
                                                            id="{{ $candidate['candidate_id'] }}"
                                                            data-candidate-name="{{ $candidate->candidate['candidate_name'] }}">
                                                            <td
                                                                class="{{ $candidate['remark_id'] == 8 ? 'text-danger' : '' }}">
                                                                {{ $loop->index + 1 }}</td>
                                                            <td
                                                                class="{{ $candidate['remark_id'] == 8 ? 'text-danger' : '' }}">
                                                                {{ $candidate->candidate['candidate_name'] }}</td>
                                                            <td
                                                                class="{{ $candidate['remark_id'] == 8 ? 'text-danger' : '' }}">
                                                                {{ $candidate->candidate['candidate_home_phone'] }}
                                                            </td>
                                                            <td
                                                                class="{{ $candidate['remark_id'] == 8 ? 'text-danger' : '' }}">
                                                                {{ $candidate->candidate['candidate_email'] }}</td>
                                                            <td
                                                                class="{{ $candidate['remark_id'] == 8 ? 'text-danger' : '' }}">
                                                                {{ $candidate->candidate['manager']['employee_name'] }}
                                                            </td>
                                                            <td>{{ $candidate->candidate?->consultant?->employee_name ?? $candidate->candidate?->team_leader?->employee_name }}
                                                            </td>
                                                            <td class="d-flex flex-row {{ $candidate['remark_id'] == 8 ? 'text-danger' : '' }}">
                                                                @if ($auth->roles_id == 4)
                                                                    @include('admin.dashboard.inc.select')
                                                                @endif
                                                                <a class="btn btn-warning btn-sm me-2 resumePath" href="{{ URL::to('/ATS/candidate/'.$candidate->candidate_id.'/edit#remark') }}">R</a>
                                                                @if($candidate->candidate->getMainResumeFilePath() != null)
                                                                <button type="button"
                                                                    class="btn btn-info me-2 mb-2 resumePath btn-sm"
                                                                    data-bs-toggle="modal" data-bs-target="#showResume"
                                                                    data-file-path="{{ $candidate->candidate->getMainResumeFilePath() }}">D</button>
                                                                @endif
                                                                <a onclick="changeRemarkBlock({{ $candidate['id'] }})" class="btn btn-danger me-2 mb-2 resumePath btn-sm">X</a>
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

                                                    @if (isset($kivs))
                                                        @foreach ($kivs ?? [] as $candidate)
                                                            <tr style="cursor: pointer" class="accordion-row"
                                                                id="{{ $candidate['candidate_id'] }}"
                                                                data-candidate-name="{{ $candidate->candidate['candidate_name'] }}">
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>{{ $candidate->candidate['candidate_name'] }}</td>
                                                                <td>{{ $candidate->candidate['candidate_home_phone'] }}
                                                                </td>
                                                                <td>{{ $candidate->candidate['candidate_email'] }}</td>
                                                                <td>{{ $candidate->candidate['manager']['employee_name'] }}
                                                                </td>
                                                                <td>{{ $candidate->candidate?->consultant?->employee_name ?? $candidate->candidate?->team_leader?->employee_name }}
                                                                </td>
                                                                <td class="d-flex flex-row">
                                                                    @if ($auth->roles_id == 4)
                                                                        @include('admin.dashboard.inc.select')
                                                                    @endif
                                                                    <a class="btn btn-warning btn-sm me-2 resumePath" href="{{ URL::to('/ATS/candidate/'.$candidate->candidate_id.'/edit#remark') }}">R</a>
                                                                    @if($candidate->candidate?->getMainResumeFilePath() != null)
                                                                    <button type="button"
                                                                        class="btn btn-info btn-sm me-2 mb-2 resumePath"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#showResume"
                                                                        data-file-path="{{ $candidate->candidate->getMainResumeFilePath() }}">D</button>
                                                                    @endif
                                                                    <a onclick="changeRemarkBlock({{ $candidate['id'] }})" class="btn btn-danger btn-sm me-2 mb-2 resumePath">X</a>
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
                                                        <tr style="cursor: pointer" class="accordion-row"
                                                            id="{{ $candidate['candidate_id'] }}"
                                                            data-candidate-name="{{ $candidate->candidate['candidate_name'] }}">
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate->candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate->candidate['candidate_home_phone'] }}
                                                            </td>
                                                            <td>{{ $candidate->candidate['candidate_email'] }}</td>
                                                            <td>{{ $candidate->candidate['manager']['employee_name'] }}
                                                            </td>
                                                            <td>{{ $candidate->candidate?->consultant?->employee_name ?? $candidate->candidate?->team_leader?->employee_name }}
                                                            </td>
                                                            <td class="d-flex flex-row">
                                                                @if ($auth->roles_id == 4)
                                                                    @include('admin.dashboard.inc.select')
                                                                @endif

                                                                @if($candidate->candidate?->getMainResumeFilePath() != null)
                                                                <button type="button"
                                                                    class="btn btn-info btn-sm me-2 mb-2 resumePath"
                                                                    data-bs-toggle="modal" data-bs-target="#showResume"
                                                                    data-file-path="{{ $candidate->candidate->getMainResumeFilePath() }}">D</button>
                                                                @endif
                                                                <a onclick="changeRemarkBlock({{ $candidate['id'] }})" class="btn btn-danger btn-sm me-2 mb-2 resumePath">X</a>
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
                    @if ($auth->roles_id == 8)
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="accordion accordion-active-resume" id="accordionactive-resumeExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="active-resume-heading">
                                            <button class="accordion-button fw-medium collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#active-resume-collapse"
                                                aria-expanded="false" aria-controls="active-resume-collapse">
                                                New Candidate Assigned to You
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
                                                            id="{{ $candidate['candidate_id'] }}"
                                                            data-candidate-name="{{ $candidate->candidate['candidate_name'] }}">
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate->candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate->candidate['candidate_home_phone'] }}</td>
                                                            <td>{{ $candidate->candidate['candidate_email'] }}</td>
                                                            <td>{{ $candidate->candidate['manager']['employee_name'] }}
                                                            </td>
                                                            <td>{{ $candidate->candidate?->consultant?->employee_name ?? $candidate->candidate?->team_leader?->employee_name }}
                                                            </td>
                                                            <td class="d-flex flex-row">
                                                                @include('admin.dashboard.inc.select')
                                                                @if($candidate->candidate->getMainResumeFilePath() != null)
                                                                <button type="button"
                                                                    class="btn btn-info me-2 resumePath btn-sm"
                                                                    data-bs-toggle="modal" data-bs-target="#showResume"
                                                                    data-file-path="{{ $candidate->candidate->getMainResumeFilePath() }}">D</button>
                                                                @endif
                                                                <a onclick="changeRemarkBlock({{ $candidate['id'] }})" class="btn btn-danger btn-sm me-2 resumePath">X</a>
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
                    @endif
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
            <div class="col-xl-12">
                <div class="card card-h-100">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        <div style='clear:both'></div>
        {{--
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
        <!-- end modal--> --}}

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
                let defaultEvents = @json($calander_datas);

                /* initialize the calendar */
                let calendarEl = document.getElementById('calendar');

                let calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    themeSystem: 'bootstrap',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                    },
                    events: defaultEvents,
                    eventClick: function(info) {
                        if (info.event.extendedProps && info.event.extendedProps.url) {
                            // Open the URL in a new tab
                            window.open(info.event.extendedProps.url, '_blank');
                        }
                    },
                    eventMouseEnter: function(info) {
                        $(info.el).tooltip({
                            title: info.event.title,
                            placement: 'top',
                            trigger: 'hover',
                            container: 'body'
                        });
                        $(info.el).tooltip('show');
                    },
                });
                calendar.render();
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
                                console.log(response);
                                let resumeTable = document.getElementById('resumeTable');

                                if (resumeTable.style.display === 'none') {
                                    resumeTable.style.display = 'block';
                                }

                                let remarkData = response.remarks;
                                if (dataTableInitialized) {
                                    $('#resumeDataTable').DataTable().destroy();
                                }
                                $('#candidateResume').empty();
                                for (let i = 0; i < remarkData.length; i++) {
                                    let count = 1 + i;
                                    let newRowHtml = '<tr>' +
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
                    let filePath = $(this).data('file-path');
                    const iframe = document.getElementById('pdfViewer');
                    let publicUrl = "{{ asset(Storage::url('')) }}" + "/" + filePath;
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

            $(document).ready(function() {
                $('select.form-select').change(function() {
                    var dashboardId = $(this).attr('id').split('_')[1];
                    var remarkId = $(this).val();
                    var confirmed = confirm('Are you sure you want to change?');

                    if (confirmed) {
                        var redirectUrl = '/ATS/change/dashboard/remark/' + dashboardId + '/' + remarkId;
                        window.location.href = redirectUrl;
                    }
                });
            });

            function changeRemarkBlock(dashboard) {
                let remarkId = 8;
                var confirmed = confirm('Are you sure you want to proceed?');
                if (confirmed) {
                    window.location.href = '/ATS/change/dashboard/remark/' + dashboard + '/' + remarkId;
                }
            }

        </script>
    @endsection
