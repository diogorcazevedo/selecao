<div class="container">
    <div class="row">
        <div class="offset-sm-4 col-sm-8">
            {{ Form::open(['route'=>['homologation.name']]) }}
            <div class="container card-block card-8">
                <div class="row">
                    <input type="text" class="form-control offset-md-1 col-md-7" name="search"  placeholder="buscar por nome">
                    <button class="offset-md-1 col-md-2 btn btn-warning btn-sm nav-item"  type="submit">
                        BUSCAR
                    </button>
                </div>
            </div>
            {{ Form::close()}}
            <br/>
        </div>
    </div>
</div>