<div class="form-group{{ $errors->has('cel') ? ' has-error' : '' }} row">
    <br/>
    <label for="cel" class="col-md-3 col-form-label">Cell Phone:</label>

    <div class="col-md-7">
        {{ Form::text('cel',null,['class'=>'form-control','required' => 'required']) }}
        @if ($errors->has('cel'))
            <span class="help-block">
              <strong>{{ $errors->first('cel') }}</strong>
            </span>
        @endif
    </div>
</div>