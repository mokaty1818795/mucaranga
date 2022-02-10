@extends('layouts.app')
@section('title', request()->routeIs('registration.edit') ? 'Editar o matriculado de nome  ' . $registration->name : 'Realizar nova matrícula')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('registration.index') }}" class="col-auto btn btn-info">
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
                                    <input type="hidden" name="id" value="{{$registration->id}}">
                                @else
                                    <form action="{{ route('registration.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">
                                <div class="col-md-4">
                                    <label for="name">Nome do estudante</label>
                                    <input name="name" value="@if(old('name')){{old('name')}}@elseif(request()->routeIs('registration.edit')){{ $registration->name }}@endif" type="text" class="form-control"
                                        placeholder="Nome do estudante" autofocus autocomplete="" required >
                                </div>
                                <div class="col-md-4">
                                    <label for="father_name">Nome do pai</label>
                                    <input name="father_name" value="@if(old('father_name')){{old('father_name')}}@elseif(request()->routeIs('registration.edit')){{ $registration->father_name }}@endif" type="text" class="form-control"
                                        placeholder="Nome do pai" autofocus autocomplete="" required >
                                </div>
                                <div class="col-md-4">
                                    <label for="mother_name">Nome da mãe</label>
                                    <input name="mother_name" value="@if(old('mother_name')){{old('mother_name')}}@elseif(request()->routeIs('registration.edit')){{ $registration->mother_name }}@endif" type="text" class="form-control"
                                        placeholder="Nome da mãe" autofocus autocomplete="" required >
                                </div>
                            </div>

                            <div class="row justify-content-between mb-3">
                                <div class="col-md-4">
                                    <label for="mother_name">Nome da mãe</label>
                                    <input name="mother_name" value="@if(old('mother_name')){{old('mother_name')}}@elseif(request()->routeIs('registration.edit')){{ $registration->mother_name }}@endif" type="text" class="form-control"
                                        placeholder="Nome da mãe" autofocus autocomplete="" required >
                                </div>
                            </div>

                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('registration.edit')) Actualizar @else Guardar @endif">
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
