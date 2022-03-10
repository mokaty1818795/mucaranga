<div class="row">
    <div class="card">
        <div class="card-header row justify-content-between">
            <h5 class="card-title col-auto">Estudantes</h5>
            <a href="{{ route('dashboard') }}" class="col-auto btn btn-purple">
                @svg('radix-dashboard' ,'feather align-middle') &nbsp; <span
                    class="align-middle">Turmas</span>
            </a>
        </div>
    </div>
</div>
<div class="row">
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
                            <th>Código</th>
                            <th>Nome do estudante</th>
                            <th>Carta</th>
                            <th>Turma</th>
                            <th>Exames</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->student_code }}</td>
                                <td>{{ $student->name }}</td>
                               <td>{{$student->veicle_class->name}}</td>
                               <td>{{$student->class_rooms->first()->name}} &nbsp; - &nbsp;
                                <span class="badge bg-success">
                                 {{ $student->class_rooms->first()->period->init_at->hour . ':' .$student->class_rooms->first()->period->init_at->minute . ' até '. $student->class_rooms->first()->period->end_at->hour . ':' .$student->class_rooms->first()->period->end_at->minute   }}
                            </span></td>
                               <td>
                                   <a href="{{ route('student.show', $student->id) }}" class="btn btn-success-light w-100 rounded-3">
                                        @svg('phosphor-student-duotone' ,'feather align-middle')
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>

                        <tr>
                            <th>Código</th>
                            <th>Nome do estudante</th>
                            <th>Carta</th>
                            <th>Turma</th>
                            <th>Exams</th>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
