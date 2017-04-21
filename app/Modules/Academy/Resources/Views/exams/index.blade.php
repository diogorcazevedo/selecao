@extends('_layouts.app')

@section('content')

    <br/>
    <br/>
    <div class="container">
        <div class="row">
            @foreach($projects as $project)
                <div class="col-sm-6" style="margin-bottom: 2%;">
                    <div class="card card-block card-8"  style="background-color: transparent">
                        <p class="text-lg-center card card-block card-8 text-white" style="background-color: transparent">
                            <small>
                              {{$project->sponsor->alias}}
                            </small>
                        </p>
                        <div class="row">
                            <div class="col-sm text-lg-center">
                                <a href="#" class="btn btn-secondary btn-sm text-uppercase" data-toggle="modal" data-target="#exams{{$project->id}}">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Editar
                                </a>
                            </div>
                            <div class="col-sm text-lg-center">
                                <a href="#" class="btn btn-secondary btn-sm text-uppercase" data-toggle="modal" data-target="#preview{{$project->id}}">
                                    <i class="fa fa-search-plus" aria-hidden="true"></i> Visualizar
                                </a>
                            </div>
                            <div class="col-sm text-lg-center">
                                <a href="#" class="btn btn-secondary btn-sm text-uppercase" data-toggle="modal" data-target="#print{{$project->id}}">
                                    <i class="fa fa-print" aria-hidden="true"></i> Imprimir
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exams{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="modal-title" id="exampleModalLabel"><strong>EDITAR Provas por Cargo</strong>
                                    <button type="button" class="close pull-lg-right" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </p>
                            </div>
                            <div class="modal-body">
                                @foreach($project->jobs as $job)
                                    @if( !is_null($job->programs()->first()))
                                        <a href="{{route('exams.create',['job'=>$job->id,'program'=>$job->programs()->first()->program_id])}}">
                                            <p class="alert alert-info"><small> {{$job->name}}</small></p>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="preview{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="modal-title" id="exampleModalLabel"><strong>VISUALIZAR Provas por Cargo</strong>
                                    <button type="button" class="close pull-lg-right" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </p>
                            </div>
                            <div class="modal-body">
                                @foreach($project->jobs as $job)
                                    @if( !is_null($job->programs()->first()))
                                        <a href="{{route('exams.preview',['job'=>$job->id])}}">
                                            <p class="alert alert-info"><small> {{$job->name}}</small></p>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="print{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="modal-title" id="exampleModalLabel"><strong>IMPRIMIR Provas por Cargo</strong>
                                    <button type="button" class="close pull-lg-right" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </p>
                            </div>
                            <div class="modal-body">
                                @foreach($project->jobs as $job)
                                    @if( !is_null($job->programs()->first()))
                                        <a href="{{route('exams.pdf',['job'=>$job->id])}}">
                                            <p class="alert alert-info"><small> {{$job->name}}</small></p>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br/>
    <br/>
    <br/>
@endsection