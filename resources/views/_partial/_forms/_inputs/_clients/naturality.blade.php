<div class="form-group{{ $errors->has('complement[naturality]') ? ' has-error' : '' }} row">
    <div class="col-md-3 ">
        {{ Form::label('Natural','Natural:') }}
    </div>
    <div class="col-md-7">
        {{ Form::select('complement[naturality]', arrayestados(), null, array('class' => 'form-control')) }}
    </div>
</div>