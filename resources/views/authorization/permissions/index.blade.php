@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header text-lg-center">
                        <div class="row">
                            <div class="col-md-6 text-lg-center">
                                <button style="border: none;" class="btn btn-secondary" type="button">
                                    LISTAR ATRIBUIÇÕES
                                </button>
                            </div>

                            <div class="col-md-6 text-lg-center">
                                <a class="btn btn-blue-cavaleiros" href="{{route('authorization.permissions.create')}}">
                                    CRIAR ATRIBUIÇÕES
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        @include('_partial._tables.permissions')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection