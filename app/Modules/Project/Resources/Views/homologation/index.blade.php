@extends('_layouts.app')

@section('content')

@include('project::homologation.search')


    <div class="container">
        <p class="card card-block card-8 text-white" style="background-color: transparent">POR CARGO</p>
        <div class="row">
            @foreach($project->jobs as $job)
            <div class="col-sm-6" style="margin-bottom: 3%;">
                <div class="card card-block card-8"  style="background-color: transparent">
                    <p class="text-lg-center card card-block card-8 text-white" style="background-color: transparent">
                        <small>
                            {{$job->name}}
                        </small>
                    </p>
                    <div class="row">
                        <div class="col-sm text-lg-center">
                            <a href="{{route('homologation.job',['job'=>$job->id])}}" class="btn btn-secondary text-blue-cavaleiros text-uppercase">
                                <small>
                                <i class="fa fa-list" aria-hidden="true"></i> listar
                                </small>
                            </a>
                        </div>
                        @can('permissao_gerente')
                        <div class="col-sm text-lg-center">
                            <a href="{{route('homologation.pdf',['job'=>$job->id])}}" class="btn btn-secondary text-danger text-uppercase">
                                <small>
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> pdf
                                </small>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
@endsection