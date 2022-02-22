<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Tipo de documento</th>
            <th>documento</th>
            <th>Visualizar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($student->getMedia('documents') as $document)
            <tr>
                <td scope="row">
                    {{ \App\models\DocumentType::where('id', $document->getCustomProperty('document_type'))->first()->name }}
                </td>
                <td scope="row">{{ $document->name }}</td>
                <td scope="rpw"><a href="{{ $document->getUrl() }}" class="btn btn-primary rounded">
                    <i class="align-middle" data-feather="eye"></i>

                    Link</a> </td>
            </tr>
        @endforeach
    </tbody>
</table>
