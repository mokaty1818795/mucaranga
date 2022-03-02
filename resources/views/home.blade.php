@extends('layouts.app')
@section('title','Dashboard')

@push('css')
<style>
    option{
        background: #fff;
    }
    option:selected{
        color: blue;
    }
</style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="h3 mb-3"><strong>{{auth()->user()->roles->first()->name}}</strong> Dashboard</h1>
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Estudant(es)</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    @svg('phosphor-student-duotone' ,'feather align-middle')
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{$students}}</h1>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Intrutor(es)</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    @svg('phosphor-chalkboard-teacher-duotone' ,'feather align-middle')

                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{$intructors}}</h1>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Funcionário(os)</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    @svg('fluentui-person-call-20-o','feather align-middle')
                                                     </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{$employees}}</h1>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Admin's</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    @svg('phosphor-shield-check-bold' ,'feather align-middle')
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{$administrators}}</h1>

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

    </script>
@endsection
