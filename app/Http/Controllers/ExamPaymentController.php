<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Crypt;

class ExamPaymentController extends Controller
{

    public function store(StoreExamRequest $request)
    {
        try {

        if ($request->paymentType == 1) {
            $exam = Exam::create([
                'student_id' =>  $request->student_id,
                'exam_tpye_id'  => $request->exam_tpye_id,
                'bank_invoice_code' => $request->bank_invoice_code,
                'processed_by_id' => auth()->user()->id
            ]);
            $exam->addMedia($request->file('bank_invoice_id'))
            ->withCustomProperties([
                'exam_type_id' => $request->exam_tpye_id,
                'student_id' => $request->student_id
            ])
            ->toMediaCollection('bank_invoices', 'bank_invoices');
            return redirect()->route('payment_invoices', [
                'invoice' => $exam,
                'student' => Student::find($request->student_id),
                'exam_token' => Crypt::encrypt('Exam')
            ]);

        } else {
           $exam =  Exam::create([
                "student_id" => $request->student_id,
                "exam_tpye_id" => $request->exam_tpye_id,
                'processed_by_id' => auth()->user()->id
            ]);
            return redirect()->route('payment_invoices', [
                'invoice' => $exam,
                'student' => Student::find($request->student_id),
                'exam_token' => Crypt::encrypt('Exam')
            ]);
        }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
    }
}
