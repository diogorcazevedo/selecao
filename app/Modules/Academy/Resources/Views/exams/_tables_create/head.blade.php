<table class="table table-bordered background-white table-sm card-24">
    <thead>
    <th class="text-lg-center"><small>Cargo:</small></th>
    <th class="text-lg-center"><small>Área</small></th>
    <th class="text-lg-center"><small>Conteúdo programático</small></th>
    <th class="text-lg-center"><small>Qtd prova</small></th>
    <th class="text-lg-center"><small>Qtd selecionada</small></th>
    <th class="text-lg-center"><small>Visualizar</small></th>
    <th class="text-lg-center"><small>Áreas</small></th>
    </thead>
    <thead class="bg-blue-cavaleiros text-white">
    <th class="text-lg-center"><small><small>{{$job->name}}</small></small></th>
    <th class="text-lg-center"><small><small>{{$program->name}}</small></small></th>
    <th class="text-lg-center"><small><small>{{$program->jobProgram->name}}</small></small></th>
    <th class="text-lg-center"><small>{{$program->jobProgram->qtd}}</small></th>
    <th class="text-lg-center bg-success"><small>{{$count}}</small></th>
    <td class="text-lg-center">
        <a href="{{route('exams.preview',['job'=>$job->id])}}" class="btn btn-sm  btn-style btn-secondary">
            <small> <i class="fa fa-search-plus" aria-hidden="true"></i></small>
        </a>
    </td>
    <th class="text-lg-center">
        <small>
            <a href="#" class="btn btn-outline-secondary btn-sm text-uppercase" data-toggle="modal" data-target="#exams{{$job->id}}">
                <small>Alterar</small>
            </a>
        </small>
    </th>
    </thead>
</table>
<br/>

<div class="modal fade" id="exams{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel"><strong>Provas por Cargo</strong>
                    <button type="button" class="close pull-lg-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </p>
            </div>
            <div class="modal-body">
                @foreach($job->programs as $name)
                    <a href="{{route('exams.create',['job'=>$job->id,'program'=>$name->program->id])}}" class="btn btn-outline-secondary text-blue-cavaleiros btn-group text-uppercase">
                        <small>{{$name->name}}</small>
                    </a>
                    <br/>
                    <br/>
                @endforeach
            </div>
        </div>
    </div>
</div>