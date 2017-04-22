@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-lg-center">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{route('applications.schools.create')}}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-plus-square fa-lg text-white " aria-hidden="true"></i> CRIAR UNIDADE
                                </a>
                            </div>
                            <div class="col-md-8 text-lg-right">
                                @can('permissao_academico')
                                {{ Form::open(['route'=>['items.search'],'method'=>'GET']) }}
                                    <div class="row">
                                        <input type="text" class="form-control offset-md-1 col-md-8" name="search"  placeholder="buscar unidade de ensino">
                                        <button class="offset-md-1 col-md-2 btn btn-secondary btn-sm"  type="submit">
                                            buscar
                                        </button>
                                    </div>
                                {{ Form::close()}}
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-bordered">

                            <thead>
                            <th class="text-lg-center">Nome</th>
                            <th class="text-lg-center">Responsável</th>
                            <th class="text-lg-center">email</th>
                            <th class="text-lg-center">cel</th>
                            <th colspan="2" class="text-lg-center">Ações</th>

                            </thead>
                            <tbody>
                            @forelse($schools->sortBy('name') as $school)
                                <tr>
                                    <td>{{$school->name}}</td>
                                    <td>{{$school->responsavel}}</td>
                                    <td>{{$school->email}}</td>
                                    <td>{{$school->cel}}</td>
                                    <td class="text-lg-center">
                                        <a class="btn btn-warning btn-sm" href="{{route('applications.schools.edit',['id'=>$school->id])}}">
                                            <i class="fa fa-edit fa-lg" aria-hidden="true"> editar</i>
                                        </a>
                                    </td>
                                    <td class="text-lg-center">
                                        <a class="btn btn-success btn-sm" href="{{route('applications.schools.config',['id'=>$school->id])}}">
                                            <i class="fa fa-edit fa-lg" aria-hidden="true"> configurar</i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">não existe registro</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {!! $schools->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection