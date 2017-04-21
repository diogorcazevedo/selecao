<div class="modal fade" id="concursos{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">

                @include('errors._check')


                <div class="container">

                    {{ Form::model($row,['route'=>['project.registers.update',$row->id]]) }}

                    @include('_partial._forms._inputs.registers.needs')
                    <br/>
                    @include('_partial._forms._inputs.registers.quotas',['job'=>$row->job])
                    <br/>
                    @include('_partial._forms._inputs.registers.handicapped',['job'=>$row->job])
                    <br/>
                    @include('_partial._forms._inputs.registers.local',['cities'=> arraylocais()])
                    <br/>

                    {{ Form::hidden('job_id',$row->job->id)}}
                    {{ Form::hidden('url',$url)}}
                    {{ Form::hidden('user_id',$user->id)}}

                    <div class="form-group pull-lg-right ">
                        <br/>
                        {{ Form::submit('Salvar',['class'=>'btn btn-blue-cavaleiros pull-right']) }}
                        <br/>
                        <br/>
                    </div>

                    {{ Form::close()}}
                </div>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-outline-secondary btn-sm btn-style" data-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>