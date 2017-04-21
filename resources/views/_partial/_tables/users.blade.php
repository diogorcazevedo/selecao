@if($table=='edit')
    <table class="table table-bordered table-striped">

        <thead>

        <th class="text-lg-center"><small>Nome</small></th>
        <th class="text-lg-center"><small>Email</small></th>
        <th class="text-lg-center"><small>CPF</small></th>
        <th colspan="3" class="text-lg-center"><small>Ações</small></th>
        </thead>
        <tbody>
        @forelse($users->sortBy('name') as $user)
            <tr>

                <td><small>{{$user->name}}</small></td>
                <td><small>{{$user->email}}</small></td>
                <td><small>{{$user->cpf}}</small></td>
                <td class="text-lg-center">
                    <a class="btn btn-outline-blue-cavaleiros btn-sm" href="{{route('users.edit',['user'=>$user->id])}}">
                        <small> Editar</small>
                    </a>
                </td>
                <td class="text-lg-center">
                    <a class="btn btn-outline-blue-cavaleiros btn-sm" href="{{route('users.password',['user'=>$user->id])}}">
                        <small>Senha</small>
                    </a>
                </td>
                @if(count($user->registers) >0)
                    <td class="text-lg-center">
                        @foreach($user->registers as $row)
                            <li class="list-group-item list-group-item-info btn-sm" data-toggle="modal" data-target="#concursos{{$row->id}}"><small>{{$row->job->name}}<br/> <span class="btn btn-sm btn-warning"><small>{{ $row->active == 1 ? 'confirmada' : 'não confirmada' }}</small></span></small></li>
                            @include("contacts.admin.modal.concursos",['url'=>URL::current()])
                            <br/>
                            <br/>
                        @endforeach
                    </td>
                    @else
                    <td class="text-lg-center">
                    <p><small>Sem inscrição para este candidato</small></p>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="5">não existe usuário cadastrado com este perfil</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {!! $users->appends(['search' => $search])->links() !!}
@endif
@if($table=='profile')

    <table class="table table-bordered">

        <thead>


        <th class="text-lg-center">Nome</th>
        <th class="text-lg-center">Email</th>
        <th class="text-lg-center">CPF</th>
        <th class="text-lg-center">Alterar para:</th>

        </thead>
        <tbody>
        @forelse($users->sortBy('name') as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->cpf}}</td>

                <td class="text-lg-center">
                    @if($user->profile == 'client')
                        <a class="btn btn-outline-blue-cavaleiros btn-sm" href="{{route('authentication.profiles.changeProfile',['user'=>$user->id,'profile'=>'admin'])}}">
                            <i class="fa fa-lightbulb-o fa-lg" aria-hidden="true"> Admin</i>
                        </a>
                    @else
                        <a class="btn btn-outline-blue-cavaleiros btn-sm" href="{{route('authentication.profiles.changeProfile',['user'=>$user->id,'profile'=>'client'])}}">
                            <i class="fa fa-plane fa-lg" aria-hidden="true"> Client</i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">não existe usuário cadastrado com este perfil</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {!! $users->links() !!}
@endif
@if($table=='roles')
    <table class="table table-bordered">

        <thead>

        <th class="text-lg-center">Nome</th>
        <th class="text-lg-center">Email</th>
        <th class="text-lg-center">CPF</th>
        <th class="text-lg-center">Alterar para:</th>

        </thead>
        <tbody>
        @forelse($users->sortBy('name') as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->cpf}}</td>
                <td class="text-lg-center">
                    <a class="btn btn-outline-blue-cavaleiros btn-sm" href="{{route('authorization.role.user.edit',['user'=>$user->id])}}">
                        <i class="fa fa-id-card fa-lg" aria-hidden="true"> adicionar cargo</i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">não existe usuário cadastrado com este perfil</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {!! $users->appends(['search' => $search])->links() !!}
@endif