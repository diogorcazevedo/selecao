<table class="table table-bordered table-striped  background-white table-sm card-24">
    <thead class="bg-blue-cavaleiros text-white">
    <th class="text-lg-center"><small>ID</small></th>
    <th class="text-lg-center"><small>professor</small></th>
    <th class="text-lg-center"><small>perguntas</small></th>
    <th class="text-lg-center"><small>descrição</small></th>
    <th class="text-lg-center"><small>descrição</small></th>
    <th  class="text-lg-center"><small>ações</small></th>
    </thead>
    <tbody>
    @foreach($program->itens as $item)
        @if(count($item->job)<1)
            <tr>
                <td><small>{{$item->id}}</small></td>
                <td class="text-uppercase"><small><small>{{primeiroNome($item->user->name)}}</small></small></td>
                <td class="text-uppercase text-lg-center"><small><small>qtd:</small> {{count($item->questions)}}</small></td>
                 <td><small><small> {!! substr($item->description, 0, 40) !!}  </small></small></td>
                <td class="text-lg-center">
                    <a href="#" class="btn-sm btn text-blue-cavaleiros btn-outline-secondary"  data-toggle="modal" data-target="#preview{{$item->id}}">
                        <small> <i class="fa fa-edit" aria-hidden="true"></i> visualizar</small>
                    </a>
                </td>
                <td class="text-lg-center">
                    <a href="{{route('exams.add',['job'=>$job->id,'item'=>$item->id])}}" class="btn-sm btn text-blue-cavaleiros btn-outline-secondary">
                        <i class="fa fa-edit" aria-hidden="true"></i> <small>adicionar</small>
                    </a>
                </td>
            </tr>
            <div class="modal fade" id="preview{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="modal-title" id="exampleModalLabel"><strong>Item {{$item->id}} com: {{count($item->questions)}} perguntas</strong>
                            </p>
                        </div>
                        <div class="modal-body">
                            @include('academy::_partial.loop_item')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span> FECHAR
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    </tbody>
</table>