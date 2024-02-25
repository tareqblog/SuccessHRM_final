


<!-- ========== Left Sidebar Start ========== -->

<button type="button" onclick="toggleSidebar()"  id="toggleMenu" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <!-- <i  class="bx bx-menu align-middle"></i> -->
        <i class="fa-solid fa-bars"></i>
    </button>


<div class="vertical-menu" id="sidebar">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/admin" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-dark-sm.png') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="28">
            </span>
        </a>

        <a href="/admin" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="30">
            </span>
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-light-sm.png') }}" alt="" height="26">
            </span>
        </a>
    </div>

    

    <div data-simplebar class="sidebar-menu-scroll" >
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            {{-- <ul class="metismenu list-unstyled" id="side-menu">
                @foreach ($navbars as $navbarItem)
                    <li>
                        @if (count($navbarItem->childs))
                            <a href="#" class="has-arrow" data-toggle="collapse"
                                data-target="#{{ $navbarItem->slug }}">
                                <i class="{{ $navbarItem->menu_icon }} icon nav-icon"></i>
                                <span class="menu-item"
                                    data-key="{{ $navbarItem->slug }}">{{ $navbarItem->menu_name }}</span>
                            </a>
                        @else
                            <a href="{{ $navbarItem->menu_path }}">
                                <i class="{{ $navbarItem->menu_icon }} icon nav-icon"></i>
                                <span class="menu-item"
                                    data-key="{{ $navbarItem->slug }}">{{ $navbarItem->menu_name }}</span>
                            </a>
                        @endif
                        @if (count($navbarItem->childs))
                            <ul class="sub-menu collapse" aria-expanded="false">
                                @foreach ($navbarItem->childs as $child)
                                    <li><a href="{{ $child->menu_path }}"
                                            data-key="{{ $child->slug }}">{{ $child->menu_name }}</a>
                                        @if (count($child->childs))
                                            <ul class="sub-menu" aria-expanded="false">
                                                @foreach ($child->childs as $lavel2)
                                                    <li><a href="{{ $lavel2->menu_path }}"
                                                            data-key="{{ $lavel2->slug }}">{{ $lavel2->menu_name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    <!-- </li> -->
                @endforeach
            </ul> --}}
            @php
                $usr = Auth::guard('web')->user();
            @endphp
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- @if ($usr->can('admin.dashboard')) --}}
                <li>
                    <a href="{{ route('admin.dashboard.index') }}">
                        <i class="fa fa-home icon nav-icon" aria-hidden="true"></i>
                        <span class="menu-item" data-key="dashboard">Dashboard</span>
                    </a>
                </li>
                {{-- @endif --}}
                @if ($usr->can('clients.index'))
                    <li>
                        <a href="#" class="has-arrow" data-toggle="collapse" data-target="#clients">
                            <i class="fa fa-users icon nav-icon" aria-hidden="true"></i>
                            <span class="menu-item" data-key="clients">Client</span>
                        </a>
                        <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                            {{-- <li><a href="#" data-key="client-login-control">Client Login</a></li> --}}
                            @if ($usr->can('clients.index'))
                                <li><a href="{{ route('clients.index') }}" data-key="">Clients</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($usr->can('tnc.index') || $usr->can('client-term.index') || $usr->can('industry-type.index'))
                    <li>
                        <a href="#" class="has-arrow" data-toggle="collapse" data-target="#client-setting">
                            <i class="fa fa-bitbucket icon nav-icon" aria-hidden="true"></i>
                            <span class="menu-item" data-key="client-setting">Client Settings</span>
                        </a>
                        <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                            @if ($usr->can('tnc.index'))
                                <li><a href="{{ route('tnc.index') }}" data-key="tnc-template">TNC Template</a></li>
                            @endif
                            @if ($usr->can('client-term.index'))
                                <li><a href="{{ route('client-term.index') }}" data-key="client-terms">Client Terms</a>
                                </li>
                            @endif
                            <li><a href="{{ route('job-category.index') }}" data-key="industry-type">Industry Type</a></li>
                            {{-- @if ($usr->can('industry-type.index'))
                                <li><a href="{{ route('industry-type.index') }}" data-key="industry-type">Industry
                                        Type</a></li>
                            @endif --}}
                        </ul>
                    </li>
                @endif
                @if ($usr->can('employee.index'))
                    <li>
                        <a href="#" class="has-arrow" data-toggle="collapse" data-target="#employee">
                            <i class="fa fa-user icon nav-icon" aria-hidden="true"></i>
                            <span class="menu-item" data-key="employee">Employee</span>
                        </a>
                        <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                            @if ($usr->can('employee.index'))
                                <li><a href="{{ route('employee.index') }}" data-key="employees">Employees</a></li>
                            @endif
                            {{-- <li><a href="#" data-key="login-control">Login Control</a></li> --}}
                        </ul>
                    </li>
                @endif
                @if (
                    $usr->can('department.index') ||
                        $usr->can('roles.index') ||
                        $usr->can('users.index') ||
                        $usr->can('religion.index') ||
                        $usr->can('marital-status.index') ||
                        $usr->can('designation.index') ||
                        $usr->can('pass-type.index'))
                    <li>
                        <a href="#" class="has-arrow" data-toggle="collapse" data-target="#employee-setting">
                            <i class="fa fa-won icon nav-icon" aria-hidden="true"></i>
                            <span class="menu-item" data-key="employee-setting">Employee Settings</span>
                        </a>
                        <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                            @if ($usr->can('roles.index'))
                                <li><a href="{{ route('roles.index') }}" data-key="create-role">Create Role</a>

                                </li>
                            @endif
                            @if ($usr->can('users.index'))
                                <li><a href="{{ route('users.index') }}" data-key="all-user">All User</a>

                                </li>
                            @endif
                            @if ($usr->can('department.index'))
                                <li><a href="{{ route('department.index') }}" data-key="department">Department</a></li>
                            @endif
                            @if ($usr->can('religion.index'))
                                <li><a href="{{ route('religion.index') }}" data-key="religion">Religion</a></li>
                            @endif
                            @if ($usr->can('marital-status.index'))
                                <li><a href="{{ route('marital-status.index') }}" data-key="marital-status">Marital
                                        Status</a></li>
                            @endif
                            @if ($usr->can('designation.index'))
                                <li><a href="{{ route('designation.index') }}" data-key="designation">Designation</a>
                                </li>
                            @endif
                            @if ($usr->can('pass-type.index'))
                                <li><a href="{{ route('pass-type.index') }}" data-key="pass-type">Pass Type</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($usr->can('candidate.index') || $usr->can('import.index'))
                    <li>
                        <a href="#" class="has-arrow" data-toggle="collapse" data-target="#candidate">
                            <i class="fa-regular fa-folder-open icon nav-icon" aria-hidden="true"></i>
                            <span class="menu-item" data-key="candidate">Candidate</span>
                        </a>
                        <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                            @if ($usr->can('candidate.create'))
                                <li><a href="{{ route('candidate.create') }}" data-key="candidates">Walk In
                                        Candidate</a></li>
                            @endif
                            @if ($usr->can('candidate.index'))
                                <li><a href="{{ route('candidate.index') }}" data-key="candidates">Candidates</a>
                                </li>
                            @endif
                            @if ($usr->can('import.index'))
                                <li><a href="{{ route('import.index') }}" data-key="import-multiple-candidate">Import
                                        Multiple Candidate</a></li>
                            @endif
                            {{-- @if ($usr->can('import.index')) --}}
                            <li><a href="{{ route('candidates.search') }}" data-key="import-multiple-candidate"><i
                                        class="fa fa-search"></i> Search Function</a></li>
                            {{-- @endif --}}
                        </ul>
                    </li>
                @endif
                @if ($usr->can('remarks-type.index'))
                    <li>
                        <a href="#" class="has-arrow" data-toggle="collapse" data-target="#candidate-setting">
                            <i class="fa fa-stack-exchange icon nav-icon" aria-hidden="true"></i>
                            <span class="menu-item" data-key="candidate-setting">Candidate Settings</span>
                        </a>
                        <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                            {{-- <li><a href="/admin/marital-status" data-key="marital-status-c">Marital Status (C)</a>

                        </li>
                        <li><a href="/admin/religion" data-key="religion-c">Religion (C)</a>

                        </li> --}}
                            <li><a href="{{ route('remarks-type.index') }}" data-key="remark-type">Remark Type</a>

                            </li>
                        </ul>
                    </li>
                @endif
                @if ($usr->can('job.index') || $usr->can('job-application.index'))
                    <li>
                        <a href="#" class="has-arrow" data-toggle="collapse" data-target="#job-opening">
                            <i class="fa-solid fa-business-time icon nav-icon" aria-hidden="true"></i>
                            <span class="menu-item" data-key="job-opening">Jobs Opening</span>
                        </a>
                        <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                            @if ($usr->can('job.index'))
                                <li><a href="{{ route('job.index') }}" data-key="job-posting">Job Posting</a></li>
                            @endif
                            @if ($usr->can('job-application.index'))
                                <li><a href="{{ route('job-application.index') }}" data-key="job-applications">Job
                                        Applications</a>
                            @endif
                    </li>
            </ul>
            </li>
            @endif

            @if ($usr->can('job-category.index') || $usr->can('job-type.index'))
                <li>
                    <a href="#" class="has-arrow" data-toggle="collapse" data-target="#job-setting">
                        <i class="fa fa-sun-o icon nav-icon" aria-hidden="true"></i>
                        <span class="menu-item" data-key="job-setting">Job Setting</span>
                    </a>
                    <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                        @if ($usr->can('job-category.index'))
                            <li><a href="{{ route('job-category.index') }}" data-key="job-category">Job Category</a>

                            </li>
                        @endif
                        @if ($usr->can('job-type.index'))
                            <li><a href="{{ route('job-type.index') }}" data-key="job-type">Job Type</a>

                            </li>
                        @endif
                        {{-- <li><a href="{{ route('job-status.index') }}" data-key="job-status">Job Status</a>

                        </li> --}}
                    </ul>
                </li>
            @endif
            @if ($usr->can('leave.index'))
                <li>
                    <a href="#" class="has-arrow" data-toggle="collapse" data-target="#leave">
                        <i class="fa fa-envelope icon nav-icon" aria-hidden="true"></i>
                        <span class="menu-item" data-key="leave">Leave</span>
                    </a>
                    <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                        @if ($usr->can('leave.index'))
                            <li><a href="{{ route('leave.index') }}" data-key="leaves">Leaves</a>
                            </li>
                        @endif
                        {{-- <li><a href="#" data-key="leave-balance">Leave Balance</a>

                        </li> --}}
                    </ul>
                </li>
            @endif
            @if ($usr->can('leave-type.index'))
                <li>
                    <a href="#" class="has-arrow" data-toggle="collapse" data-target="#leave-setting">
                        <i class="fa fa-user-times icon nav-icon" aria-hidden="true"></i>
                        <span class="menu-item" data-key="leave-setting">Leave Settings</span>
                    </a>
                    <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                        <li><a href="{{ route('leave-type.index') }}" data-key="leave-type">Leave Type</a>

                        </li>
                    </ul>
                </li>
            @endif

            {{-- <li>
                    <a href="/personal-folder">
                        <i class="fa-regular fa-folder icon nav-icon" aria-hidden="true"></i>
                        <span class="menu-item" data-key="personal-folder">Personal Folder</span>
                    </a>
                </li> --}}
            @if ($usr->can('attendence.create') || $usr->can('time-sheet.index'))
                <li>
                    <a href="#" class="has-arrow" data-toggle="collapse" data-target="#attendance">
                        <i class="fa fa-calendar-check-o icon nav-icon" aria-hidden="true"></i>
                        <span class="menu-item" data-key="attendance">Attendance</span>
                    </a>
                    <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                        {{-- <li><a href="#" data-key="attendance-list">Attendance List</a>

                        </li> --}}
                        <li><a href="{{ route('attendence.create') }}" data-key="attendance-candidate">Attendance
                                (Candidate)</a>

                        </li>
                        <li><a href="{{ route('attendence.index') }}" data-key="attendance-candidate">Attendance
                                Lists</a>

                        </li>
                        <li><a href="{{ route('time-sheet.index') }}" data-key="time-sheet">Time Sheet</a>

                        </li>
                    </ul>
                </li>
            @endif

            {{-- <li>
                    <a href="#" class="has-arrow" data-toggle="collapse" data-target="#payroll">
                        <i class="fa-solid fa-hand-holding-dollar icon nav-icon" aria-hidden="true"></i>
                        <span class="menu-item" data-key="payroll">Payroll</span>
                    </a>
                    <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                        <li><a href="/candidate/payroll" data-key="candidate-payroll">Candidate Payroll</a>

                        </li>
                        <li><a href="/invoice" data-key="invoice">Invoice</a>

                        </li>
                    </ul>
                </li> --}}
            {{-- <li>
                    <a href="#" class="has-arrow" data-toggle="collapse" data-target="#payroll-setting">
                        <i class="fa fa-dollar icon nav-icon" aria-hidden="true"></i>
                        <span class="menu-item" data-key="payroll-setting">Payroll Setting</span>
                    </a>
                    <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                        <li><a href="#" data-key="additional-type">Additional Type</a>

                        </li>
                        <li><a href="#" data-key="additional-candidate">Additional (Candidate)</a>

                        </li>
                        <li><a href="#" data-key="deductions-candidate">Deductions (Candidate)</a>

                        </li>
                        <li><a href="#" data-key="giro-no">GIRO No</a>

                        </li>
                    </ul>
                </li> --}}

            {{-- <li>
                    <a href="#" class="has-arrow" data-toggle="collapse" data-target="#report">
                        <i class="fas fa-clock icon nav-icon" aria-hidden="true"></i>
                        <span class="menu-item" data-key="report">Report</span>
                    </a>
                    <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                        <li><a href="/activity" data-key="activity-log">Activity Log</a>

                        </li>
                    </ul>
                </li> --}}
            @if (
                $usr->can('company.index') ||
                    $usr->can('company.index') ||
                    $usr->can('bank.index') ||
                    $usr->can('giro.index') ||
                    $usr->can('nationality.index'))
                <li>
                    <a href="#" class="has-arrow" data-toggle="collapse" data-target="#setting">
                        <i class="fa-solid fa-gear icon nav-icon" aria-hidden="true"></i>
                        <span class="menu-item" data-key="setting">Settings</span>
                    </a>
                    <ul class="sub-menu collapse mm-collapse" aria-expanded="false">
                        {{-- @if ($usr->can('menu.index'))
                        <li><a href="{{route('menu.index')}}" data-key="menu">Menu</a></li>
                        @endif --}}
                        {{-- @if ($usr->can('company.index')) --}}
                        <li>
                            <a href="{{ route('outlets.index') }}" data-key="outlet-profile">Outlets Profile</a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if ($usr->can('company.index'))
                        <li><a href="{{route('company.index')}}" data-key="company-profile">Company Profile</a>

                        </li>
                        @endif --}}
                        {{-- @if ($usr->can('bank.index'))
                        <li><a href="{{route('bank.index')}}" data-key="bank">Bank</a>

                        </li>
                        @endif --}}
                        {{-- @if ($usr->can('giro.index'))

                        <li><a href="{{route('giro.index')}}" data-key="giro">Giro</a>

                        </li>
                        @endif --}}
                        {{-- @if ($usr->can('countries.index')) --}}
                        <li><a href="{{ route('countries.index') }}" data-key="countries">Nationality</a>
                        </li>
                        {{-- @endif --}}
                    </ul>
                </li>
            @endif
            </ul>
        </div>
        <!-- Sidebar -->

    </div>
</div>
<!-- Left Sidebar End -->

<script>
    function toggleSidebar(){
        document.getElementById("sidebar").classList.toggle('active');
    }
</script>