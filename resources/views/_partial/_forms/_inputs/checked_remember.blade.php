<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
    <label for="name" class="col-md-3 col-form-label"> Manter Autenticado</label>

    <div class="col-md-7">
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} checked>
    </div>
</div>