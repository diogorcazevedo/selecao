@extends('_layouts.app')

@section('content')
    <div class="container">
        @include('project::homologation.search')
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-block">
                        <table class="table table-bordered table-striped">

                            <thead>
                            <th class="text-lg-center"><small>INSCRIÇÃO</small></th>
                            <th class="text-lg-center"><small>NOME</small></th>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td><small>{{$user->id}}</small></td>
                                    <td><small>{{$user->user}}</small></td>
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