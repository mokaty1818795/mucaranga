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
        $student->addMedia($request->file('document_file'))
            ->withCustomProperties([
                'document_type' => $request->document_type,
                'student_id' => $student->id
            ])
            ->toMediaCollection('documents', 'documents');
    }

    public function removeFile(Media $media)
    {
        try {
            $media->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
