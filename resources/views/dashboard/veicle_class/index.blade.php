@extends('layouts.app')
@section('title','Cartas de condução')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Cartas de condução</h5>
                        <a href="{{ route('veicle_class.create') }}" class="col-auto btn btn-purple">
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
                        <table id="veicle_classs_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome da carta</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($veicle_classes as $veicle_class)
                            <tr>
                                <td>{{$veicle_class->id}}</td>
                                <td>{{$veicle_class->name}}</td>
                                <td><a class="btn btn-warning" href="{{route('veicle_class.edit',$veicle_class->id)}}">Editar</a></td>
                                <td><button class="btn btn-danger" onclick="document.getElementById('veicle_class_{{$veicle_class->id}}_delete').submit()">Delete</button>
                                    <form action="{{route('veicle_class.destroy',$veicle_class->id)}}" method="post" id="veicle_class_{{$veicle_class->id}}_delete">
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
