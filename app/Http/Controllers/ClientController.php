<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\ClientRequest;
use App\Imports\ClientImport;
use App\Models\client;
use App\Models\ClientDepartment;
use App\Models\ClientFollowUp;
use App\Models\clientTerm;
use App\Models\ClientUploadFile;
use App\Models\Employee;
use App\Models\IndustryType;
use App\Models\TncTemplate;
use App\Models\uploadfiletype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('clients.index')) {
            abort(403, 'Unauthorized');
        }
        $datas = client::latest()->with('industry_type','Employee')->get();
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

        $industries = IndustryType::orderBy('industry_seqno')->where('industry_status',1)->get();
        $employees = Employee::latest()->where('roles_id','!=','13')->Where('roles_id','!=','14')->where('employee_status', 1)->select('id', 'employee_name')->get();
        $employees_payroll = Employee::latest()->where('roles_id','=','13')->orWhere('roles_id','=','14')->where('employee_status',1)->select('id', 'employee_name')->get();
        $users = User::latest()->select('id', 'name')->get();
        $tncs = TncTemplate::orderBy('tnc_template_seqno')->where('tnc_template_status',1)->select('id', 'tnc_template_code')->get();
        $client_terms = clientTerm::orderBy('client_term_seqno')->where('client_term_status',1)->select('id', 'client_term_code')->get();
        return view('admin.client.create', compact('industries', 'employees','employees_payroll', 'users', 'tncs', 'client_terms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('clients.store')) {
            abort(403, 'Unauthorized');
        }
        client::create($request->except('_token'));
        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        if (is_null($this->user) || !$this->user->can('clients.edit')) {
            abort(403, 'Unauthorized');
        }
        $departments = ClientDepartment::where('client_id', $client->id)->latest()->get();
        $industries = IndustryType::orderBy('industry_seqno')->where('industry_status',1)->get();
        $employees = Employee::latest()->where('roles_id','!=','13')->Where('roles_id','!=','14')->where('employee_status', 1)->select('id', 'employee_name')->get();
        $employees_payroll = Employee::latest()->where('roles_id','=','13')->orWhere('roles_id','=','14')->where('employee_status', 1)->select('id', 'employee_name')->get();
        $users = User::latest()->select('id', 'name')->get();
        $tncs = TncTemplate::orderBy('tnc_template_seqno')->where('tnc_template_status',1)->select('id', 'tnc_template_code')->get();
        $client_terms = clientTerm::orderBy('client_term_seqno')->where('client_term_status',1)->select('id', 'client_term_code')->get();

        $fileTypes = uploadfiletype::where('uploadfiletype_status', 1)->where('uploadfiletype_for',0)->latest()->get();

        $client_files = ClientUploadFile::where('client_id', $client->id)->get();
        $client_followup = ClientFollowUp::where('clients_id', $client->id)->get();

        return view('admin.client.edit', compact('departments','client', 'industries', 'employees', 'employees_payroll','users', 'tncs', 'client_terms', 'fileTypes', 'client_files','client_followup'));
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
            $uploadedFilePath = FileHelper::uploadFile($file_path);

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

        //dd($request);
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
    public function clientImport(Request $request)  {
        Excel::import(new ClientImport, $request->file('client_import_file'));
    }


    public function clientDepartmentStore(Request $request) {
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

    public function clientDepartmentDelete($id) {
        ClientDepartment::find($id)->delete();

        $url = '/ATS/clients/' . request()->department_delete . '/edit#department';
        return redirect($url)->with('success', 'Successfully Deleted.');
    }


}
