@extends('layouts.app')
@section('title', request()->routeIs('exam_type.edit') ? 'Editar o exame - ' . $exam_type->name : 'Criar novo tipo de exame')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('exam_type.index') }}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('exam_type.edit'))
                                <form action="{{ route('exam_type.update', $exam_type->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{encrypt($exam_type->id)}}">
                                @else
                                    <form action="{{ route('exam_type.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">


                                <div class="row col-md-6">
                                    <label for="name">Tipo de exame</label>
                                    <input name="name" value="@if(old('name')){{old('name')}}@elseif(request()->routeIs('exam_type.edit')){{ $exam_type->name }}@endif" type="text" class="form-control"
                                        placeholder="Tipo de exame" autofocus autocomplete="" required >
                                </div>

                                <div class="row col-md-6">
                                    <label for="name">Valor a pagar (Mts)</label>
                                    <input name="price" value="@if(old('price')){{old('price')}}@elseif(request()->routeIs('exam_type.edit')){{ $exam_type->price }}@endif" type="text" class="form-control"
                                        placeholder="Valor a pagar" autofocus autocomplete="" required >
                                </div>
                            </div>

                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('exam_type.edit')) Actualizar @else Guardar @endif">
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
