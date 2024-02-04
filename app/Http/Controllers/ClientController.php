<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Helpers\FileHelper;
use App\Http\Requests\ClientRequest;
use App\Imports\ClientImport;
use App\Models\candidate;
use App\Models\client;
use App\Models\ClientDepartment;
use App\Models\ClientFollowUp;
use App\Models\ClientSupervisor;
use App\Models\clientTerm;
use App\Models\ClientUploadFile;
use App\Models\Employee;
use App\Models\IndustryType;
use App\Models\jobcategory;
use App\Models\TncTemplate;
use App\Models\uploadfiletype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
// use Maatwebsite\Excel\Excel;
use Excel;

class ClientController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    public function test()
    {
        $auth = Auth::user()->employe;
        $managers = [];
        $candidatesByManager = [];
        $consultents = [];
        $candidatesByConsultent = [];
        $team_leader = [];
        $candidatesByTeam = [];
        $followUps = [];
        $activeResume = [];
        $interviews = [];
        $blackListed = [];
        $assignToClients = [];

        if ($auth->roles_id == 1) {
            $managers = Employee::where('roles_id', 4)->get();
            foreach ($managers as $manager) {
                $managerId = $manager->id;
                $candidatesForManager = Employee::getCandidatesForManager($managerId);
                $candidatesByManager[$managerId] = $candidatesForManager;
                $followUps = Employee::getCandidatesForManagerLatestRemark($managerId);
                $interviews = Employee::getCandidatesForManagerInterviews($managerId);
                $blackListed = Employee::getCandidatesForManagerblackListed($managerId);
                $assignToClients = Employee::getCandidatesForManagerassignToClient($managerId);
            }
        } elseif ($auth->roles_id == 4) {
            $team_leader = Employee::where('roles_id', 11)->where('manager_users_id', $auth->id)->get();
            foreach ($team_leader as $team) {
                $teamId = $team->id;
                $candidatesForTeam = Employee::getCandidatesForTeamLeader($teamId);
                $candidatesByTeam[$teamId] = $candidatesForTeam;
                $consultents = Employee::where('roles_id', 8)->where('team_leader_users_id', $teamId)->get();
                foreach ($consultents as $consultent) {
                    $consultentId = $consultent->id;
                    $candidatesForConsultent = Employee::getCandidatesForConsultent($consultentId);
                    $candidatesByConsultent[$consultentId] = $candidatesForConsultent;
                }
            }
        } elseif ($auth->roles_id == 11) {
            $consultents = Employee::where('roles_id', 8)->where('team_leader_users_id', $auth->id)->get();
            foreach ($consultents as $consultent) {
                $consultentId = $consultent->id;
                $candidatesForConsultent = Employee::getCandidatesForConsultent($consultentId);
                $candidatesByConsultent[$consultentId] = $candidatesForConsultent;
            }
        }

        return view('admin.client.test', compact(
            'candidatesByManager',
            'managers',
            'candidatesByTeam',
            'team_leader',
            'candidatesByConsultent',
            'consultents',
            'followUps',
            'interviews',
            'blackListed',
            'assignToClients',
        ));
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('clients.index')) {
            abort(403, 'Unauthorized');
        }

        $auth = Auth::user()->employe;
        $datas = client::latest()->with('industry_type', 'Employee');
        if ($auth->roles_id == 11) {
            $datas->where('team_leader_id', $auth->id);
        } else {
            if (!empty($auth->team_leader_users_id)) {
                $datas->where('team_leader_id', $auth->team_leader_users_id);
            }
        }



        $datas = $datas->get();



        return view('admin.client.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('clients.create')) {
            abort(403, 'Unauthorized');
        }

        // $industries = IndustryType::orderBy('industry_seqno')->where('industry_status',1)->get();
        $job_categories = jobcategory::select('id', 'jobcategory_name')->get();
        $employees = Employee::latest()->where('roles_id', '!=', '13')->Where('roles_id', '!=', '14')->where('employee_status', 1)->select('id', 'employee_name')->get();
        $employees_payroll = Employee::latest()->where('roles_id', '=', '13')->orWhere('roles_id', '=', '14')->where('employee_status', 1)->select('id', 'employee_name')->get();
        $users = User::latest()->select('id', 'name')->get();
        $tncs = TncTemplate::orderBy('tnc_template_seqno')->where('tnc_template_status', 1)->select('id', 'tnc_template_code')->get();
        $client_terms = clientTerm::orderBy('client_term_seqno')->where('client_term_status', 1)->select('id', 'client_term_code')->get();
        return view('admin.client.create', compact('job_categories', 'employees', 'employees_payroll', 'users', 'tncs', 'client_terms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('clients.store')) {
            abort(403, 'Unauthorized');
        }


        $user = Auth::user()->id;


        $employee = Employee::where('user_table_id', $user)->first();

        if ($employee->roles_id == 11) {
            $team_leader_id = $employee->id;
        } else {
            $team_leader_id = $employee->team_leader_users_id;
            $consultent_id = $employee->id;
        }

        // dd($team_leader_id.$consultent_id);

        client::create($request->except('_token') + [
            'team_leader_id' => $team_leader_id ?? '',
            'consultant_id' => $consultent_id ?? '',
        ]);
        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        if (is_null($this->user) || !$this->user->can('clients.edit')) {
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
        if ($client->team_leader_id == $team_leader_id) {
            $departments = ClientDepartment::where('client_id', $client->id)->latest()->get();
            $job_categories = jobcategory::select('id', 'jobcategory_name')->get();
            $employees = Employee::latest()->where('roles_id', '!=', '13')->Where('roles_id', '!=', '14')->where('employee_status', 1)->select('id', 'employee_name')->get();
            $employees_payroll = Employee::latest()->where('roles_id', '=', '13')->orWhere('roles_id', '=', '14')->where('employee_status', 1)->select('id', 'employee_name')->get();
            $users = User::latest()->select('id', 'name')->get();
            $tncs = TncTemplate::orderBy('tnc_template_seqno')->where('tnc_template_status', 1)->select('id', 'tnc_template_code')->get();
            $client_terms = clientTerm::orderBy('client_term_seqno')->where('client_term_status', 1)->select('id', 'client_term_code')->get();

            $fileTypes = uploadfiletype::where('uploadfiletype_status', 1)->where('uploadfiletype_for', 0)->latest()->get();

            $client_files = ClientUploadFile::where('client_id', $client->id)->get();
            $client_followup = ClientFollowUp::where('clients_id', $client->id)->orderBy('created_at', 'DESC')->get();



            return view('admin.client.edit', compact('departments', 'client', 'job_categories', 'employees', 'employees_payroll', 'users', 'tncs', 'client_terms', 'fileTypes', 'client_files', 'client_followup'));
        } else {
            return redirect()->back()->with('error', 'Sorry! You enter invalid Client id');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, client $client)
    {
        if (is_null($this->user) || !$this->user->can('clients.update')) {
            abort(403, 'Unauthorized');
        }
        $client->update($request->except('_token'));

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        if (is_null($this->user) || !$this->user->can('candidate.destroy')) {
            abort(403, 'Unauthorized');
        }
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
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

        // Check if $file_path is not empty before proceeding

        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path, 'client');

            ClientUploadFile::create([
                'client_id' => $id,
                'file_path' => $uploadedFilePath,
                'file_type_id' => $request->file_type_id
            ]);

            $url = '/ATS/clients/' . $id . '/edit#upload_file';
            return redirect($url)->with('success', 'Created successfully.');
        } else {
            $url = '/ATS/clients/' . $id . '/edit#upload_file';
            return redirect($url)->with('error', 'Please select a file.');
        }
    }
    public function fileDelete($id)
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
        $url = '/ATS/clients/' . request()->file_delete . '/edit#upload_file';
        return redirect($url)->with('success', 'Successfully Deleted.');
    }
    public function followUp(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.followup')) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'description' => 'required',
            'clients_id' => 'required'
        ]);

        ClientFollowUp::create([
            'description' => $request->description,
            'clients_id' => $request->clients_id
        ]);

        $url = '/ATS/clients/' . $request->clients_id . '/edit#follow_up';

        return redirect($url)->with('success', 'Follow up added successfully.');
    }

    public function folowupDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.followup.delete')) {
            abort(403, 'Unauthorized');
        }

        ClientFollowUp::where('id', $id)->delete();

        $url = '/ATS/clients/' . request()->followup_delete . '/edit#follow_up';

        return redirect($url)->with('success', 'Successfully Deleted.');
    }
    public function clientImport(Request $request)
    {
        Excel::import(new ClientImport, $request->file('client_import_file'));
    }


    public function clientDepartmentStore(Request $request)
    {
        $request->validate([
            'client_id' => 'required|integer',
            'name' => 'string|required',
            'remarks' => 'nullable',
        ]);

        ClientDepartment::create([
            'client_id' => $request->client_id,
            'name' => $request->name,
            'remarks' => $request->remarks
        ]);

        $url = '/ATS/clients/' . $request->client_id . '/edit#department';

        return redirect($url)->with('success', 'Successfully Created.');
    }

    public function clientDepartmentDelete($id)
    {
        ClientDepartment::find($id)->delete();

        $url = '/ATS/clients/' . request()->department_delete . '/edit#department';
        return redirect($url)->with('success', 'Successfully Deleted.');
    }

    public function supervisorStore(Request $request, client $client)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'department' => 'string',
            'direct_number' => 'string',
            'remark' => 'string',
            'defination' => 'string',
            'log_email' => 'required|email',
        ]);

        $url = '/ATS/clients/' . $client->id . '/edit#supervisor';
        if ($validator->fails()) {
            return redirect($url)
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->log_email,
                'password' => bcrypt($request->password),
                'role' => 9,
            ]);

            ClientSupervisor::create([
                'client_id' => $client->id,
                'user_id' => $user->id,
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'department' => $request->department,
                'direct_number' => $request->direct_number,
                'remark' => $request->remark,
                'defination' => $request->defination,
            ]);

            DB::commit();
            return redirect($url)->with('success', 'Successfully Added.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect($url)->with('error', $e->getMessage());
        }
    }

    public function deleteSupervisor(ClientSupervisor $supervisor)
    {
        $url = '/ATS/clients/' . $supervisor->client_id . '/edit#supervisor';
        DB::beginTransaction();

        try {
            User::destroy($supervisor->user_id);

            $supervisor->delete();
            DB::commit();
            return redirect($url)->with('success', 'Successfully Added.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect($url)->with('error', $e->getMessage());
        }
    }


    public function updateFollowUp(Request $request, $id)
    {

        $request->validate([
            'description' => 'required',
            'clients_id' => 'required'
        ]);

        $followup = ClientFollowUp::find($id);

        $followup->update([
            'description' => $request->description,
            'clients_id' => $request->clients_id
        ]);

        $url = '/ATS/clients/' . $request->clients_id . '/edit#follow_up';

        return redirect($url)->with('success', 'Follow up added successfully.');
    }
}
