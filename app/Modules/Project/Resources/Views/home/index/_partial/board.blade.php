


<div class="modal fade" id="modalBoard{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title lead bg-faded"><b>{{$job->name}}</b></h4>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-12 text-lg-center">

                                <div class="offset-lg-2 col-lg-8 text-lg-center">
                                    <table class="table table-bordered table-sm card-8" style=" text-align: center;  ">
                                        <thead>
                                        <tr class="bg-faded">
                                            <th class="text-lg-center">Área</th>
                                            <th class="text-lg-center">Quantidade de questões</th>
                                            <th class="text-lg-center">Tipo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($job->programs as $program)
                                            <tr>
                                                <td><br/>{{$program->name}}</td>
                                                <td><br/>{{$program->qtd}}</td>
                                                <td><br/>{{$program->type == 1 ? 'Específica' : 'Conhecimento Geral' }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div style="clear: both;"></div>
                                <br/>
                                <br/>
                        </div>
                    </div>

                <div class="modal-footer">
                    <p class="pull-lg-right"> <i class="fa fa-edit fa-3x" aria-hidden="true"></i></p>
                </div>
            </div>
        </div>
    </div>
</div>