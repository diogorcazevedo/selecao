<br/>
{!! Form::open(['route'=>['authorization.permission.role.store',$role->id]]) !!}

<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::select('permission_id',$permissions,null,['class'=>'form-control text-uppercase','placeholder' => 'Selecionar Cargo'])!!}
    </div>
    <div class="form-group col-lg-4">
        {!! Form::submit('Enviar',['class'=>'btn btn-default']) !!}
    </div>
</div>
{!! Form::close()!!}