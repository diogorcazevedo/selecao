@extends('_layouts.app')

@php $count = 1;  @endphp
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-block">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr style="background-color: #0E2231;color: #ffffff;">
                                <th colspan="3" style="text-align: center;"><small>{{$job->name}}</small></th>
                                <th style="text-align: center;">{{$users->total()}}</th>
                            </tr>
                            </thead>
                            <thead>
                            <th class="text-lg-center"><small>QTD</small></th>
                            <th class="text-lg-center"><small>INSCRIÇÃO</small></th>
                            <th class="text-lg-center"><small>NOME</small></th>
                            <th class="text-lg-center"><small>LOCAL DE PROVA</small></th>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td><small>{{$count++}}</small></td>
                                    <td><small>{{$user->id}}</small></td>
                                    <td><small>{{$user->user}}</small></td>
                                    <td class="text-lg-center"><small>{{arraylocais()[$user->local]}}</small></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">não existe usuário cadastrado com este perfil</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection