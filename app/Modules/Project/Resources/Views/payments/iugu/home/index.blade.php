@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="card card-block">
            <div class="alert alert-info">
                <p class="text-lg-center text-uppercase"><b>{{$project->sponsor->name}}</b></p>
            </div>
            <div class="bg-faded">
                <p class="text-lg-center"><b>FATURAS</b></p>
            </div>
            <br/>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-block card-8">
                            <div class="text-lg-center">
                                <button  type="button" class="btn btn-outline-blue-cavaleiros dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-list " aria-hidden="true"></i> Listar Faturas da API
                                </button>
                                <div class="dropdown-menu">
                                    <br/>
                                    <div class="dropdown-divider"></div>
                                    <li class="dropdown-item">
                                        <a class="btn btn-group btn-blue-cavaleiros" href=" {{route('project.iugu.api.invoices.index',['project'=>$project->id])}}">
                                            listar todas
                                        </a>
                                        <br/>
                                        <small><span>Lista todas as faturas cadastradas na api</span></small>
                                    </li>

                                    <div class="dropdown-divider"></div>
                                    <li class="dropdown-item">
                                        <a class="btn btn-group btn-blue-cavaleiros" href=" {{route('project.iugu.api.invoices.index',['project'=>$project->id,'parameter'=>'paid'])}}">
                                              listar pagas
                                        </a>
                                        <br/>
                                        <small><span>Lista todas as faturas pagas na api</span></small>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <li class="dropdown-item">
                                        <a class="btn btn-group btn-blue-cavaleiros" href=" {{route('project.iugu.api.invoices.index',['project'=>$project->id,'parameter'=>'pending'])}}">
                                              listar pendentes
                                        </a>
                                        <br/>
                                        <small><span>Lista todas as faturas pending na api</span></small>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="btn btn-group btn-blue-cavaleiros" href=" {{route('project.iugu.api.invoices.index',['project'=>$project->id,'parameter'=>'expired'])}}">
                                            listar Expiradas
                                        </a>
                                        <br/>
                                        <small><span>Lista todas as faturas Expired na api</span></small>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-block card-8">
                            <div class="text-lg-center">
                                <a class="btn btn-outline-success" href="{{route('project.iugu.api.invoices.paymentReloadStatus',['project'=>$project->id,'parameter'=>'paid'])}}">
                                    <i class="fa fa-check-circle " aria-hidden="true"></i> Quitar faturas pagas
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-block card-8">
                            <div class="text-lg-center">
                                <button  type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-times-rectangle " aria-hidden="true"></i> Excluir Faturas
                                </button>
                                <div class="dropdown-menu">
                                    <br/>

                                    <div class="dropdown-divider"></div>
                                    <li class="dropdown-item">
                                        <a class="btn btn-group btn-danger" href=" {{route('project.iugu.api.invoices.cancelByStatus',['project'=>$project->id,'parameter'=>'pending'])}}">
                                              cancelar abertas
                                        </a>
                                        <br/>
                                        <small><span>Cancelar todas as faturas abertas na api</span></small>
                                    </li>

                                    <div class="dropdown-divider"></div>
                                    <li class="dropdown-item">
                                        <a class="btn btn-group btn-danger" href=" {{route('project.iugu.api.invoices.clearAllCancel',['project'=>$project->id])}}">
                                              excluir canceladas
                                        </a>
                                        <br/>
                                        <small><span>Excluir todas as faturas canceladas da api</span></small>
                                    </li>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <br/>
                <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-block card-8">
                                <div class="text-lg-center">
                                    <div class="text-lg-center">
                                        <button  type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-times-rectangle " aria-hidden="true"></i> Criar Faturas por Cargo
                                        </button>
                                        <div class="dropdown-menu">
                                            <br/>
                                            @foreach($project->jobs as $job)
                                            <div class="dropdown-divider"></div>

                                                <li class="dropdown-item">
                                                    <a class="btn btn-group btn-success" href="{{route('project.iugu.api.invoices.apiCreateInvoicesByJob',['project'=>$project->id,'job'=>$job->id])}}">
                                                     <small><small> {{$job->name}}</small></small>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <br/>
            <div class="bg-faded">
                <p class="text-lg-center"><b>CLIENTES</b></p>
            </div>
            <br/>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-block card-8">
                            <div class="text-lg-center">
                                <a id="error" class="btn btn-outline-success" href=" {{route('project.iugu.api.customers.createAPI',['project'=>$project->id])}}">
                                    <i class="fa fa-check-circle " aria-hidden="true"></i> Cadastrar Candidatos na API
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-block card-8">
                            <div class="text-lg-center">
                                <a id="error" class="btn btn-outline-danger" href=" {{route('project.iugu.api.customers.delete',['project'=>$project->id])}}">
                                    <i class="fa fa-times-circle " aria-hidden="true"></i> Excluir Todos Candidatos na API
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <br/>
        </div>
        <br/>
    </div>
@endsection
{{--
<script>
    window.onload = function(){
        //document.getElementById("error").click();

        setTimeout(function(){
            document.getElementById("error").click();
        }, 3000);

    }
</script>

--}}

