<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\candidate;
use App\Models\CandidateFileImport;
use App\Models\CandidateResume;
use App\Models\ImportCandidateData;
use App\Models\TemporaryImportedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Files\TemporaryFile;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Spatie\PdfToText\Pdf;

class CandidateFileImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $importData = ImportCandidateData::where('user_id', Auth::id())->get();

        $temporary_data = TemporaryImportedData::where('created_by', Auth::id())->get();

        return view('admin.candidate.import', compact('importData', 'temporary_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CandidateFileImport $candidateFileImport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CandidateFileImport $candidateFileImport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CandidateFileImport $candidateFileImport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CandidateFileImport $candidateFileImport)
    {
        //
    }

    public function upload_old(Request $request)
    {

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $uploadedFiles = [];

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                // Check if the file extension is allowed
                if (in_array($extension, ['pdf', 'doc', 'docx', 'xls', 'xlsx'])) {
                    // Store the file
                    $path = FileHelper::uploadFile($file);
                    // Read the file content (you might need specific logic per file type)
                    $data = $this->extractData($path, $extension);

                    $uploadedFiles[] = [
                        'path' => $path,
                        'data' => $data,
                    ];
                }
            }

            return view('admin.candidate.import')->with('uploadedFiles', $uploadedFiles);
        }

        return back()->with('error', 'No valid files were selected.');
    }
    public function upload(Request $request)
    {
        $validatedData = $request->validate([
            'files.*' => 'mimes:pdf,doc,docx,xls,xlsx'
        ]);

        if ($request->hasFile('files')) {
            $uploadedFiles = [];
            foreach ($request->file('files') as $file) {
                $filename = $file->getClientOriginalName();
                $path = FileHelper::uploadFile($file);
                //    dd($path);
                //$file->storeAs('uploads', $filename); // Store file in storage/uploads directory
                ImportCandidateData::create([
                    'user_id' => Auth::user()->id,
                    'resume_path' => $path
                ]);
                // $uploadedFiles[] = $path;

            }

            $uploadedResume =  ImportCandidateData::where('user_id', Auth::user()->id)->get();

            // return view('admin.candidate.import');
            return back()->with('success', 'Uploaded successfully.');
            // return response()->json(compact('uploadedFiles'));

        }

        return back()->with('error', 'No files were selected.');
    }
    public function extractInfo(Request $request)
    {
        if ($request->has('selectedFiles')) {
            $selectedFiles = $request->selectedFiles;

            foreach ($selectedFiles as $file) {
                // Process each file to extract information
                $filePath = public_path() . Storage::url($file);
                //dd($filePath);
                if (pathinfo($file, PATHINFO_EXTENSION) === 'docx') {

                    $phpWord = IOFactory::load($filePath);
                    $docInfo = $phpWord->getDocInfo();

                    // Extract relevant info from the document
                    $title = $docInfo->getTitle();
                    $subject = $docInfo->getSubject();
                    // Extract email, name, phone, etc.
                    // Extract the information and pass it to the view
                } elseif (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') {
                    // Extract information from PDF files
                    // Use libraries like TCPDF, FPDI, or others to read PDF contents
                    // $extractedInfo= (new Pdf())->getText($filePath);
                    try {
                        $extractedInfo =  Pdf::getText($filePath);
                        $text = $extractedInfo;
                        // Extract name
                        if (preg_match('/^[A-Z][A-Z. ]+$/m', $text, $matches)) {
                            $name = trim($matches[0]);
                        } else {
                            $name = "Name not found";
                        }

                        // Extract email
                        if (preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $text, $matches)) {
                            $email = trim($matches[0]);
                        } else {
                            $email = "Email not found";
                        }

                        // Extract phone number
                        if (preg_match('/\+?[0-9]+/', $text, $matches)) {
                            $phone_no = trim($matches[0]);
                        } else {
                            $phone_no = "Phone number not found";
                        }
                    } catch (\Exception $e) {
                        return response('Error reading PDF: ' . $e->getMessage(), 500);
                    }
                } elseif (pathinfo($file, PATHINFO_EXTENSION) === 'xls || xlsx') {
                    // Extract information from PDF files
                    // Use libraries like TCPDF, FPDI, or others to read PDF contents
                } elseif (pathinfo($file, PATHINFO_EXTENSION) === 'doc') {
                    // Extract information from PDF files
                    // Use libraries like TCPDF, FPDI, or others to read PDF contents
                }
                // Extract information from other file types similarly (xls, xlsx, doc)
                $myPath = asset('storage/' . $file);
            }
            return response()->json(compact('name', 'email', 'phone_no', 'myPath'));
            // return view('admin.candidate.import', compact('name', 'email', 'phone_no', 'myPath'));

        }

        return back()->with('error', 'No files were selected.');
    }
    public function temporaryDataSave(Request $request)
    {
        $fullPath = $request->resume_path;
        $relativePath = str_replace('http://127.0.0.1:8000/storage/', '', $fullPath);
        $data = ImportCandidateData::where('resume_path', $relativePath)->first();

        TemporaryImportedData::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'resume_path' => $relativePath,
        ]);
        ImportCandidateData::find($data->id)->delete();
        return redirect()->route('import.index')->with('success', 'Candidate Shortlisted successfully.');
    }

    public function temporaryDataDelete($id)
    {
        $data = TemporaryImportedData::find($id);

        if ($data) {
            $fullPath = $data->resume_path;
            $filePath = storage_path("app/public/{$fullPath}");

            if (file_exists($filePath)) {
                // Perform the desired action, e.g., delete the file
                Storage::delete("public/{$fullPath}");
            }
            TemporaryImportedData::find($id)->delete();
        }

        return back()->with('success', 'Deleted successfully');
    }
    public function importCandidateData(Request $request) {
        $temporaryData = json_decode($request->input('temporary_data'), true);
        foreach ($temporaryData as $data) {
                $candidate = candidate::create([
                'candidate_name' => $data['name'],
                'candidate_email' => $data['email'],
                'candidate_mobile' => $data['phone_no'],
            ]);
        }
        foreach ($temporaryData as $data) {
                CandidateResume::create([
                'candidates_id' => $candidate->id,
                'resume_file_path' => $data['resume_path']
            ]);
        }

        foreach ($temporaryData as $data) {
            TemporaryImportedData::find($data['id'])->delete();
        }

        return back()->with('success', 'Candidate uploaded successfully.');
    }
}
