@php  $count = 1; @endphp
<br/>

<div class="bg-faded">
    <br/>
    <div class="row">
        <p class="col-sm-12 text-lg-center">
            <a href="#" class="btn  btn-blue-cavaleiros"  data-toggle="modal" data-target="#program{{$item->id}}">
                <small> <i class="fa fa-edit" aria-hidden="true"></i> Conteúdo Programático</small>
            </a>
        </p>
    </div>
    <br/>
</div>


<div class="modal fade" id="program{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel"><strong>ITEM COM: {{count($item->questions)}} perguntas</strong>
                </p>
            </div>
            <div class="modal-body">
                <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <table class="table table-bordered background-white table-sm card-8">
                            <thead class="bg-blue-cavaleiros text-white">
                            <th class="text-lg-center"><small>conteúdo</small></th>
                            <th class="text-lg-center"><small>ações</small></th>
                            </thead>

                            <tbody>
                            @foreach($program->items as $programItem)
                                    <tr>
                                        <td><small><small>{{$programItem->name}}</small></small></td>
                                        @if($count < $program->jobProgram->qtd)
                                            <td class="text-lg-center">
                                                <a href="{{route('items.addProgram',['programitems'=>$programItem->id,'item'=>$item->id])}}" class="btn-sm btn btn-blue-cavaleiros">
                                                    <i class="fa fa-edit" aria-hidden="true"></i> <small>adicionar</small>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-bordered background-white table-sm card-8">
                            <thead class="bg-warning text-white">
                            <th class="text-lg-center"><small>conteúdo</small></th>
                            <th class="text-lg-center"><small>ações</small></th>
                            </thead>
                            <tbody>
                            @foreach($item->programItems as $programItem)
                                <tr>
                                    <td><small><small>{{$programItem->name}}</small></small></td>
                                    @if($count < $program->jobProgram->qtd)
                                        <td class="text-lg-center">
                                            <a href="{{route('items.revokeProgram',['programitems'=>$programItem->id,'item'=>$item->id])}}" class="btn-sm btn btn-danger">
                                                <i class="fa fa-edit" aria-hidden="true"></i> <small>Revogar</small>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> FECHAR
                </button>
            </div>
        </div>
    </div>
</div>


