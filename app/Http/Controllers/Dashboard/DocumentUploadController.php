<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentUploadRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DocumentUploadController extends Controller
{
    public function uploadFile(DocumentUploadRequest $request, Student $student)
    {
        try {
            $student->addMedia($request->file('document_file'))
            ->withCustomProperties([
                'document_type' => $request->document_type,
                'student_id' => $student->id
            ])
            ->toMediaCollection('documents', 'documents');
            session()->flash('success', 'Documento anexado com sucesso.');
           return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', 'Erro ao eliminar documento');
            return redirect()->back();
        }
    }

    public function removeFile(Media $media)
    {
        try {
            $media->delete();
            session()->flash('success', 'Documento eliminado com sucesso.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao eliminar documento');
            return redirect()->back();
        }
    }
}
