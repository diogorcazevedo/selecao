@extends('_layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @include('academy::item_operations.list.search')

            @forelse($items as $item)
                <table class="table table-bordered background-white">
                    <thead>
                    <th class="text-lg-center">id</th>
                    <th class="text-lg-center">professor</th>
                    <th class="text-lg-center">qtd de perguntas</th>
                    <th class="text-lg-center">status</th>
                    <th class="text-lg-center">programa</th>
                    <th colspan="4" class="text-lg-center">ações</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-uppercase"><small>{!!$item->id!!}</small></td>
                        <td class="text-uppercase"><small>{!!$item->user->name!!}</small></td>
                        <td class="text-uppercase"><small>{{count($item->questions)}}</small></td>
                        <td class="text-uppercase"><small>{!! status($item->status) !!}</small></td>
                        <td class="text-lg-center">
                            <a href="#" class="btn-sm btn btn-info btn-secondary"  data-toggle="modal" data-target="#program{{$item->id}}">
                                <small> <i class="fa fa-graduation-cap" aria-hidden="true"></i> programa</small>
                            </a>
                            @include('academy::item_operations.list.modal_program')
                        </td>
                        <td class="text-lg-center">
                            <a href="{{route('rails.items',['item_id'=>$item->id])}}" class="btn-sm btn text-success btn-outline-secondary">
                                <i class="fa fa-edit" aria-hidden="true"></i> Editar
                            </a>
                        </td>
                        <td class="text-lg-center">
                            <a class="btn btn-outline-blue-cavaleiros btn-sm" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                <i class="fa fa-search-plus" aria-hidden="true"></i> visualizar
                            </a>
                        </td>
                        <td class="text-lg-center">
                            <a href="{{route('items.save',['item_id'=>$item->id,'status'=>1])}}" class="btn-sm btn btn-warning">
                                <i class="fa fa-times-circle" aria-hidden="true"></i> Finalizar
                            </a>
                        </td>
                        <td class="text-lg-center">
                            <a href="{{route('items.destroy',['item_id'=>$item->id])}}" class="btn-sm btn text-danger btn-outline-secondary">
                                <i class="fa fa-times-circle" aria-hidden="true"></i> excluir
                            </a>
                        </td>
                    </tr>

                    </tbody>
                </table>
                @include('academy::_partial.modal_item')
            @empty

                <p class="alert alert-info text-uppercase"><small>Não Encontrado</small></p>

            @endforelse
        </div>
    </div>

@endsection
