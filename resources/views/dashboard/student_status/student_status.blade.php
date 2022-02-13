@extends('layouts.app')
@section('title', $student->name . ' (Perfil)')
@section('content')
    <div class="container-fluid p-0">

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
                Situação academica</a>
            <a href="#" class="btn btn-purple mb-2" data-bs-toggle="modal" data-bs-target="#financial_status">
                <i class="align-middle" data-feather="dollar-sign"></i>
                Situação Financeira</a>
                <a href="{{ route('registration.edit', $student->id) }}" class="btn btn-purple mb-2">
                    <i class="align-middle" data-feather="edit"></i>
                    Editar informação</a>
        </div>
    </div>

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

            <div class="col-md-8 col-xl-9">
                <div class="card">

                    <div class="card-body h-100">

                        <div class="d-flex align-items-start">
                            <ul class="list-unstyled mb-0">
                                <li  class="mb-2 row">
                                    <div class="d-flex col-auto mb-2">
                                        <div class="flex-shrink-0">
                                            <div class="bg-light rounded-2">
                                                <img class="p-2" src="http://www.ec-mucaranga.com/img/avatar.svg"
                                                    width="45px">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <strong>Nome Completo</strong>
                                            <div class="text-muted">
                                                {{$student->name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex col-auto mb-2">
                                        <div class="flex-shrink-0">
                                            <div class="bg-light rounded-2">
                                                <img class="p-2" src="http://www.ec-mucaranga.com/img/avatar.svg"
                                                    width="45px">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <strong>Nome do pai</strong>
                                            <div class="text-muted">
                                                {{$student->father_name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex col-auto  mb-2">
                                        <div class="flex-shrink-0">
                                            <div class="bg-light rounded-2">
                                                <img class="p-2" src="http://www.ec-mucaranga.com/img/avatar.svg"
                                                    width="45px">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <strong>Nome da mãe</strong>
                                            <div class="text-muted">
                                                {{$student->mother_name}}
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('modals')
<x-modal modal-title="Anexar Arquivos" modal-data-id="attach_document">
    <x-slot name="modalBody">
        <p class="mb-0">
            Anexar arquivos
        </p>
    </x-slot>
    <x-slot name="modalFooter">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </x-slot>
</x-modal>


<x-modal modal-title="Situação Financeira" modal-data-id="financial_status">
    <x-slot name="modalBody">
        <p class="mb-0">
            Situação Financeira
        </p>
    </x-slot>
</x-modal>


<x-modal modal-title="Situação Acadámica" modal-data-id="academic_status">
    <x-slot name="modalBody">
        <p class="mb-0">
            Situação academica
        </p>
    </x-slot>
</x-modal>
@endsection
