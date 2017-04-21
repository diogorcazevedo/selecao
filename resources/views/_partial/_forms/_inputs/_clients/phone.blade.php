<div class="form-group{{ $errors->has('complement[phone]') ? ' has-error' : '' }} row">
    <label for="complement[phone]" class="col-md-3 col-form-label">Tel<small> (residencial)</small>:</label>
    <div class="col-md-7">
        {{ Form::text('complement[phone]', null, array('class' => 'form-control'))  }}
        @if ($errors->has('complement[phone]'))
            <span class="help-block">
                 <strong>{{ $errors->first('complement[phone]') }}</strong>
            </span>
        @endif
    </div>
</div>