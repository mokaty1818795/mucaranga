<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Support\Facades\Crypt;

class InvoiceController extends Controller
{
    private $invoice;
    public function index(mixed $invoice,  Student $student, String $exam_token)
    {
        $isExame = false;
        try {
            if (Crypt::decrypt($exam_token) == 'Exam') {
                $this->invoice = Exam::find($invoice);
                $isExame = true;
            } else {
                $this->invoice = Registration::find($invoice);
            }
        } catch (\Throwable $th) {
            abort(401);
        }
        return view('dashboard.invoice.invoice')->with([
            'invoice' => $this->invoice,
            'student' => $student,
            'isExam' => $isExame
        ]);
    }
}
