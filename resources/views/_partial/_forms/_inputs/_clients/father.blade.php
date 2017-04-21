<div class="form-group{{ $errors->has('complement[father]') ? ' has-error' : '' }} row">
    <br/>
    <label for="complement[father]" class="col-md-3 col-form-label">Pai:</label>

    <div class="col-md-7">
        {{ Form::text('complement[father]', null, array('class' => 'form-control'))  }}
        @if ($errors->has('complement[father]'))
            <span class="help-block">
                        <strong>{{ $errors->first('complement[father]') }}</strong>
            </span>
        @endif
    </div>
    <div style="clear: both;"></div>
    <br/>
</div>