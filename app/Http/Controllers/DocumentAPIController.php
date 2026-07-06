<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Document::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'file' => 'required|mimes:pdf|max:2048',
            'is_cv' => 'required|boolean',
            'is_public' => 'required|boolean'
        ]);


        $data['path'] = $request->file('file')->store('documents', 'local');
        unset($data['file']);
        $document = Document::create($data);
        if($document->is_cv) {
            $document->setAsCV();
        }
        return $document->toResource()->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function public(Document $document)
    {
        if  ($document->is_public) {
            return response()->download(
                $document->getAssociatedFile()
            );
        } else {
            return response()->json([
                'message' => 'Imagem não encontrada.'
            ], 404);
        }
    }

    public function download_cv(Document $document)
    {
        $cvPath = $document->getCVPath();
        if  ($cvPath) {
            return response()->download($cvPath, 'curriculo_keiner_mendoza.pdf');
        } else {
            return response()->json([
                'message' => 'Documento não encontrado.'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $data = $request->validate([
            'title' => 'sometimes|string',
            'file' => 'sometimes|mimes:pdf|max:2048',
            'is_cv' => 'sometimes|boolean',
            'is_public' => 'sometimes|boolean'
        ]);

        if ($request->hasFile('file')) {
            $data['path'] = $request->file('file')->store('documents', 'local');
            unset($data['file']);
            $document->deleteAssociatedFile();
        }

        $document->update($data);
        if($document->is_cv) {
            $document->setAsCV();
        }
        return $document->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->deleteAssociatedFile();
        $document->delete();
    }
}
