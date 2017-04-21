<div class="row">
    @if(isset($item))
    <div class="col-sm">
        <p class="text-lg-center text-uppercase  bg-inverse">
            <small>
                <span class="text-warning">{{primeiroNome($item->user->name)}}</span>
            </small>
        </p>
    </div>
    @endif
    <div class="col-sm-4">
        <p class="text-lg-center text-uppercase  bg-inverse">
            <small>
                Área:
                <span class="text-warning">{{$program->name}}</span>
            </small>
        </p>
    </div>
    @if(isset($item))
        <div class="col-sm">
            <p class="text-lg-center text-uppercase bg-inverse">
                <small>
                    <span class="text-white">{{status($item->status)}}</span>
                </small>
            </p>
        </div>
    @endif
    @if(isset($item))
    <div class="col-sm">
        <a class="btn btn-secondary btn-sm" href="#"  data-toggle="modal" data-target="#exampleModal{{$item->id}}">
            <i class="fa fa-search-plus" aria-hidden="true"></i> <small>VISUALIZAR</small>
        </a>
    </div>
    @endif
    <div class="col-sm">
        <a class="btn btn-blue-cavaleiros btn-sm" href="#" data-toggle="modal" data-target="#createItem">
            <i class="fa fa-plus-square" aria-hidden="true"></i> <small>CRIAR NOVO ITEM</small>
        </a>
    </div>
    @if(isset($item))
    <div class="col-sm">
        <a class="btn btn-warning btn-sm pull-right" href="{{route('items.save',['item_id'=>$item->id,'status'=>1])}}">
            <i class="fa fa-cogs" aria-hidden="true"></i> <small>FINALIZAR</small>
        </a>
    </div>
    @endif
</div>
<br/>

@include('academy::rails._partial.create')
@include('academy::_partial.modal_item')
