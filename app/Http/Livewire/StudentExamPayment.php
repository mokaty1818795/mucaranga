<?php

namespace App\Http\Livewire;

use App\Models\ExamTpye;
use Illuminate\Support\Collection;
use Livewire\Component;

class StudentExamPayment extends Component
{
    public $exams;
    public $examId;
    public Collection  $paymentTypes;
    public int $paymentTypeId;
    public $student;
    public $amount;
    public $isBankPayment;
    public $processedById;
    public $studentId;

    public function mount($student)
    {
        $this->student  = $student;
        $this->studentId = $student->id;
        $this->processedById = auth()->user()->id;
        $this->exams = ExamTpye::all();
        $this->isBankPayment = true;

        $this->paymentTypes = collect([
            new ExamPayment(1,'Bancário'),
           new ExamPayment(2,'Cash Directo'),

        ]);
        $this->paymentTypeId =  $this->paymentTypes->first()->id;
        $this->examId = !$this->exams->isEmpty() ? $this->exams->first()->id : 0;
        $this->updateAmount($this->examId);
    }


    public function render()
    {
        return view('livewire.student-exam-payment');
    }

    public function updatedExamId()
    {
        $this->updateAmount($this->examId);
    }
    private function updateAmount(int $examId)
    {
        $this->amount = ExamTpye::find($examId)->price ?? 0;
    }
    public function updated()
    {
        $this->paymentTypes = collect([
            new ExamPayment(1,'Bancário'),
            new ExamPayment(2,'Cash Directo'),
         ]);
    }

    public function updatedPaymentTypeId()
    {
         if ($this->paymentTypeId == 1) {
            $this->isBankPayment = true;
         }else{
            $this->isBankPayment = false;
         }
    }
}

namespace App\Http\Livewire;
class ExamPayment{

    public $id;
    public $name;
    public function __construct(int $id,String $name) {
        $this->id = $id;
        $this->name = $name;
    }
}
