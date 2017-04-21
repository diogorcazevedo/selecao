@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-block">
                    {{ Form::model($school,['route'=>['applications.schools.update']]) }}

                        @include('project::applications.schools._form')
                        {{Form::hidden('id',$school->id)}}
                    <div class="form-group">
                        <div class="offset-md-9">
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
