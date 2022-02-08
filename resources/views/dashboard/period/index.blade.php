@extends('layouts.app')
@section('title','Horário de aulas')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Horário de aulas</h5>
                        <a href="{{ route('period.create') }}" class="col-auto btn btn-purple">
                        <i class="fas fa-clock    "></i> &nbsp; <span class="align-middle">Novo horário</span>
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
                        <table id="periods_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome do periodo</th>
                                <th>Horário de início</th>
                                <th>Horário do fim</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($periods as $period)
                            <tr>
                                <td>{{$period->id}}</td>
                                <td>{{$period->name}}</td>
                                <td>{{$period->init_at}}</td>
                                <td>{{$period->end_at}}</td>
                                <td><a class="btn btn-warning" href="{{route('period.edit',$period->id)}}">Editar</a></td>
                                <td><button class="btn btn-danger" onclick="document.getElementById('period_{{$period->id}}_delete').submit()">Delete</button>
                                    <form action="{{route('period.destroy',$period->id)}}" method="post" id="period_{{$period->id}}_delete">
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
                                        <th>Nome do periodo</th>
                                        <th>Horário de início</th>
                                        <th>Horário do fim</th>
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
