@extends('_layouts.app')

@section('content')
    <div class="container">
        @if(isset($invoices))
            <?php $count=1;  ?>
        <p class="alert alert-info"> Quantidade: {{count($invoices)}}</p>
            <table class="table table-bordered background-white">
                <thead>
                <tr>
                    <th class="text-lg-center"><small>QTD</small></th>
                    <th class="text-lg-center"><small>ID da fatura</small></th>
                    <th class="text-lg-center"><small>ID do cliente</small></th>
                    <th class="text-lg-center"><small>Nome</small></th>
                    <th class="text-lg-center"><small>Status</small></th>
                    <th colspan="2" class="text-lg-center"><small>Ações</small></th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td><small>{{$count++}}</small></td>
                        <td><small>{{substr($invoice->id, 0, -26)}}...</small></td>
                        <td><small>{{substr($invoice->customer_id, 0, -26)}}...</small></td>
                        <td><small>{{$invoice->customer_name}}</small></td>
                        <td><small>{{$invoice->status}}</small></td>
                        <td class="text-lg-center">
                            <a style="border: none;" class="btn btn-outline-blue-instituto btn-sm" href="{{route('project.iugu.api.invoices.getById',['project'=>$project->id,'invoice'=>$invoice->id])}}">
                                <i class="fa fa-search-plus fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>

                        @if($invoice->status != 'paid')
                            @if($invoice->status == 'canceled')
                                <td class="text-lg-center">
                                    <a style="border: none;" class="btn btn-outline-blue-instituto btn-sm" href="{{route('project.iugu.api.invoices.remove',['project'=>$project->id,'invoice'=>$invoice->id])}}">
                                        <i class="fa fa-times-rectangle fa-lg text-danger" aria-hidden="true"></i>
                                    </a>
                                </td>
                            @else
                                <td class="text-lg-center">
                                    <a style="border: none;" class="btn btn-outline-blue-instituto btn-sm" href="{{route('project.iugu.api.invoices.cancel',['project'=>$project->id,'invoice'=>$invoice->id])}}">
                                        <i class="fa fa-times-circle fa-lg text-warning" aria-hidden="true"></i>
                                    </a>
                                </td>
                            @endif
                        @else
                            <td class="text-lg-center">
                                <a class="btn btn-outline-blue-instituto btn-sm disabled" href="#">
                                    Fatura Liquidada
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection