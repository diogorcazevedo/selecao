<div class="form-group{{ $errors->has('complement[neighborhood]') ? ' has-error' : '' }} row">
    <label for="complement[neighborhood]" class="col-md-3 col-form-label">Bairro:</label>

    <div class="col-md-7">
        {{ Form::text('complement[neighborhood]', null, ['class' => 'form-control', 'id'=>"bairro"])  }}
        @if ($errors->has('complement[neighborhood]'))
            <span class="help-block">
                 <strong>{{ $errors->first('complement[neighborhood]') }}</strong>
            </span>
        @endif
    </div>
</div>