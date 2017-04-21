@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header text-lg-center">
                        <div class="row">
                            <div class="col-md-4">
                                <button style="border: none;" class="btn btn-secondary" type="button">
                                    <small>USUÁRIOS POR PERFIL</small>
                                </button>
                            </div>
                            <div class="col-md-4">
                                @if(count($users) >0)
                                    <h3 class="text-warning text-uppercase">
                                        @if($users->first()->profile == 'client')
                                            Visitante
                                        @elseif($users->first()->profile == 'admin')
                                            Administrador
                                        @elseif($users->first()->profile == 'sponsor')
                                            Contratante
                                        @endif
                                    </h3>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="dropdown">
                                    <button class="btn btn-table dropdown-toggle" type="button" id="dropdownMenu1"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <small>MUDAR PERFIL</small>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                        <li class="dropdown-item"><a
                                                    href="{{route('authentication.profiles.getUserByProfile',['profile'=>'client'])}}">Visitante</a>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li class="dropdown-item"><a
                                                    href="{{route('authentication.profiles.getUserByProfile',['profile'=>'admin'])}}">Admin</a>
                                        </li>
                                        <li class="dropdown-item"><a
                                                    href="{{route('authentication.profiles.getUserByProfile',['profile'=>'sponsor'])}}">Contratante</a>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        @include('_partial._tables.users',['table' => 'profile'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection