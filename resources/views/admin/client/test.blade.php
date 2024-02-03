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
                                                    @foreach ($followUp ?? [] as $candidate)
                                                        @dump($candidate)
                                                        {{-- <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr> --}}
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
                                            <p class="bg-info px-4 py-1 text-bold mt-2">Day</p>
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
                                                    @foreach ($followUp ?? [] as $candidate)
                                                        <tr>
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
                                                    @foreach ($followUp ?? [] as $candidate)
                                                        @dump($candidate)
                                                        {{-- <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr> --}}
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
                                                    @foreach ($followUp ?? [] as $candidate)
                                                        @dump($candidate)
                                                        {{-- <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr> --}}
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
                                                    @foreach ($followUp ?? [] as $candidate)
                                                        @dump($candidate)
                                                        {{-- <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr> --}}
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
                                                    @foreach ($followUp ?? [] as $candidate)
                                                        @dump($candidate)
                                                        {{-- <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $candidate['candidate_name'] }}</td>
                                                            <td>{{ $candidate['candidate_email'] }}</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr> --}}
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
    @endsection
