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


<div class="modal fade" id="block" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::model($school,['route'=>['applications.schools.make']]) }}


                <div class="form-group{{ $errors->has('block') ? ' has-error' : '' }} row">
                    <label for="block" class="col-md-4 col-form-label">Nome do Bloco</label>
                    <div class="col-md">
                        {{ Form::text('block', null, array('class' => 'form-control','required' => 'required','autofocus'))  }}
                        @if ($errors->has('block'))
                            <span class="help-block">
                                <strong>{{ $errors->first('block') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('floors') ? ' has-error' : '' }} row">
                    <div class="col-md-4 ">
                        {{ Form::label('andares:','andares:') }}
                    </div>
                    <div class="col-md">
                        {{ Form::select('floors', arrayfloors(), null, array('class' => 'form-control')) }}
                    </div>
                </div>


                <div class="form-group{{ $errors->has('classrooms') ? ' has-error' : '' }} row">
                    <div class="col-md-4 ">
                        {{ Form::label('Média de  Salas por andar:','Média de Salas por andar:') }}
                    </div>
                    <div class="col-md">
                        {{ Form::select('classrooms', arrayzerocem(), null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('chairs') ? ' has-error' : '' }} row">
                    <div class="col-md-4 ">
                        {{ Form::label('Média de Cadeiras por sala:','Média de Cadeiras por sala:') }}
                    </div>
                    <div class="col-md">
                        {{ Form::select('chairs', arrayzerocem(), null, array('class' => 'form-control')) }}
                    </div>
                </div>

                {{Form::hidden('school_id',$school->id)}}
                <div class="form-group">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">
                            Salvar
                        </button>
                    </div>
                </div>
                {{ Form::close()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
