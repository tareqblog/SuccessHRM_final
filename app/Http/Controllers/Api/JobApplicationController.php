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
        $validator = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone_no' => 'required',
            'resume' => 'required|mimes:pdf,xls,xlsx,doc,docs|max:2048',
            'remark' => 'nullable',
        ]);

        if ($validator) {
            $jobApplication = JobApplication::create($request->except('_token'));

            return response()->json(['message' => 'Job application created successfully'], 201);
        } else {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }
    }
}
