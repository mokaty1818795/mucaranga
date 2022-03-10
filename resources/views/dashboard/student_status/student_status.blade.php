@extends('layouts.app')
@section('title', $student->name . ' (Estudante)')

@hasanyrole('Instructor')
    @include('dashboard.student_status.roles.instructor.show')
@else
    @include('dashboard.student_status.roles.admin.show')
@endhasanyrole
