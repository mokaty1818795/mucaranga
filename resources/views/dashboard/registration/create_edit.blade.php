@extends('layouts.app')
@section('title', request()->routeIs('registration.edit') ? 'Editar o matriculado de nome ' . $registration->name :
    'Realizar nova matrícula')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ url()->previous()}}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('registration.edit'))
                                <form action="{{ route('registration.update', $registration->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{ encrypt($registration->id) }}">
                                @else
                                    <form action="{{ route('registration.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">
                                <div class="col-md-4">
                                    <label for="name">Nome do estudante</label>
                                    <input name="name" value="@if (old('name')){{ old('name') }}@elseif(request()->routeIs('registration.edit')){{ $registration->name }}@endif" type="text" class="form-control"
                                        placeholder="Nome do estudante" autofocus autocomplete="" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="father_name">Nome do pai</label>
                                    <input name="father_name" value="@if (old('father_name')){{ old('father_name') }}@elseif(request()->routeIs('registration.edit')){{ $registration->father_name }}@endif" type="text"
                                        class="form-control" placeholder="Nome do pai" autofocus autocomplete="" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="mother_name">Nome da mãe</label>
                                    <input name="mother_name" value="@if (old('mother_name')){{ old('mother_name') }}@elseif(request()->routeIs('registration.edit')){{ $registration->mother_name }}@endif" type="text"
                                        class="form-control" placeholder="Nome da mãe" autofocus autocomplete="" required>
                                </div>
                            </div>

                            <div class="row justify-content-between mb-3">
                                <div class="col-md-4">
                                    <label for="birth_day">Data de nascimento</label>
                                    <input name="birth_day" value="@if (old('birth_day')){{ old('birth_day') }}@elseif(request()->routeIs('registration.edit')){{ $registration->birth_day }}@endif" type="text"
                                        class="form-control" placeholder="Data de nascimento" autofocus autocomplete=""
                                        required id="birth_day">
                                </div>

                                <div class="col-md-4">
                                    <label for="civil_state_id">Estado civil</label>

                                    <select class="form-control" name="civil_state_id">
                                        @foreach ($civil_states as $civil_state)
                                            <option value="{{ $civil_state->id }}" @if (old('civil_state_id') && old('civil_state_id') == $civil_state->id) selected="true" @elseif(request()->routeIs('registration.edit') && $civil_state->id == $registration->civil_state_id) selected = "true" @endif>
                                                {{ $civil_state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="natural_location">Naturalidade</label>
                                    <input name="natural_location" value="@if (old('natural_location')){{ old('natural_location') }}@elseif(request()->routeIs('registration.edit')){{ $registration->natural_location }}@endif" type="text"
                                        class="form-control" placeholder="Naturalidade" autofocus autocomplete="" required
                                        id="natural_location">
                                </div>
                            </div>
                            <div class="row justify-content-between mb-3">
                                <div class="col-md-4">
                                    <label for="natural_district">Distrito</label>
                                    <input name="natural_district" value="@if (old('natural_district')){{ old('natural_district') }}@elseif(request()->routeIs('registration.edit')){{ $registration->natural_district }}@endif" type="text"
                                        class="form-control" placeholder="Distrito" autofocus autocomplete="" required
                                        id="natural_district">
                                </div>
                                <div class="col-md-4">
                                    <label for="natural_province">Província</label>
                                    <input name="natural_province" value="@if (old('natural_province')){{ old('natural_province') }}@elseif(request()->routeIs('registration.edit')){{ $registration->natural_province }}@endif" type="text"
                                        class="form-control" placeholder="Província" autofocus autocomplete="" required
                                        id="natural_province">
                                </div>

                                <div class="col-md-4">
                                    <label for="id_identity">Número do B.I</label>
                                    <input name="id_identity" value="@if (old('id_identity')){{ old('id_identity') }}@elseif(request()->routeIs('registration.edit')){{ $registration->id_identity }}@endif" type="text"
                                        class="form-control" placeholder="Número do B.I" autofocus autocomplete=""
                                        required id="id_identity">
                                </div>
                            </div>
                            <div class="row justify-content-between mb-3">
                                <div class="col-md-4">
                                    <label for="id_emision_date">Emitido em</label>
                                    <input name="id_emision_date" value="@if (old('id_emision_date')){{ old('id_emision_date') }}@elseif(request()->routeIs('registration.edit')){{ $registration->id_emision_date }}@endif" type="text"
                                        class="form-control" placeholder="Emitido em" autofocus autocomplete="" required
                                        id="id_emision_date">
                                </div>
                                <div class="col-md-4">
                                    <label for="id_emited_with">Emitido por Arq.(Local)</label>
                                    <input name="id_emited_with" value="@if (old('id_emited_with')){{ old('id_emited_with') }}@elseif(request()->routeIs('registration.edit')){{ $registration->id_emited_with }}@endif" type="text"
                                        class="form-control" placeholder="Emitido por Arq.(Local)" autofocus
                                        autocomplete="" required id="id_emited_with">
                                </div>
                                <div class="col-md-4">
                                    <label for="veicle_classe_id">Carta que pretende tirar</label>

                                    <select class="form-control" name="veicle_classe_id">
                                        @foreach ($veicle_classes as $veicle_class)
                                            <option value="{{ $veicle_class->id }}" @if (old('veicle_classe_id') && old('veicle_classe_id') == $veicle_class->id) selected="true" @elseif(request()->routeIs('registration.edit') && $veicle_class->id == $registration->veicle_classe_id) selected = "true" @endif>
                                                {{ $veicle_class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col"
                                    value="@if (request()->routeIs('registration.edit')) Actualizar @else Guardar @endif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
