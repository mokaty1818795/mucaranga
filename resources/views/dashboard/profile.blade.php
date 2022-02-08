@extends('layouts.app')
@section('title', Auth::user()->name .' (Perfil)')
@section('content')
<div class="container-fluid p-0">

    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Perfil do {{$user->name}}</h1>
    </div>
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <img src="{{ asset('img/avatar.svg') }}" alt="{{$user->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                    <h5 class="card-title mb-0">{{$user->name}}</h5>
                    <div class="text-muted mb-2"><span class="card-title">Cargo</span> {{$user->roles->first()->name}}</div>
                </div>
                <hr class="my-0" />

        </div>
        </div>

        <div class="col-md-8 col-xl-9">
            <div class="card">

                <div class="card-body h-100">

                    <div class="d-flex align-items-start">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1 px-2">
                                <i class="far fa-user align-middle"></i>
                                <span class="align-middle mx-2">Nome completo <strong class="mx-3">{{$user->name}}</strong></span>
                            </li>
                            <li class="mb-1 p-2">

                                <i class="far fa-mail-bulk align-middle"></i>
                                <span class="align-middle mx-2">Email <strong class="mx-3">{{$user->email}}</strong></span>
                            </li>
                            <li class="mb-1 p-2">
                                <i class="fas fa-phone align-middle"></i>
                                <span class="align-middle mx-2">Contacto <strong class="mx-3">{{$user->contact}}</strong></span>
                            </li>
                            <li class="mb-1 p-2">
                               <i class="fas fa-transgender-alt    "></i>
                                <span class="align-middle mx-2">Sexo <strong class="mx-3">{{$user->genre? __('Masculino'):__('Feminino')}}</strong></span>
                            </li>
                            <li class="mb-1 p-2">
                               <i class="fas fa-shield-alt    "></i>
                                 <span class="align-middle mx-2">Status <strong class="mx-3">
                                     @if ($user->genre)
                                     <span class="badge bg-success rounded-pill p-2">Activo</span>

                                    </strong></span>
                                        @else
                                        <span class="badge bg-primary rounded-pill p-2">Inactivo</span>

                                    </strong></span>
                                     @endif

                             </li>
                            </ul>
                        </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
