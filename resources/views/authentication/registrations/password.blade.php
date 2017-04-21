@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-block">
                        {{ Form::model($user,['route'=>['users.updatePassword'], 'role'=>"form"]) }}
                        @include('_partial._forms._inputs.password')
                        @include('_partial._forms._inputs.confirm_password')
                        @include('_partial._forms._inputs.url')
                        {{Form::hidden('user_id',$user->id)}}
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
