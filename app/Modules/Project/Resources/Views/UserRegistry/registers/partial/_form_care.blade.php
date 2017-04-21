<div class="offset-md-2 col-lg-8">
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

<br/>

@if($row->job->quota != 0)

<div class="bg-faded">
    <br/>
    <div class="row">
        <p class="offset-md-1 col-sm-3 control-label"><b>Participante por Cota</b></p>
        <div class="col-sm-8">
            <label class="radio-inline">{{ Form::radio('user_quota', '0') }} Não</label>
            <label class="radio-inline">{{ Form::radio('user_quota', '1') }} Sim</label>
        </div>
    </div>
    <br/>
</div>
<br/>
<br/>
@endif
@if($row->job->handicapped != 0)
<div class="bg-faded">
    <br/>
    <div class="row">
        <p class="offset-md-1 col-sm-3 control-label"><b>Portador de Deficiência</b></p>
        <div class="col-sm-8">
            <label class="radio-inline">{{ Form::radio('user_handicapped', '0') }} Não</label>
            <label class="radio-inline">{{ Form::radio('user_handicapped', '1') }} Sim</label>
        </div>
    </div>
    <br/>
</div>
<br/>
<br/>
@endif
    <div class="bg-faded">
        <br/>
        <div class="row">
            {{ Form::label('Local para realização da prova:','Local para realização da prova: ' , ['class'=>"offset-md-1 col-sm-3 control-label"]) }}
            <div class="col-sm-7">
                {{ Form::select('local', arraylocais(), null, array('class' => 'form-control','required' => 'required' ,'placeholder'=>' ')) }}
            </div>
        </div>
        <br/>
    </div>
    <br/>
    <br/>
    {{--
@if(auth()->user()->profile == 'admin')
<div class="card card-block card-8">
    <div class="row">
        <p class="offset-md-1 col-sm-3 control-label"><b>Inscrição Confirmada</b></p>
        <div class="col-sm-8">
            <label class="radio-inline">{{ Form::radio('active', '0') }} Não</label>
            <label class="radio-inline">{{ Form::radio('active', '1') }} Pagamento</label>
            <label class="radio-inline">{{ Form::radio('active', '2') }} Isenção Deferida</label>
        </div>
    </div>
</div>
@endif
--}}
<br/><br/>


{{Form::hidden('job_id',$row->job->id)}}
{{Form::hidden('url',$url)}}
{{Form::hidden('active','0')}}

</div>