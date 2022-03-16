@extends('layouts.app')
@section('title', $title ?? 'Estudantes matricluados')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @hasanyrole('Instructor')
                @include('dashboard.student_status.roles.instructor.index')
            @else
                @include('dashboard.student_status.roles.admin.index')
            @endhasanyrole
        </div>
    </div>
@endsection
