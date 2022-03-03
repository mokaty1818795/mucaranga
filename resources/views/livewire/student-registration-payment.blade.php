<div>
    <form action="{{ route('registration_payment.store') }}" method="post" id="student_registration_payment"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}" data-encrp="{{ Hash::make(now()) }}">
        <input type="hidden" name="processed_by_id" value="{{ auth()->user()->id }}"
            data-encrp="{{ Hash::make(now()) }}">
        <div class="row">
            <div class="col-md-6">
                <label>Prestações</label>
                <select class="form-select form-control" name="payment_phase_id" wire:model="paymentPhaseId"
                    id="paymentPhaseId">
                    @foreach ($paymentPhases as $phase)
                        <option value="{{ $phase->id }}"> {{ $phase->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="amountx">Valor a pagar</label>
                <input type="hidden" name="amount" class="form-control" wire:model="amount" >
                <span class="form-control">{{$amount}} MZN</span>
            </div>
        </div>
    </form>

    <x-slot name="modalFooter">
        <button type="button" class="btn btn-danger mr-0 " data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary mr-0"
            onclick="document.getElementById('student_registration_payment').submit()">
            @svg('fluentui-payment-16','feather align-middle')
            Efectuar pagamento</button>
    </x-slot>
</div>
