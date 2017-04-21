@if(auth()->user()->profile == 'admin')

      @can('permissao_gerente')
            <div class="btn-group">
                <a class="btn btn-outline-success my-2 my-sm-0 btn-sm" href="#" data-toggle="modal" data-target="#authorization">
                    <small>CONTROLE DE ACESSO</small>
                </a>
            </div>

            <div class="btn-group">
                <a class="btn btn-outline-success my-2 my-sm-0 btn-sm" href="#" data-toggle="modal" data-target="#academy">
                    <small>ACADÊMICO</small>
                </a>
            </div>
              <div class="btn-group">
                  <a class="btn btn-outline-success my-2 my-sm-0 btn-sm" href="#" data-toggle="modal" data-target="#aplicacao">
                      <small>APLICAÇÃO</small>
                  </a>
              </div>
        @endcan

        @can('permissao_comunicacao')
            <div class="btn-group">
                <a class="btn btn-blue-cavaleiros my-2 my-sm-0 btn-sm" href="#" id="atendimentos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <small>ATENDIMENTO</small>
                </a>
                <div class="dropdown-menu" aria-labelledby="atendimentos" style="border: none; padding: 20%;">
                    <br/>
                    <p>
                        <a class="btn btn-blue-cavaleiros btn-sm dropdown-item" href="{{ route('contacts.get.index',['status'=>'0']) }}">
                            Respostas pendentes
                        </a>
                    </p>
                    <p>
                        <a class="btn btn-blue-cavaleiros btn-sm dropdown-item" href="{{ route('contacts.get.index',['status'=>'1']) }}">
                            Respostas enviada ao candidato
                        </a>
                    </p>

                </div>
            </div>
        @endcan
@endif



@if (auth()->user()->profile != 'admin')
    <div class="btn-group">
        <a class="btn btn-outline-blue-cavaleiros my-2 my-sm-0 btn-sm" href="{{route('clients.send.index',['user'=>auth()->user()->id])}}">
            <small>FALE CONOSCO</small>
        </a>
    </div>
@endif




<div class="btn-group">
    <a class="btn btn-blue-cavaleiros my-2 my-sm-0 btn-sm" href="#" id="users" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <small>{{primeiroNome(auth()->user()->name)}}</small>
    </a>
    <div class="dropdown-menu" aria-labelledby="users" style="border: none; padding: 20%;">

        <br/>
        <p>
            <a class="btn btn-blue-cavaleiros btn-sm dropdown-item" href="{{ route('users.edit',['user'=>auth()->user()->id]) }}">
                Editar Dados
            </a>
        </p>
        <p>
            <a class="btn btn-blue-cavaleiros btn-sm dropdown-item" href="{{ route('users.password',['user'=>auth()->user()->id]) }}">
                Alterar Senha
            </a>
        </p>
        <p class="text-lg-right">
            <a class="btn btn-warning btn-sm" href="{{ url('/logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Sair
            </a>
        </p>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

    </div>
</div>

<div class="btn-group">
    <a class="btn btn-warning my-2 my-sm-0 btn-sm" href="{{url('/login')}}">
        <i class="fa fa-cogs" aria-hidden="true"></i>
    </a>
</div>
