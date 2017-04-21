@extends('_layouts.app')

@section('content')

    <div class="container">
        <p>
            <a href="{{route('programs.create')}}" class="btn btn-outline-secondary">
                Criar Programa
            </a>
        </p>
        <table class="table table-bordered background-white">


            <thead>
            <th class="text-lg-center"><small>Nome</small></th>
            <th class="text-lg-center"><small>Descrição</small></th>
            <th class="text-lg-center"> <small>Conteúdos</small</th>
            <th colspan="2" class="text-lg-center"><small>Ações</small</th>



            </thead>
            <tbody>
            @foreach($programs as $program)
                <tr>
                    <td><small>{{$program->name}}</small></td>
                    <td><small>{{$program->description}}</small></td>
                    <td class="text-lg-center">
                        <a href="{{route('programs.items.index',['id'=>$program->id])}}"
                           class="btn btn-sm btn-outline-blue-cavaleiros text-blue-instituto">
                            <i class="fa fa-list" aria-hidden="true"></i> <small>listar</small> <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('programs.edit',['id'=>$program->id])}}"
                           class="btn btn-sm btn-outline-secondary text-blue-cavaleiros">
                            <i class="fa fa-edit text-blue-cavaleiros" aria-hidden="true"></i> <small>editar</small
                        </a>
                    </td>
                    <td>
                        <a href="{{route('programs.destroy',['id'=>$program->id])}}"
                           class="btn btn-sm btn-outline-secondary text-danger">
                            <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> <small>delete</small
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $programs->links() !!}

    </div>

    <br/>
    <br/>
@endsection
