@extends('layouts.app')
@section('title', 'Relatórios')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6 col-xl-4">
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
                                        <h4 class="text-muted mt-1 mb-3">Total : {{ \App\Models\User::count() }}</h4>
                                        <div class="mb-0">
                                            <span class="badge badge-success-light"> <i
                                                    class="mdi mdi-arrow-bottom-right"></i> </span>
                                            <span class="text-muted"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
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
                                            <h4 class="text-muted mt-1 mb-3">
                                                {{                                                 $students->count() }}
                                            </h4>
                                            <div class="mb-0">
                                                <span class="badge badge-danger-light"> <i
                                                        class="mdi mdi-arrow-bottom-right"></i> </span>
                                                <span class="text-muted"></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-xl-4">
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
                                        <h4 class="text-muted mt-1 mb-3">{{ $class_rooms->count() }}</h4>
                                        <div class="mb-0">
                                            <span class="badge badge-success-light"> <i
                                                    class="mdi mdi-arrow-bottom-right"></i> </span>
                                            <span class="text-muted"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-xl-4">
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
                                        <h4 class="text-muted mt-1 mb-3">{{ \App\Models\User::role('Instructor')->count() }}
                                        </h4>
                                        <div class="mb-0">
                                            <span class="badge badge-success-light"> <i
                                                    class="mdi mdi-arrow-bottom-right"></i> </span>
                                            <span class="text-muted"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
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
                                                {{                                                 $divida->count() }}
                                            </h4>
                                            <div class="mb-0">
                                                <span class="badge badge-success-light"> <i
                                                        class="mdi mdi-arrow-bottom-right"></i> </span>
                                                <span class="text-muted"></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-xl-4">
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
                                            <h4 class="text-muted mt-1 mb-3">{{ $sem_divida->count() }}</h4>
                                            <div class="mb-0">
                                                <span class="badge badge-danger-light"> <i
                                                        class="mdi mdi-arrow-bottom-right"></i> </span>
                                                <span class="text-muted"></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="row w-80">
                            <div class="col-12 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <div class="float-end">
                                            <form class="row g-2">
                                                <div class="col-auto">
                                                    <input type="text" class="form-control bg-light border-0 py-2"
                                                        id="date_range">

                                                </div>
                                                <div class="col-auto">
                                                    <a href="" class="btn btn-primary-light">
                                                        Baixar relatório</a>
                                                </div>
                                            </form>
                                        </div>
                                        <h5 class="card-title mb-0">Relatório financeiro</h5>
                                    </div>
                                    <div class="card-body pt-2 pb-3">
                                        <div class="chart chart-md">
                                            <canvas id="chartjs-dashboard-line"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradientLight = ctx.createLinearGradient(0, 0, 0, 225);
            gradientLight.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradientLight.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ],
                    datasets: [{
                        label: "Entradas (MZN)",
                        tension: 0.3,
                        fill: true,
                        backgroundColor: gradientLight,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                show: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                show: false
                            }
                        }]
                    },
                }
            });
        });
    </script>
@endsection
