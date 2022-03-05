
<h1 class="h3 mb-3">Instructor <strong>{{auth()->user()->name}}</strong> Turmas</h1>
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                @foreach (auth()->user()->class_rooms as $class_room)
                <div class="col-sm-6 col-md-3">
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
