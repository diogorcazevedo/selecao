<div class="bg-faded">
    <br/>
    <div class="row ">
        <p class="offset-md-1 col-sm-3 control-label"><b>Necessidades Especiais</b></p>
        <div class="col-sm-8">
            <label class="radio-inline">{{ Form::radio('user_needs', '0') }} Não</label>
            <label class="radio-inline">{{ Form::radio('user_needs', '1') }} Sim</label>
        </div>
    </div>
    <br/>
    <div class="row">
        {!! Form::label('Informar:','Informar: ' , ['class'=>"offset-md-1 col-sm-3 control-label"]) !!}
        <div class="col-sm-7">
            {{ Form::select('user_needs_description', arrayneeds(), null, array('class' => 'form-control','placeholder'=>' ')) }}
        </div>
    </div>
    <br/>
</div>