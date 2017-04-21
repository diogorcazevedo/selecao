<div class="form-group{{ $errors->has('complement[complement]') ? ' has-error' : '' }} row">

    <label for="complement[complement]" class="col-md-3 col-form-label">Complemento:</label>

    <div class="col-md-7">
        {{ Form::text('complement[complement]', null, array('class' => 'form-control'))  }}
        @if ($errors->has('complement[complement]'))
            <span class="help-block">
                 <strong>{{ $errors->first('complement[complement]') }}</strong>
            </span>
        @endif
    </div>
</div>