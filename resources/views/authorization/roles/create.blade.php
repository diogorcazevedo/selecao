@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">CADASTRAR CARGO</div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('authorization.roles.store') }}">
                        {{ csrf_field() }}
                        @include('_partial._forms.roles',['form' => 'create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
