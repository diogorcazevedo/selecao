@extends('_layouts.app')

@section('content')
    <?php $name = $role->name ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header text-lg-center">
                        <div class="row">
                            <div class="col-md-6">
                                <button style="border: none;" class="btn btn-secondary" type="button">
                                    Gerenciar Cargos
                                </button>
                            </div>
                            <div class="col-md-6">
                                Cargo: <span class="text-warning">{{$role->name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-lg-12">
                                @include('_partial._forms.permission_role')
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <br/>
                                <br/>
                                <div class="row">
                                    @include('_partial._tables.permission_role')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection