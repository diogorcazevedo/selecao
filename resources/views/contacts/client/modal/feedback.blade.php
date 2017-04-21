<div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Resposta</h4>
            </div>
            <div class="modal-body">

                @include('errors._check')

                {!! Form::open(['route'=>['clients.send.notes.store',$order->id],'enctype'=>'multipart/form-data']) !!}

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('Descrição','Descrição:') !!}
                    {!! Form::textarea('description',null,['class'=>'form-control','value'=> old('description')]) !!}
                    @if ($errors->has('description'))
                        <span class="help-block">
                             <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::file('image',null,['class'=>'form-control']) !!}
                </div>
                {!! Form::hidden('order_id',$order->id) !!}
                {!! Form::hidden('status',0) !!}
                {!! Form::hidden('agent',$order->user->name) !!}

            </div>
            <div class="modal-footer">
                {!! Form::submit('Enviar',['class'=>'btn btn-blue-logo pull-left']) !!}

                {!! Form::close()!!}
                <button type="button" class="btn btn-outline-secondary btn-style" data-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>