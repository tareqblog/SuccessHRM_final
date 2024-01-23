<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\CandidateRequest;
use App\Http\Requests\PayrollRequest;
use App\Models\candidate;
use App\Models\CandidateFamily;
use App\Models\CandidatePayroll;
use App\Models\CandidateRemark;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
use App\Models\Outlet;
use App\Models\remarkstype;
use App\Models\User;
use App\Models\Paybank;
use App\Models\TimeSheet;
use Illuminate\Support\Facades\Auth;

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
        $datas = candidate::latest()->with('Race')->where('candidate_status', '=', 1)->where('candidate_isDeleted', '=', 0)->get();
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
        $nationality = country::orderBy('id', 'DESC')->get();
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
        $candidate_code = "Cand-".random_int(10000, 99999);

        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path);

            candidate::create($request->except('_token', 'avatar') + [
                'avatar' => $uploadedFilePath,
                'candidate_code' => $candidate_code
            ]);

            return redirect()->route('candidate.index')->with('success', 'Created successfully.');
        } else {

            candidate::create($request->except('_token', 'avatar') + [
                'candidate_code' => $candidate_code
            ]);
            return redirect()->route('candidate.index')->with('success', 'Created successfully.');
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
        $clients = client::where('clients_status', 1)->select('id', 'client_name')->latest()->get();
        $payrolls = CandidatePayroll::where('candidate_id', $candidate->id)->latest()->get();
        $families = CandidateFamily::where('candidate_id', $candidate->id)->latest()->get();
        $time = CandidateWorkingHour::where('candidate_id', $candidate->id)->first();
        $candidate_resume = CandidateResume::where('candidate_id', $candidate->id)->latest()->get();
        $nationality = country::orderBy('id', 'DESC')->get();
        $users = User::latest()->get();
        $Paybanks = Paybank::orderBy('Paybank_seqno')->select('id', 'Paybank_code')->where('Paybank_status', 1)->get();
        $time_sheet = TimeSheet::latest()->get();
        return view('admin.candidate.edit', compact('Paybanks', 'fileTypes', 'client_files', 'candidate', 'outlet_data', 'religion_data', 'passtype_data', 'marital_data', 'race_data', 'department_data', 'designation_data', 'paymode_data', 'remarks_type', 'client_remarks', 'job_types', 'clients', 'payrolls', 'time', 'families', 'candidate_resume', 'nationality', 'users', 'time_sheet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, candidate $candidate)
    {
        if (is_null($this->user) || !$this->user->can('candidate.update')) {
            abort(403, 'Unauthorized');
        }
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


        $filePath = storage_path("app/public/{$candidate->avatar}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$candidate->avatar}");
        }
        $candidate->delete();
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

        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path);

            ClientUploadFile::create([
                'client_id' => $id,
                'file_path' => $uploadedFilePath,
                'file_type_id' => $request->file_type_id,
                'file_type_for' => $request->file_type_for
            ]);

            return back()->with('success', 'Created successfully.');
        } else {
            return back()->with('error', 'Please select a file.');
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
        return back()->with('success', 'Successfully Deleted.');
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

        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            $uploadedFilePath = FileHelper::uploadFile($file_path);

            CandidateResume::create([
                'candidate_id' => $id,
                'resume_name' => $request->resume_name,
                'resume_file_path' => $uploadedFilePath,
            ]);

            return back()->with('success', 'Created successfully.');
        } else {
            return back()->with('error', 'Please select a file.');
        }
    }
    public function resumeDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.resume.delete')) {
            abort(403, 'Unauthorized');
        }
        $file_path_name = CandidateResume::where('id', $id)->value('resume_file_path');

        $filePath = storage_path("app/public/{$file_path_name}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$file_path_name}");
        }
        CandidateResume::where('id', $id)->delete();
        return back()->with('success', 'Successfully Deleted.');
    }

    public function resumeMain(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.resume.main')) {
            abort(403, 'Unauthorized');
        }
        CandidateResume::where('id', '!=', $id)->where('isMain', 1)->update(['isMain' => 0]);
        $candidate = CandidateResume::findOrFail($id);
        $candidate->update(['isMain' => $request->input('isMain')]);
        return back()->with('success', "Assaign Main Successfully.");
    }
    public function remark(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.remark')) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'candidate_id' => 'required|integer',
            'remarkstype_id' => 'required|integer',
            'isNotice' => 'required|boolean',
            'remarks' => 'required',
        ]);

        CandidateRemark::create($request->except('_token') + [
            'candidate_id' => $id,
        ]);
        return redirect()->route('candidate.edit', $id)->with('success', 'Remark added successfully.');
    }


    public function remarkDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.remark.delete')) {
            abort(403, 'Unauthorized');
        }
        CandidateRemark::find($id)->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
    public function payroll(PayrollRequest $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.payroll')) {
            abort(403, 'Unauthorized');
        }
        CandidatePayroll::create($request->except('_token'));
        return back()->with('success', 'Payroll added successfully.');
    }


    public function payrollDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.payroll.delete')) {
            abort(403, 'Unauthorized');
        }
        CandidatePayroll::find($id)->delete();
        return back()->with('success', 'Deleted Successfully.');
    }

    public function workingHour(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.working.hour')) {
            abort(403, 'Unauthorized');
        }
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

        return back()->with('success', 'Working hour successfully updated.');
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
        return back()->with('success', 'Family member added successfully.');
    }
    public function familyDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('candidate.family.delete')) {
            abort(403, 'Unauthorized');
        }
        CandidateFamily::find($id)->delete();
        return back()->with('success', 'Family member removed successfully.');
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
}
