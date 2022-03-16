@extends('layouts.app')
@section('title', 'Relatórios')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Usuários</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="users"></i>
                                                </div>
                                            </div>
                                        </div>
                                      <h4 class="text-muted mt-1 mb-3">Total : {{\App\Models\User::count()}}</h4>
                                        <div class="mb-0">
                                            <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
                                            <span class="text-muted"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <a href="{{ route('student.index') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Estudantes</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    @svg('phosphor-student-duotone' ,'feather align-middle')
                                                </div>
                                            </div>
                                        </div>
                                      <h4 class="text-muted mt-1 mb-3">  {{
                                        $students->count()
                                    }}</h4>
                                        <div class="mb-0">
                                            <span class="badge badge-danger-light"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
                                            <span class="text-muted"></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Turmas</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    @svg('phosphor-police-car-duotone','feather align-middle')
                                                </div>
                                            </div>
                                        </div>
                                      <h4 class="text-muted mt-1 mb-3">{{$class_rooms->count()}}</h4>
                                        <div class="mb-0">
                                            <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
                                            <span class="text-muted"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Intructores</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                </div>
                                            </div>
                                        </div>
                                      <h4 class="text-muted mt-1 mb-3">{{\App\Models\User::role('Instructor')->count()}}</h4>
                                        <div class="mb-0">
                                            <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
                                            <span class="text-muted"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-xl-3">
                                <a href="{{ route('finances.debits') }}">
                                    <div class="card ">
                                        <div class="card-body  ">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Estudantes em dívida</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="stat text-primary">
                                                        @svg('phosphor-student-duotone' ,'feather align-middle')
                                                    </div>
                                                </div>
                                            </div>
                                          <h4 class="text-muted mt-1 mb-3">Total :
                                             {{
                                                 $divida->count()
                                             }}
                                            </h4>
                                            <div class="mb-0">
                                                <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
                                                <span class="text-muted"></span>
                                            </div>
                                        </div>
                                    </div></a>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <a href="{{ route('finances.no_debits') }}">
                                <div class="card ">
                                    <div class="card-body  ">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Estudantes sem dívida</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    @svg('phosphor-student-duotone' ,'feather align-middle')
                                                </div>
                                            </div>
                                        </div>
                                      <h4 class="text-muted mt-1 mb-3">{{$sem_divida->count()}}</h4>
                                        <div class="mb-0">
                                            <span class="badge badge-danger-light"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
                                            <span class="text-muted"></span>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
