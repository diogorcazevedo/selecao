
<div class="form-group{{ $errors->has('complement[mother]') ? ' has-error' : '' }} row">
    <br/>
    <label for="complement[mother]" class="col-md-3 col-form-label">Mãe:</label>

    <div class="col-md-7">
        {{ Form::text('complement[mother]', null, array('class' => 'form-control'))  }}
        @if ($errors->has('complement[mother]'))
            <span class="help-block">
                 <strong>{{ $errors->first('complement[mother]') }}</strong>
            </span>
        @endif
    </div>
    <div style="clear: both;"></div>
    <br/>
</div>