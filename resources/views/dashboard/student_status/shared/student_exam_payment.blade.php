<form action="" method="post" id="student_exam_payment"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label>Exame</label>
            <select class="form-control" name="document_type">
                @foreach (\App\Models\ExamTpye::all() as $exam)
                    <option value="{{ $exam->id }}"> {{ $exam->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3"><label for="valor a pagar">Valor a pagar</label>
            <input type="text" name="amount"  class="form-control" disabled value="{{$student->veicle_class->price}} MZN">
        </div>

        <div class="col-md-3"><label for="Anexar recibo do banco">Recibo do banco</label>
            <input type="file" name="bank_invoice" id="bank_invoice" class="form-control">
        </div>
        <div class="col-md-3"><label for="Número do recibo">Número do recibo</label>
            <input type="text" name="bank_invoice_number" id="bank_invoice_number" class="form-control">
        </div>
    </div>
</form>

<x-slot name="modalFooter">
    <button type="button" class="btn btn-danger mr-0 " data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-primary mr-0"
        onclick="document.getElementById('student_exam_payment').submit()">
@svg('fluentui-payment-16','feather align-middle')
        Efectuar pagamento</button>
</x-slot>
