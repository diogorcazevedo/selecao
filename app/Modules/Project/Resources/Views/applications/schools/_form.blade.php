
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

<div class="form-group{{ $errors->has('responsavel') ? ' has-error' : '' }} row">
    <label for="responsavel" class="col-md-3 col-form-label">Responsável</label>
    <div class="col-md-7">
        {{ Form::text('responsavel', null, array('class' => 'form-control','required' => 'required'))  }}
        @if ($errors->has('responsavel'))
            <span class="help-block">
                <strong>{{ $errors->first('responsavel') }}</strong>
            </span>
        @endif
    </div>
</div>
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
<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} row">
    <label for="phone" class="col-md-3 col-form-label">Tel<small> (fixo)</small>:</label>
    <div class="col-md-7">
        {{ Form::text('phone', null, array('class' => 'form-control'))  }}
        @if ($errors->has('phone'))
            <span class="help-block">
                 <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }} row">
    <label for="zipcode" class="col-md-3 col-form-label">CEP:</label>
    <div class="col-md-7">
        {{ Form::text('zipcode', null, ['class' => 'form-control','id'=>"cep", 'onblur'=>"pesquisacep(this.value);",'data-mask'=>"00000000",'placeholder'=>"sem ponto ou traço (ex:22261000)"])}}
        @if ($errors->has('zipcode'))
            <span class="help-block">
                 <strong>{{ $errors->first('zipcode') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} row">
    <label for="address" class="col-md-3 col-form-label">Endereço:</label>

    <div class="col-md-7">
        {{ Form::text('address', null, array('class' => 'form-control','id'=>'rua'))  }}
        @if ($errors->has('address'))
            <span class="help-block">
                 <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('complement') ? ' has-error' : '' }} row">

    <label for="complement" class="col-md-3 col-form-label">Complemento:</label>

    <div class="col-md-7">
        {{ Form::text('complement', null, array('class' => 'form-control'))  }}
        @if ($errors->has('complement'))
            <span class="help-block">
                 <strong>{{ $errors->first('complement') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('neighborhood') ? ' has-error' : '' }} row">
    <label for="neighborhood" class="col-md-3 col-form-label">Bairro:</label>

    <div class="col-md-7">
        {{ Form::text('neighborhood', null, ['class' => 'form-control', 'id'=>"bairro"])  }}
        @if ($errors->has('neighborhood'))
            <span class="help-block">
                 <strong>{{ $errors->first('neighborhood') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} row">
    <label for="city" class="col-md-3 col-form-label">Cidade:</label>
    <div class="col-md-7">
        {{ Form::text('city', null, ['class' => 'form-control','id'=>"cidade"])  }}
        @if ($errors->has('city'))
            <span class="help-block">
                 <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }} row">
    <div class="col-md-3 ">
        {{ Form::label('Estado:','Estado:') }}
    </div>
    <div class="col-md-7">
        {{ Form::select('state', arrayestados(), null, array('class' => 'form-control','id'=>"uf")) }}
    </div>
</div>
{{Form::hidden('url',$url)}}