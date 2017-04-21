@include('_partial._forms._inputs.name')
@include('_partial._forms._inputs.description')
@include('_partial._forms._inputs.url')
@if($form =='edit')
    {{Form::hidden('role_id',$role->id)}}
    <input type="hidden" name="edit" value="1">
    @else
    <input type="hidden" name="edit" value="0">
@endif

<div class="form-group">
    <div class="offset-md-9">
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
    </div>
</div>