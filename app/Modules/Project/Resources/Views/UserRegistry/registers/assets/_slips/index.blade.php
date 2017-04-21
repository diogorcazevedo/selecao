@extends('admin::layout.app')

@section('content')



    <div class="col-lg-12">
        <br/>
        <br/>

        <a href=" {{route('admin.project.registers.slips.create',['id'=>$register->id])}}" class="btn btn-sm btn-table text-uppercase ">Gerar Boleto</a>

        <a href="{{ URL::previous() }}" class="btn btn-default btn-sm btn-style pull-right">Cancelar</a>
        <br/>
        <br/>
        <br/>
    <table class="table table-bordered col-lg-6">

        <thead>
        <tr>

            <th>Id</th>
            <th>Concurso</th>
            <th>Candidato</th>
            <th>Número do Boelto</th>
            <th>Data</th>
            <th>Situação</th>
            <th colspan="2">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($slips as $slip)
            <tr>

                <td>{{$slip->id}}</td>
                <td>{{$slip->register->user->name}}</td>
                <td>{{$slip->register->work->name}}</td>
                <td>{{$slip->number}}</td>
                <td>{{birthdate($slip->date)}}</td>
                <td>{{$slip->paid == 0 ? 'não confirmada' : 'confirmada' }}</td>


                <td>

                    <a href="{{route('admin.project.registers.edit',['id'=>$slip->id])}}" class="btn btn-sm btn-table">
                        Editar
                    </a>

                </td>
                <td>
                    <a href="{{route('admin.project.registers.destroy',['id'=>$slip->id])}}" class="btn btn-sm btn-danger btn-style">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br/><br/><br/>
    </div>
@endsection