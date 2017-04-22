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

