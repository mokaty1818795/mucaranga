<form action="{{ route('document.upload', $student->id) }}" method="post" id="upload_student_documents"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label>Tipo de documento</label>
            <select class="form-control" name="document_type">
                @foreach ($documents as $document)
                    <option value="{{ $document->id }}"> {{ $document->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6"><label for="Carregar documento">Carregar documento</label>
            <input type="file" name="document_file"  class="form-control">
        </div>
    </div>
</form>
@include('dashboard.student_status.shared.tables.upload_table')
<x-slot name="modalFooter">
    <button type="button" class="btn btn-danger mr-0 " data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-primary mr-0"
        onclick="document.getElementById('upload_student_documents').submit()">
        <i class="align-middle" data-feather="paperclip"></i> Anexar</button>
</x-slot>
