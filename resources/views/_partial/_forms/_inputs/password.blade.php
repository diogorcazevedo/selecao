<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
    <label for="password" class="col-md-3 control-label">Senha:</label>

    <div class="col-md-7">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>