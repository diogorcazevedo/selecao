@extends('_layouts.app')
@section('content')
    <section class="margin-top-fix-170">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="card card-block print">
                    <div class="card-block">

                        <?php
                        $idConv = $slip->account->iconv;
                        $refTran = $slip->account->convenio.str_pad($slip->nosso_numero, 10, "0", STR_PAD_LEFT);
                        $valor = str_replace('.', '', $slip->register->job->tax);
                        $qtdPontos = '0';
                        $dt = date("d-m-Y");
                        $dtVenc = date('dmY', strtotime("+2 days", strtotime($dt)));
                        $tpPagamento = '2';
                        $cpfCnpj = limpaCPF_CNPJ($slip->register->user->cpf);
                        $indicadorPessoa = '1';
                        //$valorDesconto = '0';
                        //$dataLimiteDesconto = "00000000";
                        $tpDuplicata = 'DS';
                        $urlRetorno = 'http://institutodeselecao.org.br/project/boletos/generate/bb/'.$slip->id;
                        //$urlRetorno = 'http://localhost:8888/selecao/public/project/boletos/generate/bb/'.$slip->id;
                        $urlInforma = 'http://institutodeselecao.org.br/admin/project/registers/bbcobranca/retorno';
                        $nome = mb_strtoupper($slip->register->user->name);
                        $endereco = mb_strtoupper($slip->register->user->client->address. ' ' .$slip->register->user->client->complement. ' ' .$slip->register->user->client->neighborhood);
                        $cidade = mb_strtoupper($slip->register->user->client->city);
                        $uf = mb_strtoupper($slip->register->user->client->state);
                        $cep = $slip->register->user->client->zipcode;
                        $msgLoja = mb_strtoupper($slip->register->job->name);


                        ?>

                        <form action="https://mpag.bb.com.br/site/mpag/" method="post" name="pagamento">
                            <input type="hidden" name="idConv" value="{{$idConv}}">
                            <input type="hidden" name="refTran" value="{{$refTran}}">
                            <input type="hidden" name="valor" value="{{$valor}}">
                            <input type="hidden" name="qtdPontos" value="{{$qtdPontos}}">
                            <input type="hidden" name="dtVenc" value="{{$dtVenc}}">
                            <input type="hidden" name="dataPagamento" value="{{$dtVenc}}">
                            <input type="hidden" name="tpPagamento" value= "{{$tpPagamento}}">
                            <input type="hidden" name="cpfCnpj" value="{{$cpfCnpj}}">
                            {{--
                            <input type="hidden" name="cpfCnpj" value="09253283750">
                            <input type="hidden" name="valorDesconto" value="{{$valorDesconto}}">
                            <input type="hidden" name="dataLimiteDesconto" value="{{$dataLimiteDesconto}}">
                            <input type="hidden" name="uf" value="RJ">
                            <input type="hidden" name="cep" value="22261160">
                           --}}
                            <input type="hidden" name="indicadorPessoa" value="{{$indicadorPessoa}}">
                            <input type="hidden" name="tpDuplicata" value="{{$tpDuplicata}}">
                            <input type="hidden" name="urlRetorno" value="{{$urlRetorno}}">
                            <input type="hidden" name="urlInforma" value="{{$urlInforma}}">
                            <input type="hidden" name="nome" value="{{$nome}}">
                            <input type="hidden" name="endereco" value="{{$endereco}}">
                            <input type="hidden" name="cidade" value="{{mb_strtoupper($cidade)}}">
                            <input type="hidden" name="uf" value="{{$uf}}">
                            <input type="hidden" name="cep" value="{{$cep}}">
                            <input type="hidden" name="msgLoja" value="{{$msgLoja}}">
                            <input type="submit" value="Aguarde mais um pouco que está sendo gerado boleto do Banco do Brasil" class="btn btn-warning btn-sm">
                        </form>

                    </div>
                </div>
                <br/>
                <br/>
                <br/>
                <br/>
            </div>
        </div>
            <script>
                window.onload = function(){
                    document.forms['pagamento'].submit()

                }
            </script>
    </section>

@endsection