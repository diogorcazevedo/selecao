<div class="modal fade" id="authorization" tabindex="-1" role="dialog" aria-labelledby="authorization" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONTROLE DE ACESSO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group">
                    <a class="btn btn-outline-blue-cavaleiros my-2 my-sm-0 btn-sm" href="#" id="authorization" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <small>PERFIL (USUÁRIOS)</small>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="authorization" style="border: none; padding: 20%;">
                        <br/>

                        <p>
                            <a class="btn btn-blue-cavaleiros btn-sm" href="{{ route('authentication.profiles.getUserByProfile',['profile'=>'client']) }}">
                                Buscar CANDIDATOS
                            </a>
                        </p>
                        <p>
                            <a class="btn btn-blue-cavaleiros btn-sm" href="{{ route('authentication.profiles.getUserByProfile',['profile'=>'admin']) }}">
                                Buscar ADMINISTRADORES
                            </a>
                        </p>
                        <p>
                            <a class="btn btn-blue-cavaleiros btn-sm" href="{{ route('users.index') }}">
                                Buscar TODOS
                            </a>
                        </p>

                    </div>
                </div>



                <div class="btn-group">
                    <a class="btn btn-outline-blue-cavaleiros my-2 my-sm-0 btn-sm" href="#" id="auth" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <small>ADMINISTRADORES</small>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="auth" style="border: none; padding: 20%;">
                        <br/>
                        <p>
                            <a class="btn btn-blue-cavaleiros btn-sm" href="{{ route('authorization.role.user.index') }}">
                                Associar ADMINISTRADORES com CARGOS
                            </a>
                        </p>
                        <p>
                            <a class="btn btn-blue-cavaleiros btn-sm" href="{{ route('authorization.role.user.index') }}">
                                Listar ADMINISTRADORES por CARGOS
                            </a>
                        </p>
                    </div>
                </div>


                <div class="btn-group">
                    <a class="btn btn-outline-blue-cavaleiros my-2 my-sm-0 btn-sm" href="#" id="auth" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <small>CARGOS</small>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="auth" style="border: none; padding: 20%;">
                        <br/>
                        <p>
                            <a class="btn btn-blue-cavaleiros btn-sm" href="{{ route('authorization.roles.index') }}">
                                Criar e Editar CARGOS
                            </a>
                        </p>
                        <p>
                            <a class="btn btn-blue-cavaleiros btn-sm" href="{{ route('authorization.permissions.index') }}">
                                Criar e Editar ATRIBUIÇÕES para CARGOS
                            </a>
                        </p>
                        <p>
                            <a class="btn btn-blue-cavaleiros btn-sm" href="{{ route('authorization.permission.role.index') }}">
                                Associar CARGOS com ATRIBUIÇÕES
                            </a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>