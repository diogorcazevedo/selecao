<div class="container">
    <div class="row">

        <div class="col-lg-8  bottom-top-percent-3">
            <div class="col-lg-2">ATENDIMENTO:</div>
            <div class="col-lg-10">Av. Nossa Senhora da Penha 280 sala 205 - Praia do Canto - Vitória - ES</div>
            <div class="col-lg-2">CNPJ:</div>
            <div class="col-lg-10">24.774.586/0001-00</div>
        </div>
        <div class="col-lg-2  bottom-top-percent-3">
            <a href="#" class="btn btn-sm btn-secondary text-blue-instituto" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-phone fa-fw"></i>
                CONTATO
            </a>
        </div>
        {{--
        <div class="col-lg-2  bottom-top-percent-3">
            <div class="btn-group dropup">
                <a href="#" class="btn btn-secondary text-blue-instituto btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-plus" aria-hidden="true"></i> ÁREA DOS COLABORADORES
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item">
                        <a class="nav-link text-blue-instituto text-lg-center" href="#">Cadastrar</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="dropdown-item">
                        <a class="nav-link text-blue-instituto text-lg-center" href="{{ url('/login') }}">Login</a>
                    </li>
                </div>
            </div>
        </div>
--}}
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title" id="myModalLabel">CONTATOS</p>
            </div>
            <div class="modal-body">
                <div class="container">

                    @foreach($projects->where('status','>',0) as $project)
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td colspan="2" class="bg-faded">{{$project->sponsor->alias}}</td>
                            </tr>
                            <tr>
                                <td>Horário de Atendimento por telefone e presencial</td>
                                <td>14:00 às 17:00</td>
                            </tr>
                            <tr>
                                <td>Telefone de Atendimento</td>
                                <td>{{$project->telefone}}</td>
                            </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">fechar</button>
            </div>
        </div>
    </div>
</div>