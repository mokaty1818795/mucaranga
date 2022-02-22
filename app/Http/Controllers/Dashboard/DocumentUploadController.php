<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class DocumentUploadController extends Controller
{
    public function uploadFile(Request $request, Student $student)
    {
        $request->validate(['document_file' => 'required']);
        $student->addMedia($request->file('document_file'))
            ->withCustomProperties([
                'document_type' => $request->document_type,
                'student_id' => $student->id
            ])
            ->toMediaCollection('documents', 'documents');
    }
}
