<div class="form-group{{ $errors->has('complement[children]') ? ' has-error' : '' }} row">
    <div class="col-md-3">
        {{ Form::label('Filhos','Filhos:') }}
    </div>
    <div class="col-md-7">
        {{ Form::select('complement[children]', arrayfilhos(), null, array('class' => 'form-control')) }}
    </div>
</div>