@extends('_layouts.app')

@section('content')
    <?php $name = primeiroNome($user->name) ?>
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
                                Usuário: <span class="text-warning">{{$user->name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-lg-12">
                                @include('_partial._forms.role_user')
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <br/>
                                <br/>
                                <div class="row">
                                    @include('_partial._tables.role_user')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection