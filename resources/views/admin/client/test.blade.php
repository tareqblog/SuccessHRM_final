@extends('layouts.master')
@section('title')
    Client Management
@endsection
@section('page-title')
    Client Management
@endsection
@section('body')

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
                </div>
            </div>
        </div>
    @endsection
