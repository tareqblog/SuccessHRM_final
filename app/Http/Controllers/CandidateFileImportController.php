<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\candidate;
use App\Models\CandidateFileImport;
use App\Models\CandidateResume;
use App\Models\Employee;
use App\Models\ImportCandidateData;
use App\Models\TemporaryImportedData;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Str;
use Spatie\PdfToText\Pdf;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\PhpWord;

class CandidateFileImportController extends Controller
{   public $user;


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
        if (is_null($this->user) || !$this->user->can('import.index')) {
            abort(403, 'Unauthorized');
        }
        $importData = ImportCandidateData::where('user_id', Auth::id())->get();

        $temporary_data = TemporaryImportedData::where('created_by', Auth::id())->get();
        $assaignPerson = Employee::latest()->get();

        return view('admin.candidate.import', compact('importData', 'temporary_data', 'assaignPerson'));
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
        if (is_null($this->user) || !$this->user->can('upload.file')) {
            abort(403, 'Unauthorized');
        }
        $validatedData = $request->validate([
            'files.*' => 'mimes:pdf,docx,xlsx'
        ]);

        if ($request->hasFile('files')) {
            $uploadedFiles = [];
            foreach ($request->file('files') as $file) {
                if ($file->getClientOriginalExtension() == 'docx') {
                    $filename = $file->getClientOriginalName();
                    $path = FileHelper::uploadFile($file);

                    $domPdfPath = base_path('vendor/dompdf/dompdf');
                    \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
                    \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

                    // Load Word file
                    $wordFilePath = public_path('storage/' . $path);
                    $Content = \PhpOffice\PhpWord\IOFactory::load($wordFilePath);

                    // Extract the desired part from the filename
                    $afterUploads = Str::after($path, 'uploads/');
                    $beforeDocx = Str::before($afterUploads, '.docx');

                    // Save as PDF
                    $pdfFilePath = public_path('storage/uploads/' . $beforeDocx . '.pdf');
                    $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content, 'PDF');
                    $PDFWriter->save($pdfFilePath);
                    ImportCandidateData::create([
                        'user_id' => Auth::user()->id,
                        'resume_path' => 'uploads/' . $beforeDocx . '.pdf',
                    ]);
                    $delete_path = 'app/public/uploads/' . $beforeDocx . '.docx';
                    unlink(storage_path($delete_path));
                }
                elseif ($file->getClientOriginalExtension() == 'doc') {
                    $filename = $file->getClientOriginalName();
                    $path = FileHelper::uploadFile($file);

                    $domPdfPath = base_path('vendor/dompdf/dompdf');
                    \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
                    \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

                    // Load Word file
                    $wordFilePath = public_path('storage/' . $path);
                    $Content = \PhpOffice\PhpWord\IOFactory::load($wordFilePath);

                    // Extract the desired part from the filename
                    $afterUploads = Str::after($path, 'uploads/');
                    $beforeDocx = Str::before($afterUploads, '.doc');

                    // Save as PDF
                    $pdfFilePath = public_path('storage/uploads/' . $beforeDocx . '.pdf');
                    $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content, 'PDF');
                    $PDFWriter->save($pdfFilePath);
                    ImportCandidateData::create([
                        'user_id' => Auth::user()->id,
                        'resume_path' => 'uploads/' . $beforeDocx . '.pdf',
                    ]);
                    $delete_path = 'app/public/uploads/' . $beforeDocx . '.doc';
                    unlink(storage_path($delete_path));
                } elseif ($file->getClientOriginalExtension() == 'xlsx') {
                    $filename = $file->getClientOriginalName();
                    $path = FileHelper::uploadFile($file);
                    // Extract the desired part from the filename
                    $afterUploads = Str::after($path, 'uploads/');
                    $beforeXlsx = Str::before($afterUploads, '.xlsx');
                    $pdfFilePath = public_path('storage/uploads/' . $beforeXlsx . '.pdf');

                    $preadSheet = IOFactory::load(public_path('storage/' . $path));
                    $writer = IOFactory::createWriter($preadSheet, 'Mpdf');
                    $pdfFile = $pdfFilePath;
                    $writer->save($pdfFile);

                    // Store record in the database
                    ImportCandidateData::create([
                        'user_id' => Auth::user()->id,
                        'resume_path' => 'uploads/' . $beforeXlsx . '.pdf',
                    ]);

                    // Delete the original XLSX file
                    $delete_path = 'app/public/uploads/' . $beforeXlsx . '.xlsx';
                    unlink(storage_path($delete_path));
                } else {
                    $filename = $file->getClientOriginalName();
                    $path = FileHelper::uploadFile($file);
                    //    dd($path);
                    //$file->storeAs('uploads', $filename); // Store file in storage/uploads directory
                    ImportCandidateData::create([
                        'user_id' => Auth::user()->id,
                        'resume_path' => $path
                    ]);
                }
                // $uploadedFiles[] = $path;
            }

            // return view('admin.candidate.import');
            return back()->with('success', 'Uploaded successfully.');
            // return response()->json(compact('uploadedFiles'));

        }

        return back()->with('error', 'No files were selected.');
    }
    public function extractInfo(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('extract.info')) {
            abort(403, 'Unauthorized');
        }

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

                        if (preg_match('/\b(male|female)\b/i', $text, $matches)) {
                            $gender = ucfirst(strtolower($matches[0]));
                        } else {
                            $gender  = "Gender not found!";
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
            return response()->json(compact('name', 'email', 'phone_no', 'myPath', 'gender'));
            // return view('admin.candidate.import', compact('name', 'email', 'phone_no', 'myPath'));

        }

        return back()->with('error', 'No files were selected.');
    }
    public function deleteUploadedData(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('delete.uploaded.data')) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'selectedFiles' => 'required|array',
            'itemIds' => 'required|array',
        ]);
        $selectedFiles = $request->input('selectedFiles');
        $itemIds = $request->input('itemIds');
        foreach ($selectedFiles as $key => $selectedFile) {
            $itemId = $itemIds[$key];
            $item = ImportCandidateData::find($itemId);
            if ($item && $item->user_id == Auth::user()->id) {
                $deletePath = Str::after($selectedFile, 'uploads/');
                $item->delete();
                $delete_path = 'app/public/uploads/' . $deletePath;
                unlink(storage_path($delete_path));
            }
        }

        return redirect()->back()->with('success', 'Selected items deleted successfully.');
    }
    public function temporaryDataSave(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('temporary.data.save')) {
        //     abort(403, 'Unauthorized');
        // }
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
        // if (is_null($this->user) || !$this->user->can('temporary.data.delete')) {
        //     abort(403, 'Unauthorized');
        // }
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
    public function importCandidateData(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('import.candidate.data')) {
        //     abort(403, 'Unauthorized');
        // }
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
