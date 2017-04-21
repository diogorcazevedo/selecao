<div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }} row">
    <br/>
    <label for="cpf" class="col-md-3 col-form-label">CPF:</label>

    <div class="col-md-7">
        {{ Form::text('cpf',null,['id'=>'control','class'=>'form-control','required' => 'required','data-mask'=>"000.000.000-00"]) }}
        @if ($errors->has('cpf'))
            <span class="help-block">
              <strong>{{ $errors->first('cpf') }}</strong>
            </span>
        @endif
    </div>
</div>