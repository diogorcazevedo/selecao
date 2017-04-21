<div class="modal fade" id="createItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="text-lg-center"><b>CONSTRUÇÃO DE ITENS</b></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                    @foreach($programs as $program)
                        <tr>
                            <td><small><b>{{$program->name}}</b></small></td>
                            <td class="text-uppercase"><small>{{$program->description}}</small></td>
                            <td>
                                <a href="{{route('rails.index',['program_id'=>$program->id])}}" class="btn-sm btn text-blue-cavaleiros btn-outline-secondary">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Construir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>