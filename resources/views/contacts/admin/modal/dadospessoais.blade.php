<div class="modal fade" id="dadospessoais" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">

                @include('errors._check')

                {{ Form::model($user,['route'=>['users.update',$user->id]]) }}

                <div class="container">
                    @include('_partial._forms.users',['form' => 'edit'])
                </div>
                {{Form::hidden('complement[birthdate]',$user->client->birthdate)}}

                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-secondary btn-style" data-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>