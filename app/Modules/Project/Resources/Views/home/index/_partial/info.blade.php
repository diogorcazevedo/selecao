<div class="modal fade" id="modalInfo{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title" id="myModalLabel">Informações para o cargo:</p>
                <p class="modal-title"><b>{{$job->name}}</b></p>
            </div>
            <div class="modal-body">
                <section class="margin-top-percent-4">
                    <table>
                        <tbody>
                            <tr>
                                <td>Horário de Atendimento por telefone e presencial</td>
                                <td><b>14:00 às 17:00</b></td>
                            </tr>
                            <tr>
                                <td>Telefone de Atendimento</td>
                                <td><b>{{$job->project->telefone}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                </section>
                <div class="modal-footer">
                    <p class="pull-lg-right"> <i class="fa fa-barcode fa-3x" aria-hidden="true"></i></p>
                </div>
            </div>
        </div>
    </div>
</div>