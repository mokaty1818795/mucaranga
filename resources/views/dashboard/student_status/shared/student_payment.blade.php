<form action="{{ route('document.upload', $student->id) }}" method="post" id="upload_student_documents"  enctype="multipart/form-data">
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
        <div class="col-md-6"><label for="Carregar documento">Carregar documento</label>
            <input type="file" name="document_file"  class="form-control">
        </div>
    </div>
</form>
@include('dashboard.student_status.shared.tables.payment_table')
<x-slot name="modalFooter">
    <button type="button" class="btn btn-secondary mr-0 " data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary mr-0"
        onclick="document.getElementById('upload_student_documents').submit()">Save changes</button>
</x-slot>
