<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use App\Models\Registration;
use App\Services\Payment;
use Livewire\Component;

class FinancialChart extends Component
{
    public $dates = "";
    public $data;

    public function mount()
    {
        $this->data = $this->getData();
    }

    public function render()
    {
        return view('livewire.financial-chart');
    }

    public function setDates(string $dates)
    {
        $this->dates = $dates;
    }

    public function getData()
    {
        $data = array();
        for ($i = 1; $i <= 12; $i++) {
            $sum = Registration::whereMonth('created_at', $i)
                ->whereYear('created_at', now()->year)
                ->get()->sum('amount') +
                Exam::whereMonth('created_at', $i)
                ->whereYear('created_at', now()->year)
                ->get()->map(function ($exam) {
                    $exam->amount =  $exam->exam_tpye->price;
                    return $exam;
                })->sum('amount');
            array_push($data, $sum);
        }
        return collect($data);
    }
}
