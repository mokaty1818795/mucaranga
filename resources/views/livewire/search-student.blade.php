<div>
    <div class="row justify-content-center">
        <div class="col-12">
                <input type="text" class="form-control" placeholder="Pesquisar estudante por nome ou código" aria-label="Search"
                style="background: #faf6ff;border: none;" autofocus id="searchQuery" wire:model="searchQuery" >
        </div>
    </div>

    <table class="table table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th> Codigo</th>
                <th>Nome</th>
                <th>Carta</th>
                <th>Pagamentos</th>
            </tr>
            </thead>
            <tbody>
                @foreach($searchResults as $student)
                   <tr>
                       <td>
                           {{$student->searchable->student_code}}
                       </td>
                       <td>
                        {{$student->searchable->name}}
                    </td>
                    <td>
                        {{$student->searchable->veicle_class->name}}
                    </td>
                    <td>
                        <a href=" {{$student->url}}" class="btn btn-success-light w-100 rounded-3">
                            @svg('phosphor-student-duotone' ,'feather align-middle')
                        </a>
                    </td>
                   </tr>
                @endforeach
            </tbody>
    </table>
</div>
