@extends('layouts.app')
@section('title','Estados  civis')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Estados civis</h5>
                        <a href="{{ route('civil_state.create') }}" class="col-auto btn btn-purple">
                        <i class="fas fa-car-side align-middle" data-feather="loader"></i> &nbsp; <span class="align-middle">Novo estado civil</span>
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
                        <table id="civil_states_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Estado civil</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($civil_states as $civil_state)
                            <tr>
                                <td>{{$civil_state->id}}</td>
                                <td>{{$civil_state->name}}</td>
                                <td><a class="btn btn-warning" href="{{route('civil_state.edit',$civil_state->id)}}">Editar</a></td>
                                <td><button class="btn btn-danger" onclick="document.getElementById('civil_state_{{$civil_state->id}}_delete').submit()">Delete</button>
                                    <form action="{{route('civil_state.destroy',$civil_state->id)}}" method="post" id="civil_state_{{$civil_state->id}}_delete">
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
