<div class="modal fade" id="modal{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title"><b>{{$job->name}}</b></p>
            </div>
            <div class="modal-body">
                <br/>
                <div class="container">
                    <div class="form-inline">
                        {{  Form::open(['route'=>['registryOperations.checkCPF','client',$job->id]]) }}
                        <div class="form-control">
                            {{  Form::text('cpf',null,['class'=>'form-control', 'placeholder'=>'cpf','required' => 'required','data-mask'=>"000.000.000-00"]) }}

                       </div>
                       <div class="form-control">
                           {{ Form::submit('Enviar',['class'=>'btn btn-table']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <p class="pull-lg-right"> <i class="fa fa-edit fa-3x" aria-hidden="true"></i></p>
            </div>
        </div>
    </div>
</div>