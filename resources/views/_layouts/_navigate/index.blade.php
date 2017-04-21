<nav class="navbar navbar-toggleable-lg fixed-top navbar-light header-style">
    <div id="navbar-head-container" class="container">
        <button id="navbar-btn-toogle" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset('img/institute/logo.png')}}" width="100" alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav mr-auto mt-3 mt-md-0">

            </div>
            <div class="navbar-nav mt-3 mt-md-0">
                <div class="nav-item">
                    <a class="btn btn-warning btn-sm nav-item" href="{{route('registryOperations.getRegistersByCPF')}}">
                        <small>2ª VIA PARA PAGAMENTO DE TAXA</small>
                    </a>
                    @if(!auth()->check())
                        @include('_layouts._navigate.not_check')
                    @else
                        @include('_layouts._navigate.check')
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
@can('permissao_gerente')
    @include('_layouts._navigate.modals.academy')
    @include('_layouts._navigate.modals.authorization')
    @include('_layouts._navigate.modals.aplicacao')
@endcan