@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">ATRIBUIÇÕES</div>
                <div class="card-block">
                    {{ Form::model($permission,['route'=>['authorization.permissions.store'], 'role'=>"form"]) }}

                        @include('_partial._forms.permissions',['form' => 'edit'])

                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
