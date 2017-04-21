@extends('_layouts.app')

@section('content')

    <div class="container">
        <div class="card card-block">
            <div class="alert alert-info">
                <p class="text-lg-center"><b>{{$project->sponsor->name}}</b> <small>Última Atualização: {{date('d/m/Y')}}</small></p>
            </div>
            <br/>
            <br/>
            @can('permissao_gerente')
            <div class="container">
                <div class="row">
                    <div class="offset-md-3 col-md-6">
                            {{ Form::open(['route'=>['settings.release.publish'],'method'=>'post','enctype'=>'multipart/form-data']) }}
                        <div class="form-group">
                            {{ Form::select('file_documents_id',$files,null,['class'=>'form-control text-uppercase','placeholder' => 'Selecionar Cargo'])}}
                        </div>
                        <br/>
                        <label for="publish" class="col-md-3 col-form-label">Publicar:</label>
                        <label class="radio-inline offset-lg-1">{{ Form::radio('publish', '0') }} não</label>
                        <label class="radio-inline offset-lg-1">{{ Form::radio('publish', '1') }} sim</label>
                        <br/>
                        <br/>
                        <div class="form-group">
                            {{ Form::file('image',null,['class'=>'form-control']) }}
                            {{ Form::hidden('project_id',$project->id)}}
                            {{ Form::submit('Salvar',['class'=>'btn btn-blue-cavaleiros pull-lg-right'])}}
                            {{ Form::close()}}
                        </div>
                    </div>
                </div>
            <br/>
            <br/>
        </div>
        @endcan
    </div>

@endsection