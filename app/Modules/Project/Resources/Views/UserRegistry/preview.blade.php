@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-block print">
                    <div class="card-block">


                        <div class="row">
                            <div class="col-lg-12">
                                <p class="text-lg-center bg-faded">{{$register->job->project->sponsor->name}} - {{$register->job->project->sponsor->alias}}</p>
                                <p>Concurso: <strong>{{$register->job->name}}</strong></p>
                                <p>Taxa: <strong>{{$register->job->tax}}</strong></p>
                            </div>
                        </div>
                        <br/>

                        <p class="text-lg-center bg-faded">Dados do Candidato</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Nome: <strong>{{$register->user->name}}</strong></p>
                                <p>cpf: <strong>{{$register->user->cpf}}</strong></p>
                            </div>
                            <div class="col-lg-6">
                                <p>Email: <strong>{{$register->user->email}}</strong></p>
                                <p>Telefone: <strong>{{$register->user->cel}}</strong></p>
                            </div>
                        </div>

                        <br/>

                        <p class="text-lg-center bg-faded">Condições de concorrência</p>
                        <br/>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Candidato Deficiente: <b>{{$register->user_handicapped == 0 ? 'não' : 'sim' }}</b></p>
                            </div>
                            <div class="col-lg-12">
                                <p>Candidato Negro:  <b>{{$register->user_quota == 0 ? 'não' : 'sim' }}</b></p>
                            </div>
                        </div>
                        <br/>

                        <p class="text-lg-center bg-faded">Necessidades especiais para realização da prova</p>
                        <br/>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Necessidades especiais:  <b>{{$register->user_needs == 0 ? 'não' : 'sim' }} </b></p>
                            </div>
                            <div class="col-lg-12">
                                <p>Descrição: {{$register->user_needs_description}}</p>
                            </div>
                        </div>

                        <br/>

                        <br/>

                        <div class="no-print">
                            <hr/>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-lg-center">
                                            <a class="btn btn-blue-cavaleiros btn-sm card-24" href="{{route('project.slips.store',['register'=>$register->id,'job'=>$register->job->id, 'type'=>1])}}" target="_blank"><i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                                BOLETO BANCÁRIOS
                                            </a>
                                        </p>
                                    </div>
                                   {{--@if($register->job->project->id == 2) --}}
                                    <div class="offset-lg-4  col-lg-4">
                                        <p class="text-lg-center">
                                            <a class="btn btn-warning btn-sm card-24" href="{{route('project.iugu.checkout',['register'=>$register->id])}}" target="_blank"><i class="fa fa-credit-card fa-lg" aria-hidden="true"></i>
                                                CARTÃO DE CRÉDITO
                                            </a>
                                        </p>
                                    </div>
                                  {{-- @endif--}}
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
        </div>
    </div>
@endsection


{{--
<div class="col-lg-4">
    <p class="text-lg-center">
        @if($register->job->project->isencao == 1)
            <a class="btn  btn-sm btn-outline-secondary text-blue-instituto pull-lg-left" href="{{route('admin.project.benefits.create',['user'=>$register->user_id, 'register'=>$register->id])}}" >Solicitar Isenção</a>
        @endif
    </p>
</div>
--}}
