@extends('layouts.app')
@section('title', request()->routeIs('payment_phase.edit') ? 'Editar o estado civil - ' . $payment_phase->name : 'Criar novo estado civil')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('payment_phase.index') }}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('payment_phase.edit'))
                                <form action="{{ route('payment_phase.update', $payment_phase->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{encrypt($payment_phase->id)}}">
                                @else
                                    <form action="{{ route('payment_phase.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">


                                <div class="row col-md-12">
                                    <label for="name">Fâse de pagamento</label>
                                    <input name="name" value="@if(old('name')){{old('name')}}@elseif(request()->routeIs('payment_phase.edit')){{ $payment_phase->name }}@endif" type="text" class="form-control"
                                        placeholder="Fâse de pagamento" autofocus autocomplete="" required >
                                </div>


                            </div>

                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('payment_phase.edit')) Actualizar @else Guardar @endif">
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
