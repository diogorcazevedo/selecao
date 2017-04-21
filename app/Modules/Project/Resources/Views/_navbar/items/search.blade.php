{{ Form::open(['route'=>['users.index'],'method'=>'GET']) }}
    <div class="container">
        <div class="row">
            <input type="text" class="form-control  col-md-9" name="search"  placeholder="buscar usuários">
            <button class="offset-md-1 col-md-2 btn btn-outline-blue-cavaleiros btn-sm nav-item"  type="submit">
                <small> Search</small>
            </button>
        </div>
    </div>
{{ Form::close()}}
