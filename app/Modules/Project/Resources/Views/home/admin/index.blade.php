@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @can('permissao_basic')
                @foreach($projects as $project)
                    <div class="col-lg-6">
                        <div class="card card-block card-8 card-outline-blue-instituto text-blue-instituto">
                            <div class="container">
                                <div>
                                    <p class="text-lg-center"><small><b>{{$project->sponsor->alias}} - Edital: {{$project->number}}</b></small></p>
                                </div>
                                <hr/>
                                <div>
                                    @if(count($project->images)>0)
                                        <p class="text-lg-center">
                                            <img src="{{asset('uploads/images/projects/'.$project->id.'/'.$project->images->first()->id.'.'.$project->images->first()->extension)}}" width="270"/>
                                        </p>
                                    @else
                                        <p class="text-lg-center">
                                            <img src="{{asset('img/logos/callback_default.png')}}" width="70"/>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br/>
                        <br/>
                    </div>
                @endforeach
            @endcan
            <div class="col-lg-12">
                <div class="container">
                    <p class="text-lg-center">
                        <img src="{{asset('img/logos/logo.png')}}" width="200"/>
                    </p>
                </div>
                <br/>
                <br/>
            </div>
        </div>
    </div>
@endsection