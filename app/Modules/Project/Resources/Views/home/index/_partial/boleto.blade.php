<div class="modal fade" id="modalBoleto{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title" id="myModalLabel">Segunda via de boleto para o cargo:</p>
                <p class="modal-title"><b>{{$job->name}}</b></p>
            </div>
            <div class="modal-body">
                <section class="margin-top-percent-4">
                    {!!  Form::open(['route'=>['admin.clients.cpf','client',$job->id]]) !!}
                    <div class="form-inline">
                        {!! Form::text('cpf',null,['class'=>'form-control', 'placeholder'=>'cpf','required' => 'required','data-mask'=>"000.000.000-00"]) !!}
                        {!! Form::Hidden('job_id',$job->id) !!}}}
                        {!! Form::submit('Enviar',['class'=>'btn btn-table']) !!}
                    </div>
                    {!! Form::close()!!}
                    <br/>
                </section>
                <div class="modal-footer">
                    <p class="pull-lg-right"> <i class="fa fa-barcode fa-3x" aria-hidden="true"></i></p>
                </div>
            </div>
        </div>
    </div>
</div>