<div class="card card-block">
    <div class="row">
        <p class="col-sm-3 control-label"><b>Data</b></p>
        <div class="col-sm-7">
            {!! Form::text('date',null,['class'=>'form-control','data-mask'=>"00-00-0000",'placeholder'=>"00-00-0000"]) !!}
        </div>
        {{Form::hidden('accounts_id',$account->id)}}
        {{Form::hidden('register_id',$register->id)}}
        {{Form::hidden('type',1)}}
        {{Form::hidden('url',$url)}}
        <div class="col-sm-2">
            {!! Form::submit('Gerar Boleto',['class'=>'btn btn-blue-nav']) !!}
        </div>
    </div>
</div>
<br/>
<br/>