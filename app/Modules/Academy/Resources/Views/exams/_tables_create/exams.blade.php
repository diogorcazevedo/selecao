<table class="table table-bordered background-white table-sm card-24">
    <thead class="bg-warning text-white">
    <th class="text-lg-center"><small>ID</small></th>
    <th class="text-lg-center"><small>professor</small></th>
    <th class="text-lg-center"><small>perguntas</small></th>
    <th colspan="2" class="text-lg-center"> <small> Ações</small></th>
    <th class="text-lg-center"> <small> Revogar</small></th>
    </thead>
    <tbody>
    @foreach($job->items()->orderBy('item_job.created_at')->get() as $item)
        <tr>
            <td><small>{{$item->id}}</small></td>
            <td class="text-uppercase"><small><small>{{primeiroNome($item->user->name)}}</small></small></td>
            <td class="text-uppercase text-lg-center"><small><small>qtd:</small> {{count($item->questions)}}</small></td>
            <td class="text-lg-center">
                <a href="#" class="btn btn-outline-blue-cavaleiros btn-sm" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                </a>
                @include('academy::_partial.modal_item')
            </td>
            <td class="text-lg-center">
                <a href="{{route('rails.items',['item_id'=>$item->id])}}" class="btn btn-sm  btn-style btn-blue-cavaleiros">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                </a>
            </td>
            <td class="text-lg-right">
                <a href="{{route('exams.revoke',['job'=>$job->id,'item'=>$item->id])}}" class="btn btn-sm  btn-style btn-danger">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                </a>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>