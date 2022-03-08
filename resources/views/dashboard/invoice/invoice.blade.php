@extends('layouts.app')
@section('title', 'Recibo')

@push('css')
    <style>
        h3,
        h4,
        h5,
        h6 {
            font-weight: 600;
            color: #6a6a6a;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <a href="{{ url()->previous()}}" class="col-auto btn btn-info">
                    <i class="align-middle" data-feather="corner-up-left"></i>&nbsp; Voltar
                </a>
            </div>
            <div class="col-auto ms-auto text-end mt-sm-2 mt-md-0">
                <a href="{{ route('print_payment_invoice', [
                    'exam_token' => $isExam ?  Crypt::encrypt('Exam') : Crypt::encrypt('isExam'),
                    'invoice' => $invoice->id,
                    'student' => $student->id,
                ]) }}"
                    class="btn btn-purple  me-2 mb-2" id="payment_invoice_button">
                    @svg('phosphor-printer','feather align-middle')
                    &nbsp; Imprimir recibo
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="row" id="payment_invoice">
                <div class="card p-5">
                    <div class="card-header pt-4">
                        <div class="row justify-content-between">
                            <div class="col-sm-2">
                                <img src="" alt="" srcset="" width="100" height="100">
                            </div>
                            <div class="col-sm-8">
                                <p class="text-end">
                                    <span>Empresa</span> <br>
                                    <span>Província</span> <br>
                                    <span>Localização detalhada</span> <br>
                                    <span>Email : geral@mucaranga.com</span><br>
                                    <span>Contacto : +258 85 689 0404</span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row content-align-between mb-4">
                            <div class="col-sm">
                                <h4>Cliente</h4>
                                <h5 class="card-title">{{$student->name}}</h5>
                                <h5 class="card-title">{{$student->veicle_class->name}}</h5>
                                <h5 class="card-title">{{$student->id_identity}}</h5>
                            </div>
                            <div class="col-sm text-end">
                                <h3>Recibo</h3>
                                @if ($isExam)
                                <h5 class="card-title">#EXM-{{$invoice->id}}</h5>
                                @else
                                <h5 class="card-title">#PYM-{{$invoice->id}}</h5>
                                @endif
                                <h4 class="mt-2">Data e hora</h4>
                                <h5 class="card-title">{{$invoice->created_at}}</h5>


                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-12">
                                <table class="table table-striped table-inverse table-responsive">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Pagamento</th>
                                            <th>Forma de pagamento</th>
                                            @if (!is_null($invoice->bank_invoice_code))
                                                <th>Número do recibo bancário</th>
                                        @endif
                                            <th class="text-end">valor pago</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="fw-bold">
                                            @if ($isExam)
                                            <td scope="row">
                                                {{$invoice->exam_tpye->name}}
                                            </td>

                                                @if (is_null($invoice->bank_invoice_code))
                                                <td>
                                                    Cash directo </td>
                                                    @else

                                                    <td>Pagamento Bancário</td>
                                                    <td class="text-start">{{$invoice->bank_invoice_code }}</td>
                                                @endif
                                            </td>
                                            <td class="text-end text-success">+{{$invoice->exam_tpye->price}} MZN</td>
                                            @else
                                            <td scope="row">
                                                {{$invoice->payment_phase->name}}
                                            </td>
                                            <td>Cash directo</td>
                                            <td class="text-end text-success">+{{$invoice->amount}} MZN</td>
                                            @endif
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr class="fw-bold">
                                            <td colspan="2">Funcionário</td>
                                            <td colspan=" @if (!is_null($invoice->bank_invoice_code)) 2 @endif" class="text-end">{{$invoice->processedBy->name}}</td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            @if (!$isExam)
                            <div class="col-sm-12 row justify-content-end">
                                <div class="row col-sm-5">
                                    <div class="col-sm-12 row justify-content-between w-100 p-0">
                                        <small class="col-sm-6 card-title">
                                            Dívida
                                        </small>
                                        <small class="col-sm-6 fs-6 fw-bold text-end text-danger">
                                            {{$student->veicle_class->price - $invoice->amount}} MZN
                                        </small>
                                    </div>
                                    <hr>
                                    <div class="col-sm-12 row justify-content-between w-100 p-0">
                                        <small class="col-sm-6 card-title">
                                            Saldo
                                        </small>
                                        <small class="col-sm-6 fs-6 fw-bold text-end text-primary">
                                            {{$student->payments->pluck('amount')->sum()}} MZN
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endif



                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <small class="text-end"> Documento processado pelo computador &copy; Escola de Condução Mucaranga, Lda 2022 </small>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
