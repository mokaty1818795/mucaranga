<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use App\Models\Exam;
use App\Models\Registration;
use App\Models\Student;
use App\Services\Payment;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StudentController extends Controller
{

    private $student;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.student_status.index')->with([
            'students'=>Student::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $this->student = $student;
        $payments = $student->payments->map(function(Registration $payment)
        {
            return new Payment(
                $payment->payment_phase,
                $this->student,
                $payment->processedBy,
                Media::where('id',$payment->invoice_id)->first(),
                Media::where('id',$payment->bank_invoice_id)->first(),
                $payment->created_at,
                $payment->amount
            );
        });
        $exams = $student->exams->map(function(Exam $exam)
        {
            return new Payment(
                $exam->exam_tpye,
                $this->student,
                $exam->processedBy,
                Media::where('id',$exam->invoice_id)->first(),
                Media::where('id',$exam->bank_invoice_id)->first(),
                $exam->created_at,
                $exam->exam_tpye->price
            );
        });

        return view('dashboard.student_status.student_status')->with([
            'student'=>$student,
            'documents' => DocumentType::all(),
            'payments' => collect([
                $payments,$exams
            ])->collapse()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
