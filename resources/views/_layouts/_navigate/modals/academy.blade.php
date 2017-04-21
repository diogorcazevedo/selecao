<div class="modal fade" id="academy" tabindex="-1" role="dialog" aria-labelledby="academy" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MODAL ACADÊMICO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @can('permissao_gerente')
                    <p>
                        <a class="btn btn-blue-cavaleiros btn-sm dropdown-item" href="{{route('programs.index')}}">
                            Conteúdo programático
                        </a>
                    </p>
                    <p>
                        <a class="btn btn-blue-cavaleiros btn-sm dropdown-item" href="{{ route('items.index') }}">
                            Gerenciar Questões
                        </a>
                    </p>
                    <p>
                        <a class="btn btn-blue-cavaleiros btn-sm dropdown-item" href="{{ route('exams.index') }}">
                            Gerenciar Provas
                        </a>
                    </p>
                @endcan
            </div>
        </div>
    </div>
</div>