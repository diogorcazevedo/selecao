@if($job->quota != 0)
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
@endif