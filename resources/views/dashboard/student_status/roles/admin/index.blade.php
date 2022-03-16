<div class="row">
    <div class="card">
        <div class="card-header row justify-content-between">
            <a href="{{ url()->previous()}}" class="col-auto btn btn-info">
                <i class="align-middle" data-feather="corner-up-left"></i>&nbsp; Voltar
            </a>
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
