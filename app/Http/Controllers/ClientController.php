<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\ClientRequest;
use App\Models\client;
use App\Models\ClientFollowUp;
use App\Models\clientTerm;
use App\Models\ClientUploadFile;
use App\Models\Employee;
use App\Models\IndustryType;
use App\Models\TncTemplate;
use App\Models\uploadfiletype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = client::latest()->with('industry_type')->get();
        return view('admin.client.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $industries = IndustryType::latest()->get();
        $employees = Employee::latest()->select('id', 'employee_code')->get();
        $users = User::latest()->select('id', 'name')->get();
        $tncs = TncTemplate::latest()->select('id', 'tnc_template_code')->get();
        $client_terms = clientTerm::latest()->select('id', 'client_term_code')->get();
        return view('admin.client.create', compact('industries', 'employees', 'users', 'tncs', 'client_terms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
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
        $industries = IndustryType::latest()->get();
        $employees = Employee::latest()->select('id', 'employee_code')->get();
        $users = User::latest()->select('id', 'name')->get();
        $tncs = TncTemplate::latest()->select('id', 'tnc_template_code')->get();
        $client_terms = clientTerm::latest()->select('id', 'client_term_code')->get();

        $fileTypes = uploadfiletype::where('uploadfiletype_status', 1)->latest()->get();

        $client_files = ClientUploadFile::where('client_id', $client->id)->get();

        return view('admin.client.edit', compact('client', 'industries', 'employees', 'users', 'tncs', 'client_terms', 'fileTypes', 'client_files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, client $client)
    {
        $client->update($request->except('_token'));

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
    public function fileUpload(Request $request, $id)
    {

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

            return back()->with('success', 'Created successfully.');
        } else {
            return back()->with('error', 'Please select a file.');
        }
    }
    public function fileDelete($id)
    {
        $file_path_name = ClientUploadFile::where('id', $id)->value('file_path');

        $filePath = storage_path("app/public/{$file_path_name}");

        if (file_exists($filePath)) {
            Storage::delete("public/{$file_path_name}");
        }
        ClientUploadFile::where('id', $id)->delete();
        return back()->with('success', 'Successfully Deleted.');
    }
    public function followUp(Request $request, $id)
    {

        $request->validate([
            'description' => 'required'
        ]);

        ClientFollowUp::create([
            'client_id' => $request->client_id,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Follow up added successfully.');
    }
}
