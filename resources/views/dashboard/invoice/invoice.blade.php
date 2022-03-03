@extends('layouts.app')
@section('title', 'Recibo')

@push('css')
    <style>
        h3,
        h4,
        h5,
        h6 {
            font-weight: 600;
            color: #6a6a6a;
        }

    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto ms-auto text-end mt-sm-2 mt-md-0">
                <a href="#" class="btn btn-purple  me-2 mb-2" id="payment_invoice_button">
                    @svg('phosphor-printer','feather align-middle')
                    &nbsp; Imprimir recibo
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            @include('dashboard.invoice.themplate')
        </div>
    </div>
@endsection
