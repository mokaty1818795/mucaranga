@extends('layouts.app')
@section('title', request()->routeIs('civil_state.edit') ? 'Editar o estado civil - ' . $civil_state->name : 'Criar novo estado civil')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('civil_state.index') }}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('civil_state.edit'))
                                <form action="{{ route('civil_state.update', $civil_state->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="id" value="{{$civil_state->id}}">
                                @else
                                    <form action="{{ route('civil_state.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">

                                <label for="name">Nome do estado civil</label>
                                <div class="row col-md-12">
                                    <input name="name" value="@if(old('name')){{old('name')}}@elseif(request()->routeIs('civil_state.edit')){{ $civil_state->name }}@endif" type="text" class="form-control"
                                        placeholder="Nome do estado civil" autofocus autocomplete="" required >
                                </div>
                            </div>

                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('civil_state.edit')) Actualizar @else Guardar @endif">
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
