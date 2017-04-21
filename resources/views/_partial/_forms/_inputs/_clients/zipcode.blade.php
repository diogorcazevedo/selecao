<div class="form-group{{ $errors->has('complement[zipcode]') ? ' has-error' : '' }} row">
    <label for="complement[zipcode]" class="col-md-3 col-form-label">CEP:</label>

    <div class="col-md-7">
        {{ Form::text('complement[zipcode]', null, ['class' => 'form-control','id'=>"cep", 'onblur'=>"pesquisacep(this.value);",'data-mask'=>"00000000",'placeholder'=>"sem ponto ou traço (ex:22261000)"])  }}
        @if ($errors->has('complement[zipcode]'))
            <span class="help-block">
                 <strong>{{ $errors->first('complement[zipcode]') }}</strong>
            </span>
        @endif
    </div>
</div>