<div class="offset-md-6 col-sm-6">
    @can('permissao_academico')
    {{ Form::open(['route'=>['items.search'],'method'=>'GET']) }}
    <div class="container card-block card-8">
        <div class="row">
            <input type="text" class="form-control offset-md-1 col-md-8" name="search"  placeholder="buscar itens">
            <button class="offset-md-1 col-md-2 btn btn-outline-secondary btn-sm nav-item"  type="submit">
                <small> buscar</small>
            </button>
        </div>
    </div>
    {{ Form::close()}}
    @endcan
    <br/>
</div>