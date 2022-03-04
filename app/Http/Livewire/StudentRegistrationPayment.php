<?php

namespace App\Http\Livewire;

use App\Models\PaymentPhase;
use App\Models\Registration;
use App\Models\Student;
use App\Services\Payment;
use Illuminate\Support\Collection;
use Livewire\Component;

class StudentRegistrationPayment extends Component
{

    public $paymentPhases;
    public $paymentPhaseId;
    public $student;
    public $amount;
    private $option;

    public function mount($student)
    {
        $this->student  = $student;
        $this->paymentPhases = $this->searchPhases($student);
        $this->paymentPhaseId = !$this->paymentPhases->isEmpty() ? $this->paymentPhases->first()->id : null;
        $this->updateAmount();
    }

    public function updatedPaymentPhaseId()
    {
        $this->updateAmount();
       $this->paymentPhases = $this->searchPhases($this->student);
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
        if (Registration::where('student_id', $student->id)->get()->isEmpty()) {
            return PaymentPhase::all();
        } else {
            $regists = PaymentPhase::whereNotIn(
                'id', Registration::where('student_id', $student->id)->pluck('payment_phase_id')
            )->get();

            if (!$this->contains($regists, 'UPR')) {
                return $regists =  collect([]);
            } else if ($this->contains($regists, '1PR') || $this->contains($regists, '2PR')) {
                $regists = $regists->reject(function ($value, $key) {
                    return strtolower($value->slug)  ==  strtolower('UPR');
                });
            }

            return $regists;
        }
    }

    public function contains(Collection $collection, String $option)
    {
        $this->option = $option;
        return $collection->contains(function ($value, $key) {
            return strtolower($value->slug) == strtolower($this->option);
        });
    }
}
