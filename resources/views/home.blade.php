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
            @hasanyrole('Default')
                @include('home.default')
            @endhasanyrole

            @hasanyrole('Instructor')
                @include('home.instructor')
            @endhasanyrole
        </div>
    </div>
    <script>
    </script>
@endsection
