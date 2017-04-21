@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">CADASTRAR CARGO</div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('applications.schools.store') }}">
                        {{ csrf_field() }}
                        @include('project::applications.schools._form')

                        <div class="form-group">
                            <div class="offset-md-9">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
