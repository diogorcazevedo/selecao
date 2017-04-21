<!-- Modal -->
<div class="modal fade" id="settings{{$register->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informações sobre a inscrição</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered background-white">
                    <thead>
                    <tr>
                        <th class="text-lg-center"><small><b>Inscrição</b></small></th>
                        <th class="text-lg-center"><small><b>Necessidades especiais</b></small></th>
                        <th class="text-lg-center"><small><b>Cota</b></small></th>
                        <th class="text-lg-center"><small><b>Portador de Deficiência</b></small></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-lg-center"><small>{{$register->id}}</small></td>
                        <td class="text-lg-center"><small>{{$register->user_needs == 0 ? 'sem necessidades' : "necessidade solicitada -   $register->user_needs_description" }}</small></td>
                        <td class="text-lg-center"><small>{{$register->user_quota == 0 ? 'não' : 'sim' }}</small></td>
                        <td class="text-lg-center"><small>{{$register->user_handicapped == 0 ? 'não' : 'sim' }}</small></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>