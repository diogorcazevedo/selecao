<nav  class="navbar navbar-light background-white">
  <span class="navbar-text">
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  @can('permissao_gerente')
                      <button class="btn btn-outline-blue-cavaleiros btn-sm nav-item" type="button" data-toggle="collapse" data-target="#reports" aria-controls="reports" aria-expanded="false" aria-label="reports">
                          <small> RELATÓRIOS</small>
                      </button>
                      <button class="btn btn-outline-blue-cavaleiros btn-sm nav-item" type="button" data-toggle="collapse" data-target="#financial" aria-controls="financial" aria-expanded="false" aria-label="financial">
                          <small> FINANCEIRO</small>
                      </button>
                      <button class="btn btn-outline-blue-cavaleiros btn-sm nav-item" type="button" data-toggle="collapse" data-target="#config" aria-controls="config" aria-expanded="false" aria-label="config">
                          <small> CONFIGURAÇÕES</small>
                      </button>
                      <button class="btn btn-outline-blue-cavaleiros btn-sm nav-item" type="button" data-toggle="collapse" data-target="#registers" aria-controls="registers" aria-expanded="false" aria-label="registers">
                          <small> INSCRIÇÕES</small>
                      </button>
                      <button class="btn btn-outline-blue-cavaleiros btn-sm nav-item" type="button" data-toggle="collapse" data-target="#application" aria-controls="application" aria-expanded="false" aria-label="application">
                          <small> PROVAS</small>
                      </button>
                      <button class="btn btn-outline-blue-cavaleiros btn-sm nav-item" type="button" data-toggle="collapse" data-target="#application" aria-controls="application" aria-expanded="false" aria-label="application">
                          <small> APLICAÇÃO</small>
                      </button>
                  @endcan
                  @if(count(auth()->user()->sponsor)>0)
                      @include('project::_navbar.items.sponsors')
                  @endif
              </div>
              <div class="col-md-4">
                  @can('permissao_basic')
                    @include('project::_navbar.items.search')
                  @endcan
              </div>
          </div>
          @include('project::_navbar.items.reports')
          @include('project::_navbar.items.financial')
          @include('project::_navbar.items.inscricoes')
          @include('project::_navbar.items.configuracoes')
          @include('project::_navbar.items.application')
          @include('project::_navbar.items.academy')
      </div>
  </span>
</nav>
<br/>