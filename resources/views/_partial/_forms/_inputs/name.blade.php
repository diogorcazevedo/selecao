<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
    <label for="name" class="col-md-3 col-form-label">Nome</label>

    <div class="col-md-7">
        {{ Form::text('name', null, array('class' => 'form-control','required' => 'required','autofocus'))  }}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>