<div>

<h1 class="h3 mb-3">Instructor <strong>{{$instructor->name}}</strong> Turmas</h1>
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                @foreach ($classRooms as $class_room)
                <div class="col-sm-6 col-md-3" wire:click="updateClassRoom({{$class_room->id}})" >
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="float-end text-success">
                                @svg('phosphor-student-duotone' ,'feather align-middle')
                            </div>
                            <h4 class="mb-2">{{$class_room->name}}</h4>
                            <div class="mb-1">
                                <strong>
                                    Período: {{$class_room->period->name}} &nbsp;
                                    <span class="badge bg-success">
                                    {{ $class_room->period->init_at->hour . ':' .$class_room->period->init_at->minute . ' até '. $class_room->period->end_at->hour . ':' .$class_room->period->end_at->minute   }}
                                </span>
                                </strong>

                            </div>
                            <div>
                                Estudantes: {{$class_room->students->count()}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-body">

            <table class="table table-responsive display table-hover my-0 w-100" id="students_table">
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
                    @if (!is_null($students))

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

                    {{-- {{ $students->links() }} --}}
                    @endif
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
