<div class="form-group{{ $errors->has('complement[city]') ? ' has-error' : '' }} row">
    <label for="complement[city]" class="col-md-3 col-form-label">Cidade:</label>

    <div class="col-md-7">
        {{ Form::text('complement[city]', null, ['class' => 'form-control','id'=>"cidade"])  }}
        @if ($errors->has('complement[city]'))
            <span class="help-block">
                 <strong>{{ $errors->first('complement[city]') }}</strong>
            </span>
        @endif
    </div>
</div>
