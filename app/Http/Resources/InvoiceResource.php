<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return collect([
            'Estudante' => $this->student->name,
            'Código de estudante' => $this->student->student_code,
            'Tipo de carta' => $this->student->veicle_class->name,
            'Pagamento realizado' => $this->isExam == "Exam" ? $this->paymentOf->name : $this->paymentOf->name . " - Matrícula",
            'Forma de pagamento' =>
            $this->isExam == "Exam" ?
                (is_null($this->original->bank_invoice_code)
                    ?  "Cash directo"
                    : "Pagamento bancário"
                )
                :
                "Cash directo",
            'Código do recibo bancário' =>
            $this->isExam == "Exam" ?
                (is_null($this->original->bank_invoice_code)
                    ?  ""
                    : $this->original->bank_invoice_code
                )
                :
                "",
            'Total pago' => $this->amount,
            'Data de pagamento' => date_format($this->original->created_at, "n/j/Y  g:i:s A"),
            'Pagamento realizao por' => $this->processedBy->name,
        ]);
        
    }
}
