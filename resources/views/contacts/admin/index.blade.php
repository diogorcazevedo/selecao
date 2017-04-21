@extends('_layouts.app')

@section('content')

    <div class="container">
        <div class="row">
                <table class="table table-bordered background-white">

                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Solicitante</th>
                        <th>CPF</th>
                        <th colspan="2">Status da Solicitação</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($orders as $order)


                        <tr>
                            <td>{{$order->user_id}}</td>
                            <td>{{$order->user->name }}</td>
                            <td>{{$order->user->cpf}}</td>
                            <td>
                                @if($order->status == 0)
                                    <a href="{{route('contacts.get.dialog',['order'=>$order->id])}}" class="btn btn-sm btn-warning btn-style">
                                        Resposta Pendente
                                    </a>
                                @else
                                    <a href="{{route('contacts.get.dialog',['order'=>$order->id])}}" class="btn btn-sm btn-blue-instituto">
                                        Resposta enviada ao candidato
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#close{{$order->id}}" class="btn btn-sm btn-secondary btn-style">
                                    encerrar
                                </a>
                            </td>
                        </tr>
                        <div class="modal fade" id="close{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title text-center">ENCERRAR ATENDIMENTO</h4>
                                    </div>
                                    <div class="modal-body bg-danger">
                                        <p class="text-center">Sr. {{primeiroNome(auth()->user()->name)}}</p>
                                        <p class="text-center">Está seguro que deseja encerrar o atendimento?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn btn-default btn-style pull-left" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                        <a href="{{route('contacts.get.close',['order'=>$order->id])}}" class="btn btn btn-danger btn-style">encerrar</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>

@endsection