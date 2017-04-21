<br/>
{!! Form::open(['route'=>['authorization.role.user.store',$user->id]]) !!}

<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::select('role_id',$roles,null,['class'=>'form-control text-uppercase','placeholder' => 'Selecionar Cargo'])!!}
    </div>
    <div class="form-group col-lg-4">
        {!! Form::submit('Enviar',['class'=>'btn btn-default']) !!}
    </div>
</div>
{!! Form::close()!!}