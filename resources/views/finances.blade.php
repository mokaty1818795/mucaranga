@extends('layouts.app')
@section('title', 'Relatórios')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">

                            <div class="col-sm-6 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Estudant(es) matriculados</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    @svg('phosphor-student-duotone' ,'feather align-middle')
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3"></h1>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Estudant(es) em dívida</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    @svg('phosphor-student-duotone' ,'feather align-middle')
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3"></h1>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
