<div class="form-group row">
    <div class="col-md-3 form-group{{ $errors->has('complement[maritalstatus]') ? ' has-error' : '' }}">
        {{ Form::label('Estado Civil','Estado Civil:') }}
    </div>
    <div class="col-md-7 ">
        {{ Form::select('complement[maritalstatus]', arrayestadocivil(), null, array('class' => 'form-control')) }}
        @if ($errors->has('complement[maritalstatus]'))
            <span class="help-block">
              <strong>{{ $errors->first('complement[maritalstatus]') }}</strong>
        </span>
        @endif
    </div>
</div>