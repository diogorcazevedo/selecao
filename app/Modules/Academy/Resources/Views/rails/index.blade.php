@extends('_layouts.app')

@section('content')

    <div class="container">
        @include('academy::rails._head')
        <div class="card text-xs-center card-8">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs pull-xs-left">
                    <li class="nav-item tabs-border white">
                        <a class="nav-link active text-blue-instituto" data-toggle="tab" href="#index" role="tab"><small><i class="fa fa-plus-square" aria-hidden="true"></i> Configurações Iniciais do Item</small></a>
                    </li>
                </ul>
            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="index" role="tabpanel">
                    <div class="card-block">
                        {{Form::open(['route'=>['items.store',$program->id],'method'=>'post','enctype'=>'multipart/form-data'])}}

                        {{Form::hidden('program_id',$program->id)}}
                        {{Form::hidden('url','rails.items')}}
                        {{Form::hidden('user_id',$user->id)}}
                        <br/>
                        <br/>
                        <div class="bg-faded">
                            <br/>
                            <div class="row">
                                <p class="offset-md-1 col-sm-3 text-lg-left"><b>Quantidade de Perguntas</b></p>
                                <div class="col-sm-8">
                                    {!! Form::text('qtd',null,['class'=>'col-form-label']) !!}
                                </div>
                            </div>
                            <br/>
                        </div>
                        <br/>
                        <br/>
                        <div class="bg-faded">
                            <br/>
                            <div class="row">
                                <p class="offset-md-1 col-sm-3 text-lg-left"><b>Quantidade de Respostas</b></p>
                                <div class="col-sm-8">
                                    {!! Form::text('choices',null,['class'=>'col-form-label']) !!}
                                </div>
                            </div>
                            <br/>
                        </div>
                        <br/>
                        <br/>
                        <div class="bg-faded">
                            <br/>
                            <div class="row">
                                <div class="offset-md-1 col-sm-3">
                                    <label for="message-text" class="form-control-label"><b>Status do Item:</b></label>
                                </div>
                                <div class="col-sm-8">
                                    <label class="radio-inline alert">{{ Form::radio('status', '0',['checked']) }} Inédito</label>
                                    <label class="radio-inline alert">{{ Form::radio('status', '100') }} LIBERADO PARA PUBLICAÇÃO NO SITE</label>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <br/>
                        <br/>
                        <div class="form-group ">
                            {{ Form::submit('Salvar',['class'=>'btn  btn-blue-cavaleiros pull-right']) }}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
        </div>
    </div>
@endsection