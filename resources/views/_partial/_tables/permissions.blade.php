 <table class="table table-bordered">

        <thead>

        <th class="text-lg-center">ID</th>
        <th class="text-lg-center">Nome</th>
        <th class="text-lg-center">Descrição</th>
        <th colspan="2" class="text-lg-center">Ações</th>

        </thead>
        <tbody>
        @forelse($permissions->sortBy('name') as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->description}}</td>
                <td class="text-lg-center">
                    <a class="btn btn-outline-blue-cavaleiros btn-sm" href="{{route('authorization.permissions.edit',['permission'=>$permission->id])}}">
                        <i class="fa fa-edit fa-lg" aria-hidden="true"> Editar</i>
                    </a>
                </td>
                <td class="text-lg-center">
                    <a class="btn btn-outline-danger btn-sm" href="{{route('authorization.permissions.destroy',['permission'=>$permission->id])}}">
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
    {!! $permissions->links() !!}