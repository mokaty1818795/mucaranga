@section('content')
    <div class="container-fluid p-0">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible " role="alert" style="border-left: 5px solid darkred;">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="alert-message">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li><i class="align-middle" data-feather="alert-triangle"></i> &nbsp;
                                <strong>{{ $error }}</strong>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade" role="alert"
                style="border-left: 5px solid darkgreen;">
                <div class="alert-body">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('success') }}</strong>
                </div>
            </div>
        @endif

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <a href="{{ url()->previous() }}" class="col-auto btn btn-info">
                    <i class="align-middle" data-feather="corner-up-left"></i>&nbsp; Voltar
                </a>

            </div>
            <div class="col-auto ms-auto text-end mt-sm-2 mt-md-0">
                <a href="#" class="btn btn-purple  me-2 mb-2" data-bs-toggle="modal" data-bs-target="#attach_document">
                    <i class="align-middle" data-feather="paperclip"></i>
                    Anexar documentos</a>
                <a href="#" class="btn btn-purple  me-2 mb-2" data-bs-toggle="modal" data-bs-target="#academic_status">
                    @svg('phosphor-student-duotone' ,'feather align-middle')
                    Dados do estudante</a>

                <a href="{{ route('registration.edit', $student->id) }}" class="btn btn-purple mb-2">
                    <i class="align-middle" data-feather="edit"></i>
                    Editar informação</a>
            </div>
            <div class="container row justify-content-between mt-3">
                <div class="col-sm-5">
                    <div class="card button" data-bs-toggle="modal" data-bs-target="#make_payments"
                        style="cursor:pointer">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-2">
                                    <h5 class="card-title">Pagamento de matrícula</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        @svg('fluentui-payment-16-o','feather align-middle')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 ">
                    <div class="card button" data-bs-toggle="modal" data-bs-target="#make_exams_payments"
                        style="cursor:pointer">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-2">
                                    <h5 class="card-title">Pagamento de Exames</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        @svg('fluentui-payment-16-o','feather align-middle')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container row">
                <div class="col-12 w-100">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="h3 d-inline align-middle text-muted"><strong>{{ $student->name }}</strong></h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-inverse responsive">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Pagamento</th>
                                        <th>Estudante</th>
                                        <th>Atendido por</th>
                                        <th>Data de atendimento</th>
                                        <th>valor pago</th>
                                        <th>Recibo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $item)
                                        <tr>
                                            <td scope="row"> {{ $item->paymentOf->name }}</td>
                                            <td> {{ $item->student->name }}</td>
                                            <td>{{ $item->processedBy->name }}</td>
                                            <td>{{ $item->date ?? '' }}</td>
                                            <td> <strong>{{ $item->amount . ' MZN' }} </strong></td>
                                            <td scope="row">
                                                <a
                                                    href="{{ route('payment_invoices', [
                                                        'exam_token' => Crypt::encrypt($item->isExam),
                                                        'invoice' => $item->id,
                                                        'student' => $student->id,
                                                    ]) }}">
                                                    @svg('phosphor-printer','feather align-middle')</a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modals')
    <x-modal modal-title="Anexar documentos" modal-data-id="attach_document">
        <x-slot name="modalBody">
            @include(
                'dashboard.student_status.shared.upload_student_documents'
            )
        </x-slot>
    </x-modal>

    <x-modal modal-title="Informação do estudante" modal-data-id="academic_status">
        <x-slot name="modalBody">
            @include(
                'dashboard.student_status.shared.student_information'
            )
        </x-slot>
    </x-modal>



    <x-modal modal-title="Efectuar pagamentos" modal-data-id="make_payments">
        <x-slot name="modalBody">
            @include(
                'dashboard.student_status.shared.student_payment'
            )
        </x-slot>
    </x-modal>

    <x-modal modal-title="Efectuar pagamentos de exames" modal-data-id="make_exams_payments">
        <x-slot name="modalBody">
            @include(
                'dashboard.student_status.shared.student_exam_payment'
            )
        </x-slot>
    </x-modal>
@endsection

@push('css')
    <style>
        .button {
            cursor: pointer;

        }

        .button:hover {
            box-shadow: 1rem 2.1rem 2.2rem rgba(0, 0, 0, .05) !important;
        }

    </style>
@endpush
