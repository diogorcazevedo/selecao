<div class="form-group{{ $errors->has('complement[state]') ? ' has-error' : '' }} row">
    <div class="col-md-3 ">
        {{ Form::label('Estado:','Estado:') }}
    </div>
    <div class="col-md-7">
        {{ Form::select('complement[state]', arrayestados(), null, array('class' => 'form-control','id'=>"uf")) }}
    </div>
</div>