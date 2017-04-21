@extends('_layouts.app')

@section('content')

    <div class="container">
        <p class="card card-block card-8 text-white" style="background-color: transparent">LISTAS PARA APLICAÇÃO DE PROVA POR CARGO</p>
        <div class="row">
            @foreach($project->jobs as $job)
                <div class="col-sm-6" style="margin-bottom: 3%;">
                    <div class="card card-block card-8"  style="background-color: transparent">
                        <p class="text-lg-center card card-block card-8 text-white" style="background-color: transparent">
                            <small>
                                {{$job->name}}
                            </small>
                        </p>
                        <div class="card card-8 card-block text-white" style="background-color: transparent">
                            <div class="row " style="border: solid 1px; padding: 2%;">
                                <div class="col-sm text-lg-center">
                                    <p class="text-lg-center"><small>LISTA GERAL</small></p>
                                </div>
                                <div class="col-sm text-lg-center">
                                    <a href="{{route('applications.reports.job',['job'=>$job->id])}}" class="btn btn-secondary text-blue-cavaleiros text-uppercase">
                                            <i class="fa fa-list fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="col-sm text-lg-center">
                                    <a href="{{route('applications.reports.pdf',['job'=>$job->id])}}" class="btn btn-secondary text-danger text-uppercase">
                                            <i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="col-sm text-lg-center">
                                    <a href="{{route('applications.reports.pdf',['job'=>$job->id])}}" class="btn btn-secondary text-success text-uppercase">
                                            <i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div class="row" style="border: solid 1px; padding: 2%;">
                                <div class="col-sm text-lg-center">
                                    <p class="text-lg-center"><small>NECESSIDADES</small></p>
                                </div>
                                <div class="col-sm text-lg-center">
                                    <a href="{{route('applications.reports.needs.job',['job'=>$job->id])}}" class="btn btn-secondary text-blue-cavaleiros text-uppercase">
                                        <i class="fa fa-list fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="col-sm text-lg-center">
                                    <a href="{{route('applications.reports.needs.pdf',['job'=>$job->id])}}" class="btn btn-secondary text-danger text-uppercase">
                                        <i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="col-sm text-lg-center">
                                    <a href="{{route('applications.reports.needs.pdf',['job'=>$job->id])}}" class="btn btn-secondary text-success text-uppercase">
                                        <i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <p class="text-lg-center card card-block card-8 text-white" style="background-color: transparent">
                           <a href="#" class="btn btn-secondary">listas por local</a>
                        </p>
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