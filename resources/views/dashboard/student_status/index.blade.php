@extends('layouts.app')
@section('title', 'Estudantes matricluados')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Estudantes matricluados</h5>
                        <a href="{{ route('registration.create') }}" class="col-auto btn btn-purple">
                            <i class="fas fa-car-side align-middle" data-feather="edit"></i> &nbsp; <span
                                class="align-middle">Matricular estudante</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible show fade" role="alert"
                                style="border-left: 5px solid darkgreen;">
                                <div class="alert-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            </div>
                        @endif
                        <table id="students_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome do estudante</th>
                                    <th>Visualizar</th>
                                    <th>Actualizar</th>
                                    <th>Deletar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td><a class="btn btn-primary"
                                            href="{{ route('student.show', $student->id) }}">
                                            <i class="align-middle" data-feather="eye"></i>
                                            </a></td>
                                        <td><a class="btn btn-warning"
                                                href="{{ route('registration.edit', $student->id) }}">
                                                <i class="align-middle" data-feather="edit-2"></i>
                                            </a></td>
                                        <td><button class="btn btn-danger"
                                                onclick="document.getElementById('student_{{ $student->id }}_delete').submit()">
                                                <i class="align-middle" data-feather="trash-2"></i>
                                                </button>
                                            <form action="{{ route('registration.destroy', $student->id) }}"
                                                method="post" id="student_{{ $student->id }}_delete">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>

                                <tr>
                                    <th>Id</th>
                                    <th>Nome do estudante</th>
                                    <th>Visualizar</th>
                                    <th>Actualizar</th>
                                    <th>Deletar</th>
                                </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('search-bar')
<div class="input-group input-group-navbar">
    <span  class="form-control"
     style="background: #faf6ff;border: none;" data-bs-toggle="modal" data-bs-target="#search_bar">
     Pesquisar ... &nbsp; </span>
    <button class="btn" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search align-middle"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
    </button>
</div>

<x-modal modal-title="Pesquisar estudantes" modal-data-id="search_bar">

    <x-slot name="modalBody">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="">

                    @csrf

                    <input type="text" class="form-control" placeholder="Pesquisar ..." aria-label="Search"
                    style="background: #faf6ff;border: none;" autofocus >
                </form>
            </div>
        </div>
    </x-slot>
</x-modal>
@endsection


@push('js')
    <script>

    </script>
@endpush
