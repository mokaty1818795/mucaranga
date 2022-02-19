@extends('layouts.app')
@section('title', 'Fases de pagamento')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Tipos de exames</h5>
                        <a href="{{ route('exam_type.create') }}" class="col-auto btn btn-purple">
                            @svg('fluentui-text-bullet-list-square-edit-24-o','feather align-middle')
 &nbsp; <span class="align-middle">Tipo de exame</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible show fade" role="alert"
                                style="border-left: 5px solid darkgreen;">
                                <div class="alert-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            </div>
                        @endif
                        <table id="exam_types_table"
                            class="table table-striped table-responsive display table-hover my-0 w-100">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Exame</th>
                                    <th>Valor</th>
                                    <th>Editar</th>
                                    <th>Deletar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exam_types as $exam_type)
                                    <tr>
                                        <td>{{ $exam_type->id }}</td>
                                        <td>{{ $exam_type->name }}</td>
                                        <td>{{ $exam_type->price }} Mt's</td>
                                        <td><a class="btn btn-warning"
                                                href="{{ route('exam_type.edit', $exam_type->id) }}">Editar</a></td>
                                        <td><button class="btn btn-danger"
                                                onclick="document.getElementById('exam_type_{{ $exam_type->id }}_delete').submit()">Delete</button>
                                            <form action="{{ route('exam_type.destroy', $exam_type->id) }}"
                                                method="post" id="exam_type_{{ $exam_type->id }}_delete">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Exame</th>
                                    <th>Valor</th>
                                    <th>Editar</th>
                                    <th>Deletar</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

    </script>
@endpush
