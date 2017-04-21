<div class="form-group row">
    <label for="complement[birthdate]" class="col-md-3 col-form-label">Data de Nascimento</label>


    <div class="col-md-7">

        {{ Form::text('complement[birthdate]', null,['class'=>'form-control','required' => 'required','data-mask'=>"00-00-0000","placeholder" =>"00-00-0000"])  }}

        @if ($errors->has('complement[birthdate]'))
            <span class="help-block">
                <strong>{{ $errors->first('complement[birthdate]') }}</strong>
            </span>
        @endif
        <br/>
    </div>

</div>