<form action="" method="post" id="student_registration_payment"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label>Prestações</label>
            <select class="form-control" name="document_type">
                @foreach (\App\Models\PaymentPhase::all() as $phase)
                    <option value="{{ $phase->id }}"> {{ $phase->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6"><label for="Carregar documento">Valor a pagar</label>
            <input type="text" name="amount"  class="form-control" disabled value="{{$student->veicle_class->price}} MZN">
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
