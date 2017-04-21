<div class="modal fade" id="aplicacao" tabindex="-1" role="dialog" aria-labelledby="aplicacao" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MODAL APLICAÇÃO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @can('permissao_gerente')
                    <p>
                        <a class="btn btn-blue-cavaleiros btn-sm dropdown-item" href="{{route('applications.schools.index')}}">
                            Unidades de Ensino
                        </a>
                    </p>
                @endcan
            </div>
        </div>
    </div>
</div>