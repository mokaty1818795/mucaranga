@extends('layouts.app')
@section('title', $student->name . ' (Estudante)')
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
                <h1 class="h3 d-inline align-middle"><strong>{{ $student->name }}</strong></h1>
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
            <div class="row mt-3">

            </div>
        </div>
        {{-- </div>

        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/avatar.svg') }}" alt="{{ $student->name }}"
                            class="img-fluid rounded-circle mb-2" width="128" height="128" />

                        <h5 class="card-title mb-0">{{ $student->name }}</h5>
                        <div class="text-muted mb-2 "><span
                                class="badge bg-light  rounded-pill p-2 my-3 card-title shadow-sm">Estudante</span></div>
                    </div>
                    <hr class="my-0" />

                </div>
            </div>
            <div class="col-md-8 col-xl-9 row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Dívida</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 font-red">{{ $student->account->debt . ' (mts)' }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Saldo Actual</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 font-red">{{ $student->account->current_balance . ' (mts)' }}</h1>
                        </div>
                    </div>
                </div>
                @foreach ($student->payments as $payment)
                @endforeach
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Status</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 font-red">{{ $student->account->payment_status . ' %' }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @endsection
    @section('modals')
        <x-modal modal-title="Anexar documentos" modal-data-id="attach_document">
            <x-slot name="modalBody">
                @include('dashboard.student_status.shared.upload_student_documents')
            </x-slot>
        </x-modal>


        <x-modal modal-title="Efectuar pagamentos" modal-data-id="financial_status">
            <x-slot name="modalBody">
                @include('dashboard.student_status.shared.student_payment')
            </x-slot>
        </x-modal>


        <x-modal modal-title="Informação do estudante" modal-data-id="academic_status">
            <x-slot name="modalBody">
                @include('dashboard.student_status.shared.student_information')
            </x-slot>
        </x-modal>
    @endsection
