<div class="row">

    <div class="col-sm-6 col-xl-4">
        <a href="{{ route('registration.create') }}">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="edit"></i>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-1 mb-3 text-muted">Matricular Estudante</h4>
                    <div class="mb-0">
                        <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-4">
       <a href="#" data-bs-toggle="modal" data-bs-target="#search_student_bar">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <div class="stat text-primary">
                            @svg('phosphor-student-duotone' ,'feather align-middle')
                        </div>
                    </div>
                </div>
                <h4 class="mt-1 mb-3 text-muted">Efectuar Pagamentos</h4>
                <div class="mb-0">
                    <span class="badge badge-danger-light"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
                </div>
            </div>
        </div>
    </a>
    </div>
    <div class="col-sm-6 col-xl-4">
        <a href="{{ route('finances') }}">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="stat text-primary">
                                @svg('phosphor-chart-line-up-fill' ,'feather align-middle')
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-1 mb-3 text-muted">Relatórios</h4>
                    <div class="mb-0">
                        <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>


<div class="row">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-inverse table-responsive" id="dashboard_payments_tables">
                <thead class="thead-inverse">
                    <tr>
                        <th>Estudante</th>
                        <th>Código</th>
                        <th>Pagamento</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th>Recibo</th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach ($payments as $payment)
                       <tr>
                           <td>{{$payment->student->name}}</td>
                           <td>{{$payment->student->student_code}}</td>
                           <td>{{$payment->paymentOf->name}}</td>
                           <td>{{$payment->amount}} MZN</td>
                           <td>{{__(date_format($payment->date, 'd-m-Y H:i:s'))}}</td>
                           <td scope="row">
                            <a href="{{ route('payment_invoices', [
                                'exam_token' => Crypt::encrypt($payment->isExam),
                                'invoice' => $payment->id,
                                'student' => $payment->student
                            ]) }}"> @svg('phosphor-printer','feather align-middle')</a>
                        </td>
                       </tr>
                       @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Estudante</th>
                            <th>Código</th>
                            <th>Pagamento</th>
                            <th>Valor</th>
                            <th>Data</th>
                            <th>Recibo</th>
                        </tr>
                    </tfoot>
            </table>
        </div>
    </div>
</div>

<x-modal modal-title="Pesquisar estudantes" modal-data-id="search_student_bar">
    <x-slot name="modalTitle">
    </x-slot>
    <x-slot name="modalBody">
        @livewire('search-student')
    </x-slot>
</x-modal>
