<div class="form-group{{ $errors->has('dispatcher') ? ' has-error' : '' }} row">
    <label for="dispatcher" class="col-md-3 col-form-label">Expedidor</label>

    <div class="col-md-7">
        {{ Form::text('dispatcher', null, array('class' => 'form-control','required' => 'required','id'=>"dispatcher"))  }}
        @if ($errors->has('dispatcher'))
            <span class="help-block">
                <strong>{{ $errors->first('dispatcher') }}</strong>
            </span>
        @endif
    </div>
</div>