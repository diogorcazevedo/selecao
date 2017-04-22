<div class="col-sm text-lg-left">
    <p>
        Andar: {{ $floor->name}}
    </p>
</div>
<div class="col-sm text-lg-right">
    <p>
        salas: {{count($floor->floorclasses)}}
    </p>
</div>
<div class="col-sm-2 text-lg-right">
    <p>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#floor{{$floor->id}}">
            Editar
        </button>

    </p>
</div>
<div class="col-sm-2 text-lg-right">
    <p>
        <a href="{{route('applications.schools.destroyfloor',['id'=>$floor->id])}}" class="btn btn-danger btn-sm pull-right">
            deletar
        </a>
    </p>
</div>


<div class="modal fade" id="floor{{$floor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                {{ Form::model($floor,['route'=>['applications.schools.floors'],'id'=>$floor->id]) }}

                <div class="row bg-faded">
                    <label for="block" class="col-md-3 col-form-label">
                        <b>ANDAR:</b>
                    </label>
                    <div class="col-md text-lg-center">
                        {{ Form::textarea('name', null, array('id' => 'froala','class' => 'form-control','required' => 'required','autofocus'))  }}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::hidden('id',$floor->id)}}
                {{ Form::close()}}

                <hr/>


                @foreach($floor->floorclasses as $class)

                    {{ Form::model($class,['route'=>['applications.schools.classrooms'],'id'=>$class->id]) }}

                    <div class="row bg-faded">
                        <label for="block" class="col-md-3 col-form-label">
                            <b>Sala:</b>
                        </label>
                        <div class="col-md text-lg-center">
                            {{ Form::textarea('name', null, array('id' => 'froala','class' => 'form-control','required' => 'required','autofocus'))  }}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md text-lg-center">
                            {{ Form::textarea('chairs', null, array('id' => 'froala','class' => 'form-control','required' => 'required'))  }}
                            @if ($errors->has('chairs'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('chairs') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Salvar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 text-lg-right">
                            <p>
                                <a href="{{route('applications.schools.destroyclassroom',['id'=>$class->id])}}" class="btn btn-danger btn-sm pull-right">
                                    deletar
                                </a>
                            </p>
                        </div>
                    </div>
                    {{ Form::hidden('id',$class->id)}}
                    {{ Form::close()}}

                @endforeach

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
