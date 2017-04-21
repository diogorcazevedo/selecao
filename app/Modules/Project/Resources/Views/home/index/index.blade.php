@extends('_layouts.index')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="text-lg-center  text-blue-instituto">
                            <p class=" text-lg-left  text-uppercase">
                                <small><b>{{$project->sponsor->name}}</b></small>
                                <br/>
                                <small>{{$project->description}}</small>
                            </p>

                            @if(Auth::check())

                                @include('project::home.index.auth')

                            @else

                                @include('project::home.index.guest')

                            @endif

                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-3">
                        {{--   <p class="pull-lg-right"><small><b>PUBLICAÇÕES</b></small></p>    <br/>
                              <br/> --}}
                        @foreach($project->documents->where('publish',1) as $doc)
                            <div class="row">
                                <div class="card card-block">
                                    <p class="text-lg-right bg-faded"><small>{{$doc->name}}</small></p>
                                    <p>
                                        <a class="text-blue-cavaleiros pull-lg-right btn btn-sm btn-outline-secondary" href="{{asset('uploads/documents/project/'.$project->id.'/'.$doc->id.'.'.$doc->extension)}}" download><i class="fa fa-download text-danger" aria-hidden="true"></i> download</a>
                                        <a class="text-blue-cavaleiros pull-lg-right btn btn-sm btn-outline-secondary" href="{{asset('uploads/documents/project/'.$project->id.'/'.$doc->id.'.'.$doc->extension)}}" target="_blank"><i class="fa fa-folder-open" aria-hidden="true"></i> abrir</a>
                                    </p>
                                </div>
                            </div>
                            <br/>
                        @endforeach
                        <p class="text-lg-center"><a class="btn btn-blue-cavaleiros btn-sm" href="{{route('homologation.index',['project'=>$project->id])}}">Resultado Preliminar <br/> de Inscritos <br/> - <br/> <span class="text-warning">RECURSOS</span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection