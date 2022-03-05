@extends('layouts.app')
@section('title', 'Turmas')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Turmas</h5>
                        <a href="{{ route('class_room.create') }}" class="col-auto btn btn-purple">
                            @svg('phosphor-police-car-duotone','feather align-middle') &nbsp; <span class="align-middle">Nova turma</span>
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
                        <table id="class_rooms_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Turma</th>
                                    <th>Instrutor</th>
                                    <th>Período</th>
                                    <th>Editar</th>
                                    <th>Deletar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($class_rooms as $class_room)
                                    <tr>
                                        <td>{{ $class_room->id }}</td>
                                        <td>{{ $class_room->name }}</td>
                                        <td>{{ $class_room->classInstructor->name }}</td>
                                        <td>{{ ' ' . $class_room->period->name}}
                                             ({{ 'das ' . $class_room->period->init_at->hour . ':' .$class_room->period->init_at->minute . ' até as '. $class_room->period->end_at->hour . ':' .$class_room->period->end_at->minute  }}) </td>
                                        <td><a class="btn btn-warning"
                                                href="{{ route('class_room.edit', $class_room->id) }}">Editar</a></td>
                                        <td><button class="btn btn-danger"
                                                onclick="document.getElementById('class_room{{ $class_room->id }}_delete').submit()">Delete</button>
                                            <form action="{{ route('class_room.destroy', $class_room->id) }}" method="post"
                                                id="class_room{{ $class_room->id }}_delete">
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
                                    <th>Turma</th>
                                    <th>Instrutor</th>
                                    <th>Período</th>
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
