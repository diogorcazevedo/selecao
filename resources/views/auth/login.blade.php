@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-24">
                <br/>
                <br/>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        @include('_partial._forms._inputs.email')
                        @include('_partial._forms._inputs.password')
                        @include('_partial._forms._inputs.checked_remember')

                        <div class="form-group">
                            <hr/>
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Login
                                </button>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <div class="col-md-7 offset-md-3">
                                <a class="btn btn-sm btn-outline-secondary pull-right" href="{{ route('password.request') }}">
                                    Esqueceu a senha ?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
