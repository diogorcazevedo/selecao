{{ Form::model($block,['route'=>['applications.schools.blocks'] ,'id'=>$block->id]) }}
<div class="row bg-faded">
    <label for="block" class="col-md-2 col-form-label">
        <br/>
        <b>Espaço: {{$block->description}}</b>
    </label>
    <div class="col-md">
        <br/>
        {{ Form::textarea('name', null, array('id' => 'froala','class' => 'form-control','required' => 'required','autofocus'))  }}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-2">
        <br/>
        <div class="form-group">
            <div class="pull-right">
                <button type="submit" class="btn btn-sm btn-primary">
                    Salvar
                </button>
            </div>
        </div>
    </div>
    <div class="col-sm-2 text-lg-right">
        <br/>

        <div class="dropdown">
            <a href="#" class="btn btn-warning btn-sm" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                novo andar
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @for($i = 1; $i <= 100; $i++)
                <p>
                    <a href="{{route('applications.schools.addfloor',['id'=>$block->id,'classes'=>$i])}}" class="dropdown-item">
                        {{$i}} salas
                    </a>
                </p>

            @endfor
            </div>

        </div>
    </div>
    <div class="col-sm-2 text-lg-right">
        <br/>
        <p>
            <a href="{{route('applications.schools.destroyblock',['id'=>$block->id])}}" class="btn btn-danger btn-sm pull-right">
                deletar
            </a>
        </p>
    </div>
</div>
{{ Form::hidden('id',$block->id)}}
{{ Form::close()}}