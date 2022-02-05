@extends('layouts.app')
@section('title','create or edit')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(request()->routeIs('user.edit'))
                            <form action="{{route('user.update',$user->id)}}" method="post">
                                @method('PATCH')
                                @else
                                    <form action="{{route('user.store')}}" method="post">
                                        @method('POST')
                                        @endif
                                        <div class="row col-sm-12">
                                            <label for="name">Nome de usuário</label>
                                            <input name="name" value="@if(request()->routeIs('user.edit')){{$user->name}}@endif" type="text" class="form-control" placeholder="Nome de usuário" autofocus autocomplete="">
                                        </div>
                                        <div class="row col-sm-12">
                                            <label for="name">Nome do email</label>
                                            <input name="email" value="@if(request()->routeIs('user.edit')){{$user->email}}@endif" type="email" class="form-control" placeholder="Nome do email" autofocus autocomplete="">
                                        </div>
                                        <div class="row col-sm-12">
                                            <label for="name">Contacto</label>
                                            <input name="contact" value="@if(request()->routeIs('user.edit')){{$user->contact}}@endif" type="text" class="form-control" placeholder="Contacto" autofocus autocomplete="">
                                        </div>
                                        <div class="row col-sm-12">
                                            <label for="name">Genero</label>
                                            <select class="form-control custom-sellect">
                                                <option value="0">Feminino</option>
                                                <option value="1">Masculino</option>
                                            </select>
                                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
