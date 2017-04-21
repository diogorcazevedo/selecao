<table class="table table-bordered">
    <thead>
    <th>Nome</th>
    <th>Descrição</th>
    <th><i class="fa fa-times-circle" aria-hidden="true"></i></th>

    </thead>
    <tbody>
    @foreach($role->permissions as $permission)
        <tr>
            <td>{{$permission->name}}</td>
            <td>{{$permission->description}}</td>
            <td>
                <a href="{{route('authorization.permission.role.revoke',['role'=>$role->id, 'permission'=>$permission->id])}}" class="btn btn-sm  btn-style btn-danger">
                    Revogar
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>