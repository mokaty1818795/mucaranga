<?php

namespace App\Services;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Payment
{
    public $paymentOf;
    public $student;
    public $processedBy;
    public $invoice;
    public $bankInvoice;
    public $date;
    public $amount;
    public $isExam;
    public $id;

    public function __construct(
        int $id,
        mixed $paymentOf,
        Student $student,
        User $processedBy,
        Media $invoice = null,
        Media $bankInvoice = null,
        Carbon $date,


        $amount = 0
    ) {
        if (class_basename($paymentOf) != 'PaymentPhase') {
            $this->isExam = 'Exam';
        } else {
            $this->isExam = 'NotExam';
        }
        $this->paymentOf = $paymentOf;
        $this->student = $student;
        $this->processedBy = $processedBy;
        $this->invoice = $invoice;
        $this->invoice = $bankInvoice;
        $this->date = $date;
        $this->amount = $amount;
        $this->id = $id;
    }
}
