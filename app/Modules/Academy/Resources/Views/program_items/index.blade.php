@extends('_layouts.app')

@section('content')

    <div class="container">

    <div class="row">
        <div class="col-lg-4 ">
            <a href="{{route('programs.index')}}" class="text-blue-instituto">
                <p class="alert-info alert"><small><i class="fa fa-graduation-cap fa-3x" aria-hidden="true"></i> {{$program->name}}</small></p>
                <span class="alert alert-info"><small>número de linhas: {{$program->count()}}</small></span>
                <span class="btn btn-info pull-lg-right">Voltar</span>
            </a>
        </div>
        <div class="col-md-8">

            {{ Form::open(['route'=>['programs.items.store',$program->id],'method'=>'post']) }}

        <div class="container">
            <div class="row">
                {{ Form::hidden('url',$url)}}
                {{ Form::hidden('program_id',$program->id)}}
                <textarea class="form-control  col-md-10" name="name"  placeholder="criar item" rows="2"></textarea>
                <button class="col-md-2 btn btn-warning btn-sm"  type="submit">
                    Salvar
                </button>
            </div>
        </div>
        {{ Form::close()}}
        </div>
    </div>
    <br/>
    <br/>

    @foreach($program->items as $item)
        <table class="table table-bordered">

            <tbody>

                <tr>
                    <td class="text-uppercase  bg-faded"><small> {{$item->name}}</small></td>
                    <td class="text-lg-center bg-faded">
                        <a class="text-blue-instituto btn btn-sm btn-outline-secondary" href="{{route('programs.items.edit',['id'=>$item->id])}}">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                            editar
                        </a>
                    </td>
                    <td class="text-lg-center bg-faded">
                        <a href="{{route('programs.items.destroy',['id'=>$item->id])}}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-lg-center bg-faded">
                        <a class="pull-lg-right text-blue-instituto btn btn-sm btn-outline-secondary" href="{{route('programs.sub_items.index',['item_id'=>$item->id])}}">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Sub-Itens
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <br/>  <br/>
    @endforeach
    </div>
@endsection