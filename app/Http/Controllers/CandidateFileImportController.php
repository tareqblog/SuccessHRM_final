<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\CandidateFileImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Spatie\PdfToText\Pdf;
class CandidateFileImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.candidate.import');
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
                $path=FileHelper::uploadFile($file);
                //    dd($path);
                //$file->storeAs('uploads', $filename); // Store file in storage/uploads directory
                $uploadedFiles[] = $path;
                
            }
    
            return view('admin.candidate.import')->with('uploadedFiles', $uploadedFiles);
        }
    
        return back()->with('error', 'No files were selected.');
    }
    public function extractInfo(Request $request)
    {
        if ($request->has('selectedFiles')) {
            $selectedFiles = $request->selectedFiles;
    
            foreach ($selectedFiles as $file) {
                // Process each file to extract information
                $filePath = public_path().Storage::url($file);
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
                    //$extractedInfo= (new Pdf())->getText($filePath);
                    try {
                        $text = Pdf::getText($filePath);
                        return response($text, 200);
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
            }
            
            return view('admin.candidate.import')->with('info', $extractedInfo);
        }
    
        return back()->with('error', 'No files were selected.');
    }
}
