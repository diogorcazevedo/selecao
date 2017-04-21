<div class="form-group{{ $errors->has('complement[gender]') ? ' has-error' : '' }} row">
    <br/>
    <label for="complement[gender]" class="col-md-3 col-form-label">Gênero:</label>
    <label class="radio-inline offset-lg-1">{{ Form::radio('complement[gender]', 'M') }} Masculino</label>
    <label class="radio-inline offset-lg-1">{{ Form::radio('complement[gender]', 'F') }} Feminino</label>
    @if ($errors->has('complement[gender]'))
        <span class="help-block">
              <strong>{{ $errors->first('complement[gender]') }}</strong>
        </span>
    @endif
    <br/>
    <br/>
</div>