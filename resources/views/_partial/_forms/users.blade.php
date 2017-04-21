@if($form =='edit')

    @include('_partial._forms._inputs.name')
    @include('_partial._forms._inputs.email')
    @include('_partial._forms._inputs.cpf')
    @include('_partial._forms._inputs.cel')
    @include('_partial._forms._inputs.identity')
    @include('_partial._forms._inputs.dispatcher')
    @include('_partial._forms._inputs._clients.birthdate')
    @include('_partial._forms._inputs._clients.gender')
    @include('_partial._forms._inputs._clients.marital_status')
    @include('_partial._forms._inputs._clients.mother')
    @include('_partial._forms._inputs._clients.father')
    @include('_partial._forms._inputs._clients.nationality')
    @include('_partial._forms._inputs._clients.naturality')
    @include('_partial._forms._inputs._clients.childrens')
    @include('_partial._forms._inputs._clients.zipcode')
    @include('_partial._forms._inputs._clients.phone')
    @include('_partial._forms._inputs._clients.address')
    @include('_partial._forms._inputs._clients.complement')
    @include('_partial._forms._inputs._clients.neighborhood')
    @include('_partial._forms._inputs._clients.city')
    @include('_partial._forms._inputs._clients.state')
    @include('_partial._forms._inputs.url')
    {{Form::hidden('user_id',$user->id)}}
    <input type="hidden" name="complement[id]" value={{$user->complement->id}}>
    <input type="hidden" name="id" value={{$user->id}}>

        @elseif($form=='registrations')

    @include('_partial._forms._inputs.name')
    @include('_partial._forms._inputs.email')
    @include('_partial._forms._inputs.cpf')
    @include('_partial._forms._inputs.cel')
    @include('_partial._forms._inputs.identity')
    @include('_partial._forms._inputs.dispatcher')
    @include('_partial._forms._inputs._clients.birthdate')
    @include('_partial._forms._inputs._clients.gender')
    @include('_partial._forms._inputs._clients.marital_status')
    @include('_partial._forms._inputs._clients.mother')
    @include('_partial._forms._inputs._clients.father')
    @include('_partial._forms._inputs._clients.nationality')
    @include('_partial._forms._inputs._clients.naturality')
    @include('_partial._forms._inputs._clients.childrens')
    @include('_partial._forms._inputs._clients.zipcode')
    @include('_partial._forms._inputs._clients.phone')
    @include('_partial._forms._inputs._clients.address')
    @include('_partial._forms._inputs._clients.complement')
    @include('_partial._forms._inputs._clients.neighborhood')
    @include('_partial._forms._inputs._clients.city')
    @include('_partial._forms._inputs._clients.state')
    <hr/>
    @include('_partial._forms._inputs.password')
    @include('_partial._forms._inputs.confirm_password')
    <input type="hidden" name="profile" value={{$profile}}>
    <input type="hidden" name="job_id" value={{$job->id}}>

@endif

<div class="form-group">
    <div class="offset-md-9">
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
    </div>
</div>