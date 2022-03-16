<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class InvoiceController extends Controller
{
    //use PDF;

    private $invoice;
    private $student;
    private $isExame;
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
    public function printInvoice(mixed $invoice,  Student $student, String $exam_token)
    {
        $this->isExame = false;
        $this->student = $student;
        try {
            if (Crypt::decrypt($exam_token) == 'Exam') {
                $this->invoice = Exam::find($invoice);
                $this->isExame = true;
            } else {
                $this->invoice = Registration::find($invoice);
            }
        } catch (\Throwable $th) {
            abort(401);
        }

        $pdf = PDF::loadView('dashboard.invoice.themplate',[
            'invoice' => $this->invoice,
            'student' => $this->student,
            'isExam' => $this->isExame
        ]);
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
    //    return $pdf->save(storage_path('/publictang.pdf'));
    }
}
