
<br/>

{{Form::model($question,['route'=>['questions.update',$question->id],'method'=>'post','enctype'=>'multipart/form-data']) }}

{{Form::hidden('program_id',$item->program->id)}}
{{Form::hidden('url',URL::current())}}
{{Form::hidden('user_id',$item->user->id)}}
{{Form::hidden('id',$question->id)}}


<div class="bg-faded">
    <br/>
        <div class="row">
            <p class="col-sm-3 text-lg-center"><b>Justificativa: </b></p>
            <div class="col-sm-7">
                <div class="form-group">
                    {!! Form::textarea('justify',null,['class'=>'form-control','id'=>'froala']) !!}
                </div>
            </div>
            <div class="col-sm-1">
                {!! Form::submit('Salvar',['class'=>'btn btn-sm btn-blue-cavaleiros pull-right']) !!}
            </div>
        </div>
    <br/>
</div>

{{Form::close()}}


