@if(isset($items))
    <div class="modal fade" id="program{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel"><strong>Item com: {{count($item->questions)}} perguntas</strong>
                    </p>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <table class="table table-bordered background-white table-sm table-striped">
                            <thead class="bg-warning text-white">
                            <th class="text-lg-center"><small>conteúdo programático</small></th>
                            </thead>
                            <tbody>
                            @foreach($item->programItems as $programItem)
                                <tr>
                                    <td><small><small>{{$programItem->name}}</small></small></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
@endif