@extends('_layouts.app')

@section('content')

    <div class="container">
        <div class="card card-block">
            <div class="alert alert-info">
                <p class="text-lg-center"><b>{{$project->sponsor->name}}</b> <small>Última Atualização: {{date('d/m/Y')}}</small></p>
            </div>
            <br/>
            <div class="container">
                <div class="row">
                    <br/>
                    <div class="col-md-3"> <p class="text-lg-left">Cadastrados: <span class="alert alert-info">{{count($registers)}}</span></p><small>Total de inscrições</small></div>
                    <div class="col-md-3"><p class="text-lg-left"> Pagos: <span class="alert alert-info">{{count($registers->where('pay_method','1'))}}</span></p><small>pagas com boleto bancário</small></div>
                    <div class="col-md-3"><p class="text-lg-left"> Cartão: <span class="alert alert-info">{{count($registers->where('pay_method','3'))}}</span></p><small>pagas com cartão de crédito</small></div>
                    <div class="col-md-3"><p class="text-lg-left"> Efetivadas: <span class="alert alert-info">{{count($registers->where('active','1'))}}</span></p><small>(pago + isenção)</small></div>
                </div>
            </div>
            <br/>
            <br/>
            <div class="container">
                <div class="row">
                    <br/>
                    <div class="col-md-4"> <p class="text-lg-left"> Pedidos de Isenção: <span class="alert alert-info">{{$benefits->count()}}</span></p><small>Total de pedidos</small></div>
                  {{--  <div class="col-md-4"> <p class="text-lg-left"> Deferidos: <span class="alert alert-info">{{$benefits->where('benefits.status','S')->count()}}</span></p><small>Com duplicidades</small></div>--}}
                    <div class="col-md-4"><p class="text-lg-left"> Total: <span class="alert alert-info">{{count($registers->where('pay_method','2'))}}</span></p><small>Isenções deferidas</small></div>
                </div>
            </div>
        </div>
    </div>
    @can('permissao_gerente')
    <br/>
    <br/>
    <div class="container">
        <div class="card card-block">
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="bg-faded"><small>Remessa de arquivo para registro de Boleto</small></p>
                        <br/>
                        <p><a href="#" class="btn-sm btn btn-blue-cavaleiros"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Gerar Remessa</a></p>
                    </div>
                    <div class="col-sm-3 bg-faded">
                        <p class="text-lg-center"><small>Iugu retorno cartão de crédito</small></p>
                        <br/>
                        <p class="text-lg-center"><a href="{{route('project.iugu.api.invoices.paymentReloadStatus',['project'=>$project->id,'parameter'=>'paid'])}}" class="btn-sm btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processar</a></p>
                    </div>
                    <div class="col-sm-6">
                        <p class="bg-faded"><small>Upload de retorno bancário</small></p>
                        {{ Form::open(['route'=>['project.boletos.return.process',$project->id],'method'=>'post','enctype'=>'multipart/form-data']) }}

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="margin-top-percent-4">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="form-group col-lg-10">
                                                    {!! Form::file('image',null,['class'=>'form-control']) !!}
                                                    {{Form::hidden('file_documents_id',12)}}
                                                </div>

                                                <div class="form-group col-lg-2">
                                                    {!! Form::submit('Salvar',['class'=>'btn btn-sm btn-blue-cavaleiros pull-lg-right']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
@endsection