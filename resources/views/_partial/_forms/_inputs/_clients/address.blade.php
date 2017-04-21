<div class="form-group{{ $errors->has('complement[address]') ? ' has-error' : '' }} row">
    <label for="complement[address]" class="col-md-3 col-form-label">Endereço:</label>

    <div class="col-md-7">
        {{ Form::text('complement[address]', null, array('class' => 'form-control','id'=>'rua'))  }}
        @if ($errors->has('complement[address]'))
            <span class="help-block">
                 <strong>{{ $errors->first('complement[address]') }}</strong>
            </span>
        @endif
    </div>
</div>