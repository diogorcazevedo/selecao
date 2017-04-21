<div class="form-group{{ $errors->has('complement[nationality]') ? ' has-error' : '' }} row">
    <br/>
    <label for="complement[nationality]" class="col-md-3 col-form-label">Nacionalidade:</label>
    <label class="radio-inline offset-lg-1">{{ Form::radio('complement[nationality]', 'Brasileiro') }} Brasileiro</label>
    <label class="radio-inline offset-lg-1">{{ Form::radio('complement[nationality]', 'Português') }} Português</label>
    @if ($errors->has('complement[nationality]'))
        <span class="help-block">
               <strong>{{ $errors->first('complement[nationality]') }}</strong>
        </span>
    @endif
    <br/>
    <br/>
</div>