<div>
    <form action="{{ route('store.exam_payment') }}" method="post" id="student_exam_payment" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="student_id" wire:model="studentId">
        <div class="row">
            <div class="col-md-4">
                <label>Exame</label>
                <select class="form-select form-control" name="exam_tpye_id" wire:model="examId">
                    @foreach ($exams as $exam)
                        <option value="{{ $exam->id }}"> {{ $exam->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4"><label for="valor a pagar">Valor a pagar</label>
                <span type="hidden" name="amount" class="form-control">{{ $amount }} MZN</span>
            </div>
            <div class="col-md-4">
                <label>Forma de pagamento</label>
                <select class="form-select form-control" name="paymentType" wire:model="paymentTypeId">
                    @foreach ($paymentTypes as $payment)
                        <option value="{{ $payment->id }}"> {{ $payment->name }}</option>
                    @endforeach
                </select>
            </div>

            @if ($isBankPayment)
                <div class="col-md-6 mt-3"><label for="Anexar recibo do banco">Anexar recibo bancário</label>
                    <input type="file" name="bank_invoice_id" id="bank_invoice_id" class="form-control">
                </div>
                <div class="col-md-6 mt-3"><label for="Número do recibo">Número do recibo bancário</label>
                    <input type="text" name="bank_invoice_code" id="bank_invoice_number" class="form-control"
                        placeholder="Número de recibo bancário">
                </div>
            @endif

        </div>
    </form>

    <x-slot name="modalFooter">
        <button type="button" class="btn btn-danger mr-0 " data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary mr-0"
            onclick="document.getElementById('student_exam_payment').submit()">
            @svg('fluentui-payment-16','feather align-middle')
            Efectuar pagamento</button>
    </x-slot>
</div>
