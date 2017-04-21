<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
    <label for="email" class="col-md-3 control-label">E-Mail</label>

    <div class="col-md-7">
        {{ Form::text('email', null, array('class' => 'form-control','required' => 'required'))  }}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>