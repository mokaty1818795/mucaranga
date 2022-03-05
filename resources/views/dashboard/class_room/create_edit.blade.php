@extends('layouts.app')
@section('title', request()->routeIs('class_room.edit') ? 'Editar dados da turma - ' . $class_room->name : 'Criar nova
    turma')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('class_room.index') }}" class="col-auto btn btn-info">
                            <i class="align-middle" data-feather="corner-up-left"></i>&nbsp; Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible " role="alert"
                                style="border-left: 5px solid darkred;">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <div class="alert-message">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li><i class="align-middle" data-feather="alert-triangle"></i> &nbsp;
                                                <strong>{{ $error }}</strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="container row">
                            @if (request()->routeIs('class_room.edit'))
                                <form action="{{ route('class_room.update', $class_room->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{ encrypt($class_room->id) }}">
                                @else
                                    <form action="{{ route('class_room.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif
                            <div class="row justify-content-between mb-3">
                                <div class="row col-md-4">
                                    <label for="name">Nome da turma</label>
                                    <input name="name"
                                        value="@if (old('name')) {{ old('name') }}@elseif(request()->routeIs('class_room.edit')){{ $class_room->name }} @endif"
                                        type="text" class="form-control" placeholder="Nome da turma" autofocus
                                        autocomplete="" required>
                                </div>
                                <div class="row col-md-4">
                                    <label for="instructor_id">Instructor</label>
                                    <select class="form-select" name="instructor_id" id="instructor_id">
                                        <optgroup label="Instructores">
                                            @foreach ($instructors as $instructor)
                                                <option value="{{ $instructor->id }}"
                                                    @if (request()->routeIs('class_room.edit') && ($class_room->instructor_id == $instructor->id)) selected="true" @endif>
                                                    {{ $instructor->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="row col-md-4">
                                    <label for="period_id">Períodos de aula</label>
                                    <select class="form-select" name="period_id" id="period_id">
                                        <optgroup label="Períodos de aulas">
                                            @foreach ($periods as $period)
                                                <option value="{{ $period->id }}"
                                                    @if (request()->routeIs('class_room.edit') && ($class_room->period_id == $period->id)) selected="true" @endif
                                                    >
                                                    {{ ' ' . $period->name }}
                                                    ({{ 'das ' .$period->init_at->hour .':' .$period->init_at->minute .' até as ' .$period->end_at->hour .':' .$period->end_at->minute }})
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col"
                                    value="@if (request()->routeIs('class_room.edit')) Actualizar @else Guardar @endif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
