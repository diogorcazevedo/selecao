@extends('_layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                    <a href="#" class="btn btn-warning text-uppercase card-24" data-toggle="modal" data-target="#createItem">
                       <i class="fa fa-graduation-cap fa-lg text-white " aria-hidden="true"></i> CRIAR ITEM
                    </a>
            </div>
            <div class="col-sm-6">
                @can('permissao_academico')
                {{ Form::open(['route'=>['items.search'],'method'=>'GET']) }}
                <div class="container card-block card-8">
                    <div class="row">
                        <input type="text" class="form-control offset-md-1 col-md-8" name="search"  placeholder="buscar itens">
                        <button class="offset-md-1 col-md-2 btn btn-outline-secondary btn-sm nav-item"  type="submit">
                            <small> buscar</small>
                        </button>
                    </div>
                </div>
                {{ Form::close()}}
                @endcan
                <br/>
            </div>
        </div>
    </div>

    <br/>
    <br/>


    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-block card-8"  style="background-color: transparent">
                    <a href="#" class="btn btn-outline-secondary text-uppercase" data-toggle="modal" data-target="#status0">
                        <small>ITENS EM CONSTRUÇÃO</small>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-block card-8"  style="background-color: transparent">
                    <a href="#" class="btn btn-outline-secondary text-uppercase" data-toggle="modal" data-target="#status1">
                        <small class="text-warning">ITENS COM A COORDENAÇÃO </small>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-block card-8"  style="background-color: transparent">
                    <a href="#" class="btn btn-outline-secondary text-uppercase disabled">
                        <small>ITENS DESCARTADOS</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-block card-8"  style="background-color: transparent">
                    <a href="#" class="btn btn-outline-success  text-uppercase" data-toggle="modal" data-target="#status50">
                        <small>PRONTOS PARA USO</small>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-block card-8"  style="background-color: transparent">
                    <a href="#" class="btn btn-outline-secondary text-uppercase text-white" data-toggle="modal" data-target="#status100">
                        <small>LIBERADO PARA DIVULGAÇÃO</small>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-block card-8" style="background-color: transparent">
                    <a href="#" class="btn btn-outline-secondary text-white text-uppercase" data-toggle="modal" data-target="#all">
                        <small>TODOS</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <br/>
    <br/>
    <br/>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-block card-8"  style="background-color: transparent">
                    <a href="#" class="btn btn-outline-success  text-uppercase" data-toggle="modal" data-target="#list">
                        <small>LISTAR</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODALS -->





    <div class="modal fade" id="status0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel"><strong>Listar ITENS EM CONSTRUÇÃO</strong>
                        <button type="button" class="close pull-lg-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </p>
                </div>
                <div class="modal-body">
                    @foreach($programs as $program)

                        <a href="{{route('items.status',['status'=>0,'program_id'=>$program->id])}}">
                            <p class="alert alert-info">{{$program->name}}</p>
                        </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="status1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel"><strong>Listar ITENS COM A COORDENAÇÃO</strong>
                        <button type="button" class="close pull-lg-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </p>
                </div>
                <div class="modal-body">
                    @foreach($programs as $program)

                        <a href="{{route('items.status',['status'=>1,'program_id'=>$program->id])}}">
                            <p class="alert alert-info">{{$program->name}}</p>
                        </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="status50" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel"><strong>PRONTOS PARA USO</strong>
                        <button type="button" class="close pull-lg-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </p>
                </div>
                <div class="modal-body">
                    @foreach($programs as $program)

                        <a href="{{route('items.status',['status'=>50,'program_id'=>$program->id])}}">
                            <p class="alert alert-info">{{$program->name}}</p>
                        </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="status100" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel"><strong>LIBERADOS PARA DIVULGAÇÃO</strong>
                        <button type="button" class="close pull-lg-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </p>
                </div>
                <div class="modal-body">
                    @foreach($programs as $program)

                        <a href="{{route('items.status',['status'=>100,'program_id'=>$program->id])}}">
                            <p class="alert alert-info">{{$program->name}}</p>
                        </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel"><strong>Listar Todos</strong>
                        <button type="button" class="close pull-lg-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </p>
                </div>
                <div class="modal-body">
                    @foreach($programs as $program)

                        <a class="text-blue-instituto" href="{{route('items.all',['program_id'=>$program->id])}}">
                            <p class="alert alert-info">{{$program->name}}</p>
                        </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel"><strong>APRESENTAR EM FORMA DE LISTA</strong>
                        <button type="button" class="close pull-lg-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </p>
                </div>
                <div class="modal-body">
                    @foreach($programs as $program)

                        <a href="{{route('items.listar',['program_id'=>$program->id])}}">
                            <p class="alert alert-info">{{$program->name}}</p>
                        </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('academy::rails._partial.create')
@endsection