<table class="table table-bordered">
    <thead>
    <th>Nome</th>
    <th>Descrição</th>
    <th><i class="fa fa-times-circle" aria-hidden="true"></i></th>

    </thead>
    <tbody>
    @foreach($user->roles as $role)
        <tr>
            <td>{{$role->name}}</td>
            <td>{{$role->description}}</td>
            <td>
                <a href="{{route('authorization.role.user.revoke',['user'=>$user->id, 'role'=>$role->id])}}" class="btn btn-sm  btn-style btn-danger">
                    Revogar
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>