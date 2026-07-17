<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DocumentService;
use Illuminate\View\View;
use App\Http\Requests\Student\StoreDocumentRequest;
use App\Models\Document;
use Illuminate\Http\RedirectResponse;

class DocumentController extends Controller
{   

    public function __construct(
        protected DocumentService $documentService
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $student = auth()->user()->student;

        $documents = $this->documentService
            ->getStudentDocuments($student);

        $requiredDocuments = config('documents');

        return view(
            'student.documents.index',
            compact(
                'documents',
                'requiredDocuments'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'student.documents.create',
            [

                'category' => request('category'),

                'documentName' => request('document'),

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreDocumentRequest $request
    ): RedirectResponse
    {
        $student = auth()->user()->student;

        $path = $request
            ->file('document_file')
            ->store('documents', 'public');

        Document::create([

            'student_id' => $student->id,

            'category' => $request->category,

            'document_name' => $request->document_name,

            'file_path' => $path,

            'status' => 'Uploaded',

            'uploaded_at' => now(),

        ]);

        return redirect()
            ->route('student.student.documents.index')
            ->with(
                'success',
                'Document uploaded successfully.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        abort_if(
            $document->student_id !== auth()->user()->student->id,
            403
        );

        return view(
            'student.documents.show',
            compact('document')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
