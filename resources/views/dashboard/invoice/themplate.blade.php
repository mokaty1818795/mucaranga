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
                    <h5 class="card-title">{{$invoice->id}}</h5>
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
                                <th class="text-end">valor pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="fw-bold">
                                @if ($isExam)
                                <td scope="row">
                                    {{$invoice->exam_tpye->name}}
                                </td>
                                <td>Cash directo</td>
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
                                <td>{{$invoice->processedBy->name}}</td>
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
