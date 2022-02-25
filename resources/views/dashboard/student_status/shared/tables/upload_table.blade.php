<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Tipo de documento</th>
            <th>documento</th>
            <th>Visualizar</th>
            <th>Remover</th>
        </tr>
    </thead>
    <tbody>

        @foreach (\App\models\DocumentType::all() as $document)

        @if(is_null($student->getMedia('documents',['document_type'=> "$document->id"])->first()))
        <tr>
            <td>{{ $document->name }}</td>
            <td colspan="3">
                <span class="badge badge-pill bg-warning">Não anexado</span>
            </td>
        </tr>
        @else
        <tr>
            <td scope="row">
                {{ $document->name }}
            </td>
            <td scope="row">{{ $student->getMedia('documents', ['document_type'=> "$document->id"])->first()->name }}</td>
            <td scope="rpw"><a href="{{ $student->getMedia('documents',['document_type'=> "$document->id"])->first()->getUrl() }}" class="btn btn-primary rounded">
                    <i class="align-middle" data-feather="eye"></i>
                </a> </td>
            <td scope="row"><button class="btn btn-danger"
                    onclick="document.getElementById('document_{{ $student->getMedia('documents',['document_type'=> "$document->id"])->first()->id }}').submit()">
                    @svg('fluentui-delete-20', 'feather align-middle')
                </button>
                <form action="{{ route('document.remove', $student->getMedia('documents',['document_type'=> "$document->id"])->first()->id) }}" method="post"
                    id="document_{{ $student->getMedia('documents',['document_type'=> "$document->id"])->first()->id }}">@csrf</form>
            </td>
        </tr>
        @endif
        @endforeach
        {{-- @foreach ($student->getMedia('documents') as $document)
            <tr>
                <td scope="row">
                    {{ \App\models\DocumentType::where('id', $document->getCustomProperty('document_type'))->first()->name }}
                </td>
                <td scope="row">{{ $document->name }}</td>
                <td scope="rpw"><a href="{{ $document->getUrl() }}" class="btn btn-primary rounded">
                        <i class="align-middle" data-feather="eye"></i>
                    </a> </td>
                <td scope="row"><button class="btn btn-danger"
                        onclick="document.getElementById('document_{{ $document->id }}').submit()">
                        @svg('fluentui-delete-20', 'feather align-middle')
                    </button>
                    <form action="{{ route('document.remove', $document->id) }}" method="post"
                        id="document_{{ $document->id }}">@csrf</form>
                </td>
            </tr>
        @endforeach --}}
    </tbody>
</table>
