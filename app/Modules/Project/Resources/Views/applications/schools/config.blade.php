@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header text-lg-center">
                    <div class="row">
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-sm text-lg-center">
                                    <p><b>{{$school->name}}</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm text-lg-left">
                                    <p>
                                        <b>Responsável:</b> {{$school->responsavel}}
                                    </p>
                                </div>
                                <div class="col-sm text-lg-right">
                                    <p>
                                        {{$school->email}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                                <a class="btn btn-warning btn-sm pull-right" href="{{route('applications.schools.edit',['id'=>$school->id])}}">
                                    <i class="fa fa-edit fa-lg" aria-hidden="true"> editar</i>
                                </a>
                            <br/>
                            <br/>
                            <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#block">
                                Criar Bloco
                            </button>
                        </div>
                    </div>

                    @include('project::applications.schools._modals')

                </div>
                <div class="card-block">

                    @foreach($school->blocks as $block)
                      <p>Bloco: {{ $block->name}} </p>
                        @foreach($block->blockfloors as $floor)
                            <p>Andar: {{ $floor->name}} </p>
                            @foreach($floor->floorclasses as $floor)
                                <p>Sala: {{ $floor->name}} </p>
                            @endforeach
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
