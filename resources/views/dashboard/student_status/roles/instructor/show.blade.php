@section('content')
    <div class="container-fluid p-0">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible " role="alert" style="border-left: 5px solid darkred;">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="alert-message">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li><i class="align-middle" data-feather="alert-triangle"></i> &nbsp;
                                <strong>{{ $error }}</strong>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade" role="alert"
                style="border-left: 5px solid darkgreen;">
                <div class="alert-body">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('success') }}</strong>
                </div>
            </div>
        @endif

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <a href="{{ url()->previous() }}" class="col-auto btn btn-info">
                    <i class="align-middle" data-feather="corner-up-left"></i>&nbsp; Voltar
                </a>
            </div>
        </div>
        <div class="container row">
            <div class="col-12 w-100">
                <div class="card">
                    <div class="card-header">
                        <h5 class="h3 d-inline align-middle text-muted"><strong>{{ $student->name }}</strong></h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-inverse responsive" id="dashboard_payments_tables">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Código</th>
                                    <th>Estudante</th>
                                    <th>Exame</th>
                                    <th>Nota</th>
                                    <th>Actualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($student->exams as $exam)
                                <tr>

                                    <form action="{{ route('update.exam',$exam->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <td>{{$student->student_code}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$exam->exam_tpye->name}}</td>
                                        <td><input type="text" name="result" value="{{$exam->result}}" class="form-control px-2 py-1"></td>
                                        <td>
                                            <button type="submit" class="btn btn-success-light">
                                                Update
                                            </button>
                                        </td>
                                    </form>

                                </tr>
                                @empty
                                    	<div class="alert alert-warning">
                                            <span>
                                                O(A) Estudante ainda não realizou pagamento de nenhum exame ainda.
                                            </span>
                                        </div>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Estudante</th>
                                    <th>Exame</th>
                                    <th>Nota</th>
                                    <th>Actualizar</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
