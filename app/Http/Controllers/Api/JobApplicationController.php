<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\candidate;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function jobStore(Request $request)
    {

        $request->validate([
            'candidate_id' => 'required|integer',
            'name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'resume' => 'required|mimes:pdf,doc,docs,xls,xlsx|max:2048',
            'remarks' => 'nullable'
        ]);

        $file_path = $request->file('resume');

        // Check if $file_path is not empty before proceeding
        if ($file_path) {
            candidate::create([
                'candidate_name' => $request->name,
                'candidate_name' => $request->email,
                'candidate_mobile' => $request->phone_no,
            ]);

            $uploadedFilePath = FileHelper::uploadFile($file_path);
            JobApplication::create($request->except('_token', 'resume') + [
                'resume' => $uploadedFilePath,
            ]);

            $responseMessage = 'Created successfully.';
        } else {
            candidate::create([
                'candidate_name' => $request->name,
                'candidate_name' => $request->email,
                'candidate_mobile' => $request->phone_no,
            ]);

            JobApplication::create($request->except('_token', 'resume'));

            $responseMessage = 'Created successfully.';
        }

        // Check if the request is an API request
        if ($request->is('api/*')) {
            return response()->json(['message' => $responseMessage], 201);
        } else {
            // Use dd to inspect the response before redirection
            dd($responseMessage);

            // Uncomment the line below when you're done debugging
            // return redirect()->route('employee.index')->with('success', $responseMessage);
        }
    }
}
