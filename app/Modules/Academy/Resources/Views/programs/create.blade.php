@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-24">
                    <div class="card-block">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('programs.store') }}">
                            {{ csrf_field() }}
                            @include('_partial._forms._inputs.name')
                            @include('_partial._forms._inputs.description')
                            @include('_partial._forms._inputs.url')

                            <div class="form-group">
                                <hr/>
                                <div class="col-md-7 offset-md-3">
                                    <button type="submit" class="btn btn-sm btn-primary pull-right">
                                        Salvar
                                    </button>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection