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

    public function __construct(
        mixed $paymentOf, Student $student,
        User $processedBy, Media $invoice = null,
        Media $bankInvoice = null, Carbon $date,
        $amount = 0
         )
    {
        $this->paymentOf = $paymentOf;
        $this->student = $student;
        $this->processedBy = $processedBy;
        $this->invoice = $invoice;
        $this->invoice = $bankInvoice;
        $this->date = $date;
        $this->amount = $amount;
    }
}
