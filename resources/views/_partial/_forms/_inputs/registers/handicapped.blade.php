@if($job->handicapped != 0)
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
@endif