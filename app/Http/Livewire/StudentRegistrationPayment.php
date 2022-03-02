<?php

namespace App\Http\Livewire;

use App\Models\PaymentPhase;
use App\Models\Registration;
use App\Models\Student;
use App\Services\Payment;
use Livewire\Component;

class StudentRegistrationPayment extends Component
{

    public $paymentPhases;
    public $paymentPhaseId;
    public $student;
    public $amount;

    public function mount($student)
    {
        $this->student  = $student;
        $this->paymentPhases = $this->searchPhases($student);
        $this->paymentPhaseId = $this->paymentPhases->first()->id;
        $this->updateAmount();
    }

    public function updatedPaymentPhaseId()
    {
        $this->updateAmount();
    }

    public function render()
    {
        return view('livewire.student-registration-payment');
    }

    private function updateAmount()
    {
        if (!is_null($this->paymentPhaseId)) {
            $data = PaymentPhase::find($this->paymentPhaseId)->slug;
            switch (strtolower($data)) {
                case strtolower('1PR'):
                    $this->amount = $this->student->veicle_class->price / 2;
                    break;

                case strtolower('2PR'):
                    $this->amount = $this->student->veicle_class->price / 2;
                    break;
                case strtolower('UPR'):
                    $this->amount = $this->student->veicle_class->price;
                    break;

                default:
                    $this->amount = $this->student->veicle_class->price;
                    break;
            }
        }
    }


    private function searchPhases(Student $student)
    {
        return PaymentPhase::whereNotIn(
                'id',
                Registration::where('student_id', $student->id)
                    ->pluck('payment_phase_id')
            )
            ->get();
    }
}
