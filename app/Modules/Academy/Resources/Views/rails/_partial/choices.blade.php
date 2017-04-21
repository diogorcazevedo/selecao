<?php $count = 1?>
@foreach($question->choices as $choice)

    {{Form::model($choice,['route'=>['choices.update',$choice->id],'method'=>'post','enctype'=>'multipart/form-data']) }}

    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-9">
                {{Form::hidden('question_id',$question->id)}}
                {{Form::hidden('url',URL::current())}}
                {{Form::hidden('id',$choice->id)}}
                {!! Form::textarea('description',null,['class'=>'form-control','row'=>'3','id'=>'froala']) !!}
            </div>
            <div class="col-sm-3">
               {{--  <p class="text-lg-left"><b>Resposta: {{$count++}}</b></p> --}}
                @if($choice->status == 1)
                    <div class="form-inline alert alert-danger">
                        <label class="radio-inline"><b>Correta:</b></label>
                        <label class="offset-1  radio-inline">{{ Form::radio('status', '0') }} Não</label>
                        <label class="offset-1  radio-inline">{{ Form::radio('status', '1') }} Sim</label>
                    </div>
                @else
                    <div class="form-inline alert alert-info">
                        <label class="radio-inline"><b>Correta:</b></label>
                        <label class="offset-1  radio-inline">{{ Form::radio('status', '0') }} Não</label>
                        <label class="offset-1  radio-inline">{{ Form::radio('status', '1') }} Sim</label>
                    </div>
                @endif
                {!! Form::submit('Salvar',['class'=>'btn btn-sm btn-blue-cavaleiros pull-right']) !!}
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <hr/>

    {{Form::close()}}



@endforeach