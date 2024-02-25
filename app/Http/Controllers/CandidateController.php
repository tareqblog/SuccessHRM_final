<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\CandidateRequest;
use App\Http\Requests\PayrollRequest;
use App\Models\Assign;
use App\Models\AssignClient;
use App\Models\AssignToRc;
use App\Models\Calander;
use App\Models\candidate;
use App\Models\CandidateFamily;
use App\Models\CandidatePayroll;
use App\Models\CandidateRemark;
use App\Models\CandidateRemarkInterview;
use App\Models\CandidateRemarkShortlist;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Department;
use App\Models\paymode;
use App\Models\Race;
use App\Models\maritalStatus;
use App\Models\passtype;
use App\Models\Religion;
use App\Models\uploadfiletype;
use App\Models\ClientUploadFile;
use App\Models\CandidateResume;
use App\Models\CandidateWorkingHour;
use App\Models\client;
use App\Models\jobtype;
use App\Models\country;
use App\Models\Dashboard;
use App\Models\Employee;
use App\Models\Outlet;
use App\Models\remarkstype;
use App\Models\User;
use App\Models\Paybank;
use App\Models\TimeSheet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('candidate.index')) {
            abort(403, 'Unauthorized');
        }

        $auth = Auth::user()->employe;
        $datas = candidate::latest();
        if ($auth->roles_id == 4) {
            $datas->where('manager_id', $auth->id);
        } elseif ($auth->roles_id == 11) {
            $datas->where('team_leader_id', $auth->id);
        } elseif ($auth->roles_id == 8) {
            $datas->where('consultant_id', $auth->id);
        }

        $datas = $datas->where('candidate_status', '=', 1)->where('candidate_isDeleted', '=', 0)->get();

        return view('admin.candidate.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('candidate.create')) {
            abort(403, 'Unauthorized');
        }


        $department_data = Department::orderBy('department_seqno')->where('department_status', '1')->get();
        $designation_data = Designation::orderBy('designation_seqno')->where('designation_status', '1')->get();
        $paymode_data = paymode::orderBy('paymode_seqno')->where('paymode_status', '1')->get();
        $race_data = Race::orderBy('race_seqno')->where('race_status', '1')->get();
        $marital_data = maritalStatus::orderBy('marital_statuses_seqno')->where('marital_statuses_status', '1')->get();
        $passtype_data = passtype::orderBy('passtype_seqno')->where('passtype_status', '1')->get();
        $religion_data = religion::orderBy('religion_seqno')->where('religion_status', '1')->get();
        $outlet_data = Outlet::latest()->get();
        $nationality = country::orderBy('en_country_name')->get();
        $Paybanks = Paybank::orderBy('Paybank_seqno')->select('id', 'Paybank_code')->where('Paybank_status', 1)->get();
        return view('admin.candidate.create', compact('Paybanks', 'outlet_data', 'religion_data', 'passtype_data', 'marital_data', 'race_data', 'department_data', 'designation_data', 'paymode_data', 'nationality'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidateRequest $request)
    {

        if (is_null($this->user) || !$this->user->can('candidate.store')) {
            abort(403, 'Unauthorized');
        }

        $file_path = $request->file('avatar');
        $uploadedFilePath = $file_path ? FileHelper::uploadFile($file_path) : null;

        $candidateData = $request->except('_token', 'avatar') + ['avatar' => $uploadedFilePath];


        $auth = Auth::user()->employe;

        if ($auth->roles_id == 4) {
            $candidateData['manager_id'] = $auth->id;
        } elseif ($auth->roles_id == 11) {
            $candidateData['manager_id'] = $auth->manager_users_id;
            $candidateData['team_leader_id'] = $auth->id;
        } elseif($auth->roles_id == 8) {
            $candidateData['manager_id'] = $auth->manager_users_id;
            $candidateData['team_leader_id'] = $auth->team_leader_users_id;
            $candidateData['consultant_id'] = $auth->id;
        }

        try {
            // Begin a transaction
            DB::beginTransaction();

            $candidate = Candidate::create($candidateData);
            $candidate->update(['candidate_code' => 'Cand-' . $candidate->id]);

            $datas = [
                'candidate_id' => $candidate->id,
                'manager_id' => $candidate->manager_id,
                'teamleader_id' => $candidate->team_leader_id,
                'consultent_id' => $candidate->consultant_id,
                'insert_by' => Auth::user()->id,
            ];

            CandidateRemark::create([
                'candidate_id' => $candidate->id,
                'remarkstype_id' => 1,
                'isNotice' => 0,
                'remarks' => 'Candidate create',
            ]);

            Dashboard::create($datas);
            Assign::create($datas);

            DB::commit();
            return redirect()->route('candidate.index')->with('success', 'Created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(candidate $candidate)
    {
        if (is_null($this->user) || !$this->user->can('candidate.edit')) {
            abort(403, 'Unauthorized');
        }
        $auth = Auth::user()->employe;

        if ($auth->roles_id == 11) {
            $team_leader_id = $auth->id;
        } else {
            if (!empty($auth->team_leader_users_id)) {
                $team_leader_id = $auth->team_leader_users_id;
            } else {
                $team_leader_id = null;
            }
        }

        if ($candidate->team_leader_id == $team_leader_id || $auth->roles_id == 1 || $auth->roles_id == 4) {
            $fileTypes = uploadfiletype::where('uploadfiletype_status', 1)->where('uploadfiletype_for', 1)->latest()->get();
            $department_data = Department::orderBy('department_seqno')->where('department_status', '1')->get();
            $designation_data = Designation::orderBy('designation_seqno')->where('designation_status', '1')->get();
            $paymode_data = paymode::orderBy('paymode_seqno')->where('paymode_status', '1')->get();
            $race_data = Race::orderBy('race_seqno')->where('race_status', '1')->get();
            $marital_data = maritalStatus::orderBy('marital_statuses_seqno')->where('marital_statuses_status', '1')->get();
            $passtype_data = passtype::orderBy('passtype_seqno')->where('passtype_status', '1')->get();
            $religion_data = religion::orderBy('religion_seqno')->where('religion_status', '1')->get();
            $outlet_data = Outlet::orderBy('id')->get();
            $client_files = ClientUploadFile::where('client_id', $candidate->id)->where('file_type_for', 1)->get();
            $remarks_type = remarkstype::where('remarkstype_status', 1)->select('id', 'remarkstype_code')->latest()->get();
            $client_remarks = CandidateRemark::where('candidate_id', $candidate->id)->latest()->get();
            $job_types = jobtype::where('jobtype_status', 1)->select('id', 'jobtype_code')->get();
            $clients = client::where('clients_status', 1)->latest()->get();
            $payrolls = CandidatePayroll::where('candidate_id', $candidate->id)->latest()->get();
            $families = CandidateFamily::where('candidate_id', $candidate->id)->latest()->get();
            $time = CandidateWorkingHour::where('candidate_id', $candidate->id)->first();
            $candidate_resume = CandidateResume::where('candidate_id', $candidate->id)->latest()->get();
            $nationality = country::orderBy('en_country_name')->get();
            $users = Employee::where('roles_id', 4)->where('id', '!=', $auth->id)->latest()->get();
            $Paybanks = Paybank::orderBy('Paybank_seqno')->select('id', 'Paybank_code')->where('Paybank_status', 1)->get();
            $time_sheet = TimeSheet::latest()->get();
            return view('admin.candidate.edit', compact('Paybanks', 'fileTypes', 'client_files', 'candidate', 'outlet_data', 'religion_data', 'passtype_data', 'marital_data', 'race_data', 'department_data', 'designation_data', 'paymode_data', 'remarks_type', 'client_remarks', 'job_types', 'clients', 'payrolls', 'time', 'families', 'candidate_resume', 'nationality', 'users', 'time_sheet'));
        } else {
            return redirect()->back()->with('error', 'Sorry! You enter invalid Candidate id');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, candidate $candidate)
    {
        // return $request;
        if (is_null($this->user) || !$this->user->can('candidate.update')) {
            abort(403, 'Unauthorized');
        }
        $auth = Auth::user()->employe;

        if ($auth->roles_id == 11) {
            $request['manager_id'] = $auth->manager_users_id;
            $request['team_leader_id'] = $auth->id;
        } elseif ($auth->roles_id == 8) {
            $request['manager_id'] = $auth->manager_users_id;
            $request['team_leader_id'] = $auth->team_leader_users_id;
            $request['consultant_id'] = $auth->id;
        }

        $dashboard = Dashboard::where('candidate_id', $candidate->id)->first();
        $dashboard->update([
            'manager_id' => $request['manager_id'],
            'teamleader_id' => $request['team_leader_id'],
            'consultent_id' => $request['consultant_id'],
        ]);

        // return $request;
        if ($request->hasFile('avatar')) {
            // Delete the old file
            Storage::delete("public/{$candidate->avatar}");

            // Upload the new file
            $uploadedFilePath = FileHelper::uploadFile($request->file('avatar'));

            // Update the database record
            $candidate->update($request->except('_token', 'avatar') + [
                'avatar' => $uploadedFilePath,
            ]);
        } else {
            $candidate->update($request->except('_token', 'avatar'));
        }
        return redirect()->route('candidate.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(candidate $candidate)
    {
        if (is_null($this->user) || !$this->user->can('candidate.destroy')) {
            abort(403, 'Unauthorized');
        }


        $candidate->update([
            'candidate_status' => 3,
            'candidate_isDeleted' => 1
        ]);

        $candidate->user()->update([
            'active_status' => 3
        ]);

        // $filePath = storage_path("app/public/{$candidate->avatar}");

        // if (file_exists($filePath)) {
        //     Storage::delete("public/{$candidate->avatar}");
        // }
        // $candidate->delete();
        return back()->with('success', 'Deleted Successfully.');
    }

    public function fileUpload(Request $request, $id)
    {

        if (is_null($this->user) || !$this->user->can('candidate.file.upload')) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'file_path' => 'required|mimes:pdf|max:2048',
            'file_type_id' => 'required',
        ]);

        $file_path = $request->file('file_path');

        $url = '/ATS/candidate/' . $id . '/edit#upload_file';
        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path);

            ClientUploadFile::create([
                'client_id' => $id,
                'file_path' => $uploadedFilePath,
                'file_type_id' => $request->file_type_id,
                'file_type_for' => $request->file_type_for
            ]);

            return redirect($url)->with('success', 'Created successfully.');
        } else {
            return redirect($url)->with('error', 'Please select a file.');
        }
    }

    public function fileDelete($id, candidate $candidate)
    {
        if (is_null($this->user) || !$this->user->can('candidate.file.delete')) {
            abort(403, 'Unauthorized');
        }
        $file_path_name = ClientUploadFile::where('id', $id)->value('file_path');

        $filePath = storage_path("app/public/{$file_path_name}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$file_path_name}");
        }
        ClientUploadFile::where('id', $id)->delete();

        $url = '/ATS/candidate/' . $candidate->id . '/edit#upload_file';
        return redirect($url)->with('success', 'Successfully Deleted.');
    }


    public function resumeUpload(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.resume')) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'resume_name' => 'required|string',
            'resume_file_path' => 'required|mimes:pdf|max:2048',
        ]);

        $file_path = $request->file('resume_file_path');
        $url = '/ATS/candidate/' . $id . '/edit#upload_resume';

        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path, 'candidate');
            $resume_text = generate_text($uploadedFilePath);
            CandidateResume::create([
                'candidate_id' => $id,
                'resume_name' => $request->resume_name,
                'resume_file_path' => $uploadedFilePath,
                'resume_text' => $resume_text
            ]);

            return redirect($url)->with('success', 'Created Successfully.');
        } else {
            return redirect($url)->with('error', 'Please select a file.');
        }
    }
    public function resumeDelete($id, candidate $candidate)
    {
        if (is_null($this->user) || !$this->user->can('candidate.resume.delete')) {
            abort(403, 'Unauthorized');
        }
        $file_path_name = CandidateResume::where('id', $id)->value('resume_file_path');

        $filePath = storage_path("app/public/{$file_path_name}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$file_path_name}");
        }
        CandidateResume::where('id', $candidate->id)->delete();

        return redirect()->route('candidate.edit', [$candidate->id, '#upload_resume'])->with('success', 'successfully Deleted.');
    }

    public function resumeMain(Request $request, candidate $candidate)
    {
        // return $candidate;
        // if (is_null($this->user) || !$this->user->can('candidate.resume.main')) {
        //     abort(403, 'Unauthorized');
        // }
        $candidate = $candidate->load('resumes');
        foreach ($candidate->resumes as $resume) {
            if ($resume->id == $request->resumeId) {
                $resume->update(['isMain' => 1]);
            } else {
                $resume->update(['isMain' => 0]);
            }
        }
        return response()->json(['message' => 'Resumes updated successfully']);
        // CandidateResume::where('id', '!=', $id)->where('isMain', 1)->update(['isMain' => 0]);
        // $candidate = CandidateResume::findOrFail($id);
        // $candidate->update(['isMain' => $request->input('isMain')]);
    }
    public function remark(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.remark')) {
            abort(403, 'Unauthorized');
        }

        $url = '/ATS/candidate/' . $id . '/edit#remark';
        $validator = Validator::make($request->all(), [
            'candidate_id' => 'required|integer',
            'remarkstype_id' => 'required|integer',
            'isNotice' => 'required|boolean',
            'remarks' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect($url)
                ->withErrors($validator)
                ->withInput();
        }

        $validator->validated();

        $candidate = candidate::find($id);

        if(!$candidate) return redirect($url)->with('error', 'Candidate Not Found!!');

        $dashboard = Dashboard::where('candidate_id', $request->candidate_id)->first();

        try {
            // Begin a transaction
            DB::beginTransaction();

            $auth = Auth::user()->employe;
            $candidate_remark = CandidateRemark::create([
                'candidate_id' => $candidate->id,
                'remarkstype_id' => $request->remarkstype_id,
                'isNotice' => $request->isNotice,
                'remarks' => $request->remarks,
                'ar_no' => $request->client_ar_no,
                'assign_to' => $request->Assign_to_manager,
                'client_company' => $request->client_company,
                'created_by' => $auth->id
            ]);

            $dashboard_data = [];
            // return $dashboard;
            $assign_dashboard_remark = assign_dashboard_remark_id($request->remarkstype_id);
            $dashboard_data['remark_id'] = $assign_dashboard_remark['remark_id'];
            $dashboard_data['follow_day'] = $assign_dashboard_remark['follow_day'];
            if ($request->remarkstype_id == 4) {
                $dashboard_data['follow_day'] = ++$dashboard->follow_day;
            }

            $calander = [
                'manager_id' => $candidate->manager_id,
                'teamleader_id' => $candidate->team_leader_id,
                'consultant_id' => $candidate->consultant_id,
                'candidate_remark_id' => $candidate_remark->id,
            ];
            if ($request->remarkstype_id == 6) {
                AssignClient::create([
                    'client_id' => $request->assign_client_id,
                    'candidate_remark_id' => $candidate_remark->id,
                ]);
            }

            if ($request->remarkstype_id == 2) {
                $team = get_team($request->team_leader);
                $request->Assign_to_manager = $team['manager_id'];
                $candidate->update([
                    'manager_id' => $team['manager_id'],
                    'team_leader_id' => $team['team_leader_id'],
                    'consultant_id' => $team['consultant_id'],
                ]);

                $dashboard->update([
                    'manager_id' => $team['manager_id'],
                    'teamleader_id' => $team['team_leader_id'],
                    'consultent_id' => $team['consultant_id'],
                    'remark_id' => $dashboard_data['remark_id'],
                    'follow_day' => $dashboard_data['follow_day'],
                ]);
            }
            if ($request->remarkstype_id == 1) {
                $team = get_team($request->Assign_to_manager);
                $request->Assign_to_manager = $team['manager_id'];
                $candidate->update([
                    'manager_id' => $team['manager_id'],
                    'team_leader_id' => $team['team_leader_id'],
                    'consultant_id' => $team['consultant_id'],
                ]);
                $dashboard->update([
                    'manager_id' => $team['manager_id'],
                    'teamleader_id' => $team['team_leader_id'],
                    'consultent_id' => $team['consultant_id'],
                    'remark_id' => $dashboard_data['remark_id'],
                    'follow_day' => $dashboard_data['follow_day'],
                ]);
            }
            if ($request->remarkstype_id == 12) {
                $team = get_team($request->Assign_to_manager);
                $request->Assign_to_manager = $team['manager_id'];
                $candidate->update([
                    'manager_id' => $team['manager_id'],
                    'team_leader_id' => $team['team_leader_id'],
                    'consultant_id' => $team['consultant_id'],
                ]);
                // return $dashboard;
                $dashboard->update([
                    'manager_id' => $team['manager_id'],
                    'teamleader_id' => $team['team_leader_id'],
                    'consultent_id' => $team['consultant_id'],
                    'remark_id' => $dashboard_data['remark_id'],
                    'follow_day' => $dashboard_data['follow_day'],
                ]);

                // return $dashboard;
            }

            if ($request->remarkstype_id == 11) {
                $team = get_team($auth->id);
                $candidate->update([
                    'manager_id' => $team['manager_id'],
                    'team_leader_id' => $team['team_leader_id'],
                    'consultant_id' => $team['consultant_id'],
                ]);

                $dashboard->update([
                    'manager_id' => $team['manager_id'],
                    'teamleader_id' => $team['team_leader_id'],
                    'consultent_id' => $team['consultant_id'],
                    'remark_id' => $dashboard_data['remark_id'],
                    'follow_day' => $dashboard_data['follow_day'],
                ]);
            }

            if($request->remarkstype_id == 3)
            {
                AssignToRc::create([
                    'candidate_id' => $request->candidate_id,
                    'rc_id' => $request->rc_id,
                ]);
            }
            if ($request->remarkstype_id == 9) {
                $team = get_team($request->Assign_to_manager);
                $request->Assign_to_manager = $team['manager_id'];
                // return $candidate;
                $candidate->update([
                    'manager_id' => $team['manager_id'],
                    'team_leader_id' => $team['team_leader_id'],
                    'consultant_id' => $team['consultant_id'],
                ]);
                $dashboard->update([
                    'manager_id' => $team['manager_id'],
                    'teamleader_id' => $team['team_leader_id'],
                    'consultent_id' => $team['consultant_id'],
                    'remark_id' => $dashboard_data['remark_id'],
                    'follow_day' => $dashboard_data['follow_day'],
                ]);
            }

            if ($request->remarkstype_id == 7) {
                $list = CandidateRemarkShortlist::create([
                    'candidate_remark_id' => $candidate_remark->id,
                    'salary' => $request->shortlistSalary,
                    'depertment' => $request->shortlistDepartment,
                    'hourly_rate' => $request->shortlistHourlyRate,
                    'placement_recruitment_fee' => $request->shortlistPlacement,
                    'admin_fee' => $request->shortlistAdminFee,
                    'start_date' => $request->shortlistStartDate,
                    'end_date' => $request->shortlistContractEndDate,
                    'job_title' => $request->shortlistJobTitle,
                    'reminder_period' => $request->shortlistReminderPeriod,
                    'job_type' => $request->shortlistJobType,
                    'contact_signing_time' => $request->shortlistContractSigningTime,
                    'contact_signing_date' => $request->shortlistContractSigningDate,
                    'probition_period' => $request->shortlistProbationPeriod,
                    'last_day' => $request->shortlistLastDay,
                    'email_notice_time' => $request->shortlistEmailNoticeTime,
                    'email_notice_date' => $request->shortlistEmailNoticeDate,
                ]);

                $calander['candidate_remark_shortlist_id'] = $list->id;
                if ($list->end_date != null) {
                    $calander['title'] = 'Contract Ending -'. $candidate->consultant->employee_code . '-' . $candidate_remark->client->client_name;
                    $calander['date'] = $list->end_date;
                    $calander['status'] = 4;
                    Calander::create($calander);
                }
                if ($list->start_date != null) {
                    $calander['title'] = 'Shortlisted -' . $candidate->consultant->employee_code . '-' . $candidate_remark->client->client_name;
                    $calander['date'] = $list->start_date;
                    $calander['status'] = 2;
                    Calander::create($calander);
                }
                if ($list->contact_signing_date != null) {
                    $calander['title'] = Carbon::parse($list->contact_signing_time)->format('h:i A') . ' -Contract Signing -'. $candidate->consultant->employee_code . '-' . $candidate_remark->client->client_name;
                    $calander['date'] = $list->contact_signing_date;
                    $calander['status'] = 3;
                    Calander::create($calander);
                }
            }

            if ($request->remarkstype_id == 5) {
                $list = CandidateRemarkInterview::create([
                    'candidate_remark_id' => $candidate_remark->id,
                    'interview_date' => $request->interview_date,
                    'interview_time' => $request->interview_time,
                    'interview_by' => $request->interview_by,
                    'interview_position' => $request->interview_position,
                    'interview_company' => $request->interview_company,
                    'expected_salary' => $request->interview_expected_salary,
                    'job_offer_salary' => $request->inteview_job_offer_salary,
                    'available_date' => $request->available_date,
                    'receive_job_offer' => $request->interview_received_job_offer,
                    'email_notice_date' => $request->interviewEmailNoticeDate,
                    'attend_interview' => $request->attendInterview,
                ]);

                $calander['candidate_remark_shortlist_id'] = $list->id;
                $calander['title'] = Carbon::parse($list->interview_time)->format('h:i A') . ' - Interview -' . $candidate->consultant->employee_code . '-' . $list->company->outlet_name;
                $calander['date'] = $list->interview_date;
                $calander['status'] = 1;
                Calander::create($calander);
            }

            $candidate = candidate::find($id);
            Assign::create([
                'candidate_id' => $candidate->id,
                'manager_id' => $request->Assign_to_manager ?? $candidate->manager_id,
                'teamleader_id' => $candidate->team_leader_id ?? null,
                'consultent_id' => $candidate->consultant_id ?? null,
                'insert_by' => Auth::user()->id,
                'remark_id' => $assign_dashboard_remark['remark_id']
            ]);

            DB::commit();
            return redirect($url)->with('success', 'Remark added successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect($url)->with('error', $e->getMessage());
        }
    }


    public function remarkDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.remark.delete')) {
            abort(403, 'Unauthorized');
        }
        $candidate = CandidateRemark::find($id);
        $candidate_id = $candidate->candidate_id;
        $candidate->delete();

        return redirect()->route('candidate.edit', [$candidate_id, '#remark'])->with('success', 'Deleted successfully.');
    }
    public function payroll(PayrollRequest $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.payroll')) {
            abort(403, 'Unauthorized');
        }
        CandidatePayroll::create($request->except('_token'));

        return redirect()->route('candidate.edit', [$request->candidate_id, '#payroll'])->with('success', 'Payroll added successfully.');
    }


    public function payrollDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.payroll.delete')) {
            abort(403, 'Unauthorized');
        }
        $candidate = CandidatePayroll::find($id);
        $candidate_id = $candidate;
        $candidate->delete();

        return redirect()->route('candidate.edit', [$candidate_id, '#payroll'])->with('success', 'Deleted Successfully.');
    }

    public function workingHour(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.working.hour')) {
            abort(403, 'Unauthorized');
        }

        // return $request;
        $request->validate([
            'candidate_id' => 'required|integer',
            'timesheet_id' => 'required|integer',
            'schedul_type' => 'required|string',
            'schedul_day' => 'required|integer',
            'remarks' => 'nullable',
        ]);
        $candidate = CandidateWorkingHour::where('candidate_id', $id)->first();
        if (!$candidate) {
            CandidateWorkingHour::create($request->except('_token'));
        } else {
            $candidate->update($request->except('_token'));
        }

        return redirect()->route('candidate.edit', [$id, '#working_hour'])->with('success', 'Working hour successfully updated.');
    }
    public function family(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.family')) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'candidate_id' => 'integer|required',
            'name' => 'string|required',
            'age' => 'integer|required',
            'relationship' => 'string|required',
            'occupation' => 'string|required',
            'contact_no' => 'string|required',
        ]);
        CandidateFamily::create($request->except('_token'));

        return redirect()->route('candidate.edit', [$request->candidate_id, '#family'])->with('success', 'Family member added successfully.');
    }
    public function familyDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.family.delete')) {
            abort(403, 'Unauthorized');
        }
        $candidate = CandidateFamily::find($id);
        $candidate_id = $candidate->id;
        $candidate->delete();

        return redirect()->route('candidate.edit', [$candidate_id, '#family'])->with('success', 'Family member removed successfully.');
    }

    public function timeSheetData($sheetTypeId)
    {
        // if (is_null($this->user) || !$this->user->can('candidate.timesheet.data')) {
        //     abort(403, 'Unauthorized');
        // }
        $timeSheet = TimeSheet::with('entries')
            ->find($sheetTypeId);

        $data = [
            'sunday'    => $timeSheet->entries->where('day', 'Sunday')->first(),
            'monday'    => $timeSheet->entries->where('day', 'Monday')->first(),
            'tuesday'   => $timeSheet->entries->where('day', 'Tuesday')->first(),
            'wednesday' => $timeSheet->entries->where('day', 'Wednesday')->first(),
            'thursday'  => $timeSheet->entries->where('day', 'Thursday')->first(),
            'friday'    => $timeSheet->entries->where('day', 'Friday')->first(),
            'saturday'  => $timeSheet->entries->where('day', 'Saturday')->first(),
        ];

        return response()->json($data);
    }

    public function candidates_edit_remark(candidate $candidate, CandidateRemark $remark)
    {
        if (is_null($this->user) || !$this->user->can('candidate.edit')) {
            abort(403, 'Unauthorized');
        }
        $auth = Auth::user()->employe;

        $fileTypes = uploadfiletype::where('uploadfiletype_status', 1)->where('uploadfiletype_for', 1)->latest()->get();
        $department_data = Department::orderBy('department_seqno')->where('department_status', '1')->get();
        $designation_data = Designation::orderBy('designation_seqno')->where('designation_status', '1')->get();
        $paymode_data = paymode::orderBy('paymode_seqno')->where('paymode_status', '1')->get();
        $race_data = Race::orderBy('race_seqno')->where('race_status', '1')->get();
        $marital_data = maritalStatus::orderBy('marital_statuses_seqno')->where('marital_statuses_status', '1')->get();
        $passtype_data = passtype::orderBy('passtype_seqno')->where('passtype_status', '1')->get();
        $religion_data = religion::orderBy('religion_seqno')->where('religion_status', '1')->get();
        $outlet_data = Outlet::orderBy('id')->get();
        $client_files = ClientUploadFile::where('client_id', $candidate->id)->where('file_type_for', 1)->get();
        $remarks_type = remarkstype::where('remarkstype_status', 1)->select('id', 'remarkstype_code')->latest()->get();
        $client_remarks = CandidateRemark::where('candidate_id', $candidate->id)->latest()->get();
        $job_types = jobtype::where('jobtype_status', 1)->select('id', 'jobtype_code')->get();
        $clients = client::where('clients_status', 1)->latest()->get();
        $payrolls = CandidatePayroll::where('candidate_id', $candidate->id)->latest()->get();
        $families = CandidateFamily::where('candidate_id', $candidate->id)->latest()->get();
        $time = CandidateWorkingHour::where('candidate_id', $candidate->id)->first();
        $candidate_resume = CandidateResume::where('candidate_id', $candidate->id)->latest()->get();
        $nationality = country::orderBy('en_country_name')->get();
        $users = Employee::where('roles_id', 4)->where('id', '!=', $auth->id)->latest()->get();
        $Paybanks = Paybank::orderBy('Paybank_seqno')->select('id', 'Paybank_code')->where('Paybank_status', 1)->get();
        $time_sheet = TimeSheet::latest()->get();

        return view('admin.candidate.remarkedit', compact('Paybanks', 'fileTypes', 'client_files', 'candidate', 'outlet_data', 'religion_data', 'passtype_data', 'marital_data', 'race_data', 'department_data', 'designation_data', 'paymode_data', 'remarks_type', 'client_remarks', 'job_types', 'clients', 'payrolls', 'time', 'families', 'candidate_resume', 'nationality', 'users', 'time_sheet', 'remark'));
    }

    public function candidate_remark_update(Request $request, CandidateRemark $remark)
    {
        $url = '/ATS/candidate/' . $remark->candidate_id . '/edit#remark';

        $auth = Auth::user()->employe;
        $validator = Validator::make($request->all(), [
            'remarks' => 'string|required',
            'ar_no' => 'string|nullable',
            'assign_to' => 'numeric|nullable',
            'client_company' => 'numeric|nullable',
        ]);

        if ($validator->fails()) {
            return redirect($url)
            ->withErrors($validator)
            ->withInput();
        }

        $validated = $validator->validated();
        $validated['modify_by'] = $auth->id;

        $candidate = candidate::find($remark->candidate_id);

        if (!$candidate) return redirect($url)->with('error', 'Candidate Not Found!!');

        $dashboard = Dashboard::where('candidate_id', $request->candidate_id)->first();

        try {
            DB::beginTransaction();

            $candidate_remark = $remark->update($validated);

            if ($remark->remarkstype_id == 7) {
                $shortlist = CandidateRemarkShortlist::find($request->shortlist_id);

                $data =[
                    'salary' => $request->shortlistSalary,
                    'depertment' => $request->shortlistDepartment,
                    'hourly_rate' => $request->shortlistHourlyRate,
                    'placement_recruitment_fee' => $request->shortlistPlacement,
                    'admin_fee' => $request->shortlistAdminFee,
                    'start_date' => $request->shortlistStartDate,
                    'end_date' => $request->shortlistContractEndDate,
                    'job_title' => $request->shortlistJobTitle,
                    'reminder_period' => $request->shortlistReminderPeriod,
                    'job_type' => $request->shortlistJobType,
                    'contact_signing_time' => $request->shortlistContractSigningTime,
                    'contact_signing_date' => $request->shortlistContractSigningDate,
                    'probition_period' => $request->shortlistProbationPeriod,
                    'last_day' => $request->shortlistLastDay,
                    'email_notice_time' => $request->shortlistEmailNoticeTime,
                    'email_notice_date' => $request->shortlistEmailNoticeDate,
                ];

                $shortlist->update($data);
                Calander::where('candidate_remark_shortlist_id', $shortlist->id)->delete();

                $calander = [];
                $calander['candidate_remark_shortlist_id'] = $shortlist->id;
                if ($shortlist->end_date != null) {
                    $calander['title'] = 'Contract Ending -' . $candidate->consultant->employee_code . '-' . $remark->outlet->outlet_name;
                    $calander['date'] = $shortlist->end_date;
                    $calander['status'] = 4;
                    Calander::create($calander);
                }
                if ($shortlist->start_date != null) {
                    $calander['title'] = 'Shortlisted -' . $candidate->consultant->employee_code . '-' . $remark->outlet->outlet_name;
                    $calander['date'] = $shortlist->start_date;
                    $calander['status'] = 2;
                    Calander::create($calander);
                }
                if ($shortlist->contact_signing_date != null) {
                    $calander['title'] = Carbon::parse($shortlist->contact_signing_time)->format('h:i A') . ' -Contract Signing -' . $candidate->consultant->employee_code . '-' . $remark->outlet->outlet_name;
                    $calander['date'] = $shortlist->contact_signing_date;
                    $calander['status'] = 3;
                    Calander::create($calander);
                }
            }

            if ($remark->remarkstype_id == 5) {
                $interview = CandidateRemarkInterview::find($request->interview_id);
                $data = [
                    'interview_date' => $request->interview_date,
                    'interview_time' => $request->interview_time,
                    'interview_by' => $request->interview_by,
                    'interview_position' => $request->interview_position,
                    'interview_company' => $request->interview_company,
                    'expected_salary' => $request->interview_expected_salary,
                    'job_offer_salary' => $request->inteview_job_offer_salary,
                    'available_date' => $request->available_date,
                    'receive_job_offer' => $request->interview_received_job_offer,
                    'email_notice_time' => $request->interviewEmailNoticeTime,
                    'email_notice_date' => $request->interviewEmailNoticeDate,
                    'attend_interview' => $request->attendInterview,
                ];

                $interview->update($data);

                $interview = CandidateRemarkInterview::find($request->interview_id);
                $calander_up['title'] = Carbon::parse($interview->interview_time)->format('h:i A') . ' - Interview -' . $candidate->consultant->employee_code . '-' . $interview->company->outlet_name;
                $calander_up['date'] = $interview->interview_date;
                $calander = Calander::where('candidate_remark_shortlist_id', $interview->id)->first();
                $calander->update($calander_up);
            }

            DB::commit();
            return redirect($url)->with('success', 'Remark added successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect($url)->with('error', $e->getMessage());
        }
    }
}
