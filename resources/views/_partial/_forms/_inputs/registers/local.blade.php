
<div class="bg-faded">
    <br/>
    <div class="row">
        {{ Form::label('Local para realização da prova:','Local para realização da prova: ' , ['class'=>"offset-md-1 col-sm-3 control-label"]) }}
        <div class="col-sm-7">
            {{ Form::select('local', $cities, null, array('class' => 'form-control','required' => 'required','placeholder'=>' ')) }}
        </div>
    </div>
    <br/>
</div>