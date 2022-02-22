
            <div class="d-flex align-items-start">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2 container  row">
                        <div class="d-flex col-lg-4 col-sm-6 mb-2">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="{{ asset('/img/avatar.svg') }}"
                                        width="45px">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Nome Completo</strong>
                                <div class="text-muted">
                                    {{ $student->name }}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex col-lg-4 col-sm-6 mb-2">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="{{ asset('img/avatar.svg') }}"
                                        width="45px">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Nome do pai</strong>
                                <div class="text-muted">
                                    {{ $student->father_name }}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex col-lg-4 col-sm-6 mb-2">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="{{ asset('img/avatar.svg') }}"
                                        width="45px">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Nome da mãe</strong>
                                <div class="text-muted">
                                    {{ $student->mother_name }}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex col-lg-4 col-sm-6  mb-2">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="{{ asset('img/avatar.svg') }}"
                                        width="45px">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Gênero</strong>
                                <div class="text-muted">
                                    {{ $student->genre ? 'Masculino' : 'Feminino' }}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex col-lg-4 col-sm-6  mb-2">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="{{ asset('img/avatar.svg') }}"
                                        width="45px">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Idade</strong>
                                <div class="text-muted">
                                    {{ now()->year - $student->birth_day->year . ' Anos' }}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex col-lg-4 col-sm-6 mb-2">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="{{ asset('img/avatar.svg') }}"
                                        width="45px">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>B.I</strong>
                                <div class="text-muted">
                                    {{ $student->id_identity }}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex col-lg-4 col-sm-6 mb-2">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="{{ asset('img/avatar.svg') }}"
                                        width="45px">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Morada</strong>
                                <div class="text-muted">
                                    {{ $student->place_location }}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex col-lg-4 col-sm-6 mb-2">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="{{ asset('img/avatar.svg') }}"
                                        width="45px">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Carta</strong>
                                <div class="text-muted">
                                    {{ $student->veicle_class->name }}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex col-lg-4 col-sm-6  mb-2">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="{{ asset('img/avatar.svg') }}"
                                        width="45px">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Ano de ingresso</strong>
                                <div class="text-muted">
                                    {{ $student->admited_at->year ?? '' }}
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
