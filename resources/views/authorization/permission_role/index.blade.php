@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header text-lg-center">
                        <div class="row">
                            <div class="col-md-12">
                                <button style="border: none;" class="btn btn-secondary" type="button">
                                    LISTAR CARGOS
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        @include('_partial._tables.roles',['table' => 'permission'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection