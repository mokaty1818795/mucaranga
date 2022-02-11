@extends('layouts.app')
@section('title', request()->routeIs('period.edit') ? 'Editar o horário - ' . $period->name : 'Criar novo horário')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('period.index') }}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('period.edit'))
                                <form action="{{ route('period.update', $period->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{encrypt($period->id)}}">
                                @else
                                    <form action="{{ route('period.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-center mb-3">
                                <label for="name">Nome do horário</label>
                                <div class="row col-md-12">
                                    <input name="name" value="@if(old('name')){{old('name')}}@elseif(request()->routeIs('period.edit')){{ $period->name }}@endif" type="text" class="form-control"
                                        placeholder="Nome do horário" autofocus autocomplete="" required>
                                </div>
                            </div>
                            <div class=" row justify-content-between mb-3">
                                <div class="  col-md-6">
                                    <label for="init_at">Hora inicial</label>
                                    <input type="text" name="init_at" id="init_at" class="form-control"
                                    @if(old('name')){{old('init_at')}} value="{{old('init_at')}}" @elseif (request()->routeIs('period.edit')) value="{{ $period->init_at->hour }}:{{ $period->init_at->minute }}" @endif placeholder="{{ now()->hour . ':' . now()->minute }}" required>
                                </div>
                                <div class="  col-md-6">
                                    <label for="init_at">Hora final</label>
                                    <input type="text" name="end_at" id="end_at" class="form-control"
                                    @if(old('end_at')){{old('end_at')}} value="{{old('end_at')}}" @elseif (request()->routeIs('period.edit')) value="{{ $period->end_at->hour }}:{{ $period->end_at->minute }}" @endif
                                        placeholder="{{ now()->addMinutes(30)->hour .':' .now()->now()->addMinutes(30)->minute }}"
                                        required>
                                </div>
                            </div>

                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('period.edit')) Actualizar @else Guardar @endif">
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
