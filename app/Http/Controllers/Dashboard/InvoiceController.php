<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\Invoice;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Traits\ParseDatePt;
use App\Imports\InvoiceImport;
use App\Models\Exam;
use App\Models\Registration;
use App\Models\Student;
use App\Models\User;
use App\Services\Payment;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Maatwebsite\Excel\Facades\Excel;


class InvoiceController extends Controller
{
    //use PDF;
    use ParseDatePt;
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

        $pdf = PDF::loadView('dashboard.invoice.themplate', [
            'invoice' => $this->invoice,
            'student' => $this->student,
            'isExam' => $this->isExame
        ]);
        $pdf->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);
        return $pdf->stream();
        //    return $pdf->save(storage_path('/publictang.pdf'));
    }

    public  function paymentReports(Request $request, User $user = null)
    {

        $dates = $request->validate([
            'dates' => 'required'
        ]);

        $dates = explode('to', $request->dates);


        $user = auth()->user();
        $payments = $user->registrations->map(function (Registration $payment) {
            return new Payment(
                $payment->id,
                $payment->payment_phase,
                $payment->student,
                $payment->processedBy,
                Media::where('id', $payment->invoice_id)->first(),
                Media::where('id', $payment->bank_invoice_id)->first(),
                $payment->created_at,
                $payment->amount,
                $payment

            );
        });
        $exams = $user->exams->map(function (Exam $exam) {
            return new Payment(
                $exam->id,
                $exam->exam_tpye,
                $exam->student,
                $exam->processedBy,
                Media::where('id', $exam->invoice_id)->first(),
                Media::where('id', $exam->bank_invoice_id)->first(),
                $exam->created_at,
                $exam->exam_tpye->price,
                $exam
            );
        });
        $payments = collect([$payments, $exams])->collapse();
        $payments = $payments
            ->where(
                'date',
                '>=',
                Carbon::parse($dates[0])
            )
            ->where('date', '<=', Carbon::parse($dates[1]));


        $collection = Excel::toCollection(new InvoiceImport, storage_path('themplate.xlsx'));
        $collection[0][1][2] =
        "Fluxo de pagamentos entre as datas " .
                $this->formatDate(Carbon::parse($dates[0]))
                . ' a '
                .  $this->formatDate(Carbon::parse($dates[1]))

        ;
        $collection[0] = collect($collection[0])->merge(
            collect(InvoiceResource::collection($payments))
        );
        $collection[0]  = collect($collection[0])->merge(
            collect([
                collect(['Total de pagamentos', '=SUBTOTAL(3,g7:g' . count($collection[0]) . ')']),
                collect(['Total de entradas', '=SUBTOTAL(9,g7:g' . count($collection[0]) . ')'])
            ])
        );
        return  Excel::download(new Invoice($collection), 'Relatório entre ' . $this->formatDate(Carbon::parse($dates[0])) .' a ' . $this->formatDate(Carbon::parse($dates[0])) . '.xlsx');
    }

}
