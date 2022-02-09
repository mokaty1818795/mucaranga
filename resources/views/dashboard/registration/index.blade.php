@extends('layouts.app')
@section('title','Estudantes matricluados')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Estudantes matricluados</h5>
                        <a href="{{ route('registration.create') }}" class="col-auto btn btn-purple">
                        <i class="fas fa-car-side align-middle" data-feather="layers"></i> &nbsp; <span class="align-middle">Novo tipo de carta</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible show fade" role="alert" style="border-left: 5px solid darkgreen;">
                                <div class="alert-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            </div>
                        @endif
                        <table id="registrations_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome da carta</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($registrations as $registration)
                            <tr>
                                <td>{{$registration->id}}</td>
                                <td>{{$registration->name}}</td>
                                <td><a class="btn btn-warning" href="{{route('registration.edit',$registration->id)}}">Editar</a></td>
                                <td><button class="btn btn-danger" onclick="document.getElementById('registration_{{$registration->id}}_delete').submit()">Delete</button>
                                    <form action="{{route('registration.destroy',$registration->id)}}" method="post" id="registration_{{$registration->id}}_delete">
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
                                        <th>Nome da carta</th>
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
