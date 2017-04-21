@extends('admin::_layouts._structure.app')
@section('content')


        <div class="col-lg-12">

            <table class="table table-bordered">

                <thead>
                <tr>
                    <th> ID</th>
                    <th> Gerente de Projeto</th>
                    <th> Contratante</th>
                    <th> Cargo</th>

                    @can('PROJECT_ADMIN')
                    <th colspan="2"><i class="fa fa-pencil-square"></i> </th>
                    @endcan
                </tr>
                </thead>
                <tbody>

                @foreach($works as $work)
                    <tr>
                        <td>{{$work->id}}</td>
                        <td>{{$work->edict->user->name}}</td>
                        <td>{{$work->edict->sponsor->name}}</td>
                        <td>{{$work->name}}</td>
                        @can('PROJECT_ADMIN')
                        <td><a href="{{route('admin.project.registers.index',['id'=>$work->id])}}" class="btn-sm btn btn-table"><i class="fa fa-list" aria-hidden="true"></i> Listar</a></td>
                        <td><a href="{{route('admin.project.registers.create',['id'=>$work->id])}}" class="btn-sm btn  btn-table"><i class="fa fa-plus-square" aria-hidden="true"></i> Criar</a></td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>

                {!! $works->links() !!}

        </div>






@endsection