@if($table=='permission')

    <table class="table table-bordered">

        <thead>

        <th class="text-lg-center">ID</th>
        <th class="text-lg-center">Nome</th>
        <th class="text-lg-center">Descrição</th>
        <th colspan="2" class="text-lg-center">Ações</th>

        </thead>
        <tbody>
        @forelse($roles->sortBy('name') as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->description}}</td>
                <td class="text-lg-center">
                    <a class="btn btn-outline-blue-cavaleiros btn-sm" href="{{route('authorization.permission.role.edit',['role'=>$role->id])}}">
                        <i class="fa fa-edit fa-lg" aria-hidden="true"> Permissões</i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">não existe registro</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {!! $roles->links() !!}

@else
    <table class="table table-bordered">

        <thead>

        <th class="text-lg-center">ID</th>
        <th class="text-lg-center">Nome</th>
        <th class="text-lg-center">Descrição</th>
        <th colspan="2" class="text-lg-center">Ações</th>

        </thead>
        <tbody>
        @forelse($roles->sortBy('name') as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->description}}</td>
                <td class="text-lg-center">
                    <a class="btn btn-outline-blue-cavaleiros btn-sm" href="{{route('authorization.roles.edit',['role'=>$role->id])}}">
                        <i class="fa fa-edit fa-lg" aria-hidden="true"> Editar</i>
                    </a>
                </td>
                <td class="text-lg-center">
                    <a class="btn btn-outline-danger btn-sm" href="{{route('authorization.roles.destroy',['role'=>$role->id])}}">
                        <i class="fa fa-times-circle fa-lg" aria-hidden="true"> Excluir</i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">não existe registro</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {!! $roles->links() !!}

@endif