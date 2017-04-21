<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} row">
    <label for="description" class="col-md-3 col-form-label">Descrição</label>

    <div class="col-md-7">
        {{ Form::textarea('description', null, array('class' => 'form-control','required' => 'required','rows' => '3'))  }}
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>