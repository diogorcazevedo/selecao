@extends('admin::layout.app')

@section('content')



    <div class="col-lg-12">
        <br/>
        <br/>
        <br/>
    <table class="table table-bordered col-lg-6">

        <thead>
        <tr>
            <th>Id</th>
            <th>Administração</th>
            <th>Concurso</th>
            <th>Candidato</th>
            <th>Situação</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($registers as $register)
            <tr>
                <td>{{$register->id}}</td>
                <td>{{$register->work->edict->sponsor->name}}</td>
                <td>{{$register->work->name}}</td>
                <td>{{$register->user->name}}</td>
                <td>{{$register->active == 0 ? 'não confirmada' : 'confirmada' }}</td>

                @endcan

                <td>
                    <a href="{{route('admin.project.registers.slips.index',['id'=>$register->id])}}" class="btn btn-sm btn-table">
                        Boletos
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br/><br/><br/>
    </div>
@endsection