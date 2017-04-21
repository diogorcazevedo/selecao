@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-block">
                    {{ Form::model($role,['route'=>['authorization.roles.store'], 'role'=>"form"]) }}

                        @include('_partial._forms.roles',['form' => 'edit'])

                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
