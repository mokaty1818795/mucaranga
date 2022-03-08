<div class="row">
    <div class="col-sm-6 col-xl-3">
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
    <div class="col-sm-6 col-xl-3">
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
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">


                    <div class="col-auto">
                        <div class="stat text-primary">
                            @svg('phosphor-police-car-duotone','feather align-middle')
                        </div>
                    </div>
                </div>
                <h4 class="mt-1 mb-3 text-muted"></h4>
                <div class="mb-0">
                    <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <div class="stat text-primary">
                        </div>
                    </div>
                </div>
                <h4 class="mt-1 mb-3 text-muted"></h4>
                <div class="mb-0">
                    <span class="badge badge-warning-light"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
                </div>
            </div>
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
