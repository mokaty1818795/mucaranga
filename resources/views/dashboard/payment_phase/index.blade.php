@extends('layouts.app')
@section('title','Fases de pagamento')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Fâses de pagamento</h5>
                        <a href="{{ route('payment_phase.create') }}" class="col-auto btn btn-purple">
                        <i class="fas fa-car-side align-middle" data-feather="dollar-sign"></i> &nbsp; <span class="align-middle">Nova fase de pagamento</span>
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
                        <table id="payment_phases_table" class="table table-striped table-responsive display table-hover my-0 w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fâse</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payment_phases as $payment_phase)
                            <tr>
                                <td>{{$payment_phase->id}}</td>
                                <td>{{$payment_phase->name}}</td>
                                <td><a class="btn btn-warning" href="{{route('payment_phase.edit',$payment_phase->id)}}">Editar</a></td>
                                <td><button class="btn btn-danger" onclick="document.getElementById('payment_phase_{{$payment_phase->id}}_delete').submit()">Delete</button>
                                    <form action="{{route('payment_phase.destroy',$payment_phase->id)}}" method="post" id="payment_phase_{{$payment_phase->id}}_delete">
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
                                        <th>Fâse</th>
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
