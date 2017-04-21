@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">CADASTRAR ATRIBUIÇÕES</div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('authorization.permissions.store') }}">
                        {{ csrf_field() }}
                        @include('_partial._forms.permissions',['form' => 'create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
