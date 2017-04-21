@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Editar Dados</div>
                <div class="card-block">
                    {{ Form::model($program,['route'=>['programs.update',$program->id], 'role'=>"form"]) }}

                        @include('_partial._forms._inputs.name')
                        @include('_partial._forms._inputs.description')
                        @include('_partial._forms._inputs.url')
                        <input type="hidden" name="id" value="{{$program->id}}">

                    <div class="form-group">
                        <hr/>
                        <div class="col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-sm btn-primary pull-right">
                                Salvar
                            </button>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                    </div>

                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
