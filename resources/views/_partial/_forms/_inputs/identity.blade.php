<div class="form-group{{ $errors->has('identity') ? ' has-error' : '' }} row">
    <label for="identity" class="col-md-3 col-form-label">Identidade</label>

    <div class="col-md-7">
        {{ Form::text('identity', null, array('class' => 'form-control','required' => 'required','id'=>"identity"))  }}
        @if ($errors->has('identity'))
            <span class="help-block">
                <strong>{{ $errors->first('identity') }}</strong>
            </span>
        @endif
    </div>
</div>