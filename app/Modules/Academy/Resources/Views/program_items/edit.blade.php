@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Editar Dados</div>
                <div class="card-block">
                    {{ Form::model($item,['route'=>['programs.items.update',$item->id], 'role'=>"form"]) }}

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} row">

                        <div class="col-md-12">
                            {{ Form::textarea('name', null, array('class' => 'form-control','required' => 'required','rows' => '3'))  }}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                        <input type="hidden" name="program_id" value="{{$item->program_id}}">
                        <input type="hidden" name="id" value="{{$item->id}}">


                        @include('_partial._forms._inputs.url')

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
