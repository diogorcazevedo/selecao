@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Editar Dados</div>
                <div class="card-block">
                    {{ Form::model($user,['route'=>['users.update'], 'role'=>"form"]) }}

                        @include('_partial._forms.users',['form' => 'edit'])

                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
