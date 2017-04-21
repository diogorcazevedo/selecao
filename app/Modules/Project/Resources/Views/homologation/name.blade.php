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
                            <th class="text-lg-center"><small>CARGO</small></th>
                            <th class="text-lg-center"><small>INSCRIÇÃO</small></th>
                            <th class="text-lg-center"><small>NOME</small></th>
                            <th class="text-lg-center"><small>SITUAÇÃO</small></th>
                            <th class="text-lg-center"><small>AÇÃO</small></th>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                @foreach($user->registers as $register)
                                    <tr>
                                        <td><small><small>{{$register->job->name}}</small></small></td>
                                        <td><small>{{$register->id}}</small></td>
                                        <td><small>{{$register->user->name}}</small></td>
                                        @if($register->active == '1')
                                            <td colspan="2" class="text-white text-lg-center bg-info"><small> INSCRIÇÃO CONFIRMADA</small></td>
                                            @else
                                            <td class="text-warning text-lg-center bg-faded"><small> INSCRIÇÃO NÃO CONFIRMADA</small></td>
                                            <td>
                                                <small>
                                                    <a class="btn btn-warning my-2 my-sm-0 btn-sm" href="{{route('clients.send.index',['user'=>$user->id])}}">
                                                        <small>RECORRER</small>
                                                    </a>
                                                </small>
                                            </td>
                                        @endif


                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="5">não existe usuário cadastrado com este perfil</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {!! $users->appends(['search' => $search])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection