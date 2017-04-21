<p class="text-title bg-info text-lg-center  card-24"><small>MINHAS INSCRIÇÕES</small></p>
@foreach(auth()->user()->registers as $register)
    <div class="card card-block card-outline-info card-24">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr class="bg bg-faded">
                    <th class="text-lg-center"><small>{{$register->job->name}}</small></th>
                </tr>
                </thead>
            </table>
        </div>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered background-white">
                        <thead>
                        <tr>
                            <th class="text-lg-center"><small><b>Inscrição</b></small></th>
                            <th class="text-lg-center"><small><b>Necessidades especiais</b></small></th>
                            <th class="text-lg-center"><small><b>Cota</b></small></th>
                            <th class="text-lg-center"><small><b>Portador de Deficiência</b></small></th>
                            <th class="text-lg-center"><small><b>Local de prova</b></small></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-lg-center"><small>{{$register->id}}</small></td>
                            <td class="text-lg-center"><small>{{$register->user_needs == 0 ? 'sem necessidades' : "necessidade solicitada -   $register->user_needs_description" }}</small></td>
                            <td class="text-lg-center"><small>{{$register->user_quota == 0 ? 'não' : 'sim' }}</small></td>
                            <td class="text-lg-center"><small>{{$register->user_handicapped == 0 ? 'não' : 'sim' }}</small></td>
                            <td class="text-lg-center">
                                <small>
                                    {{arraylocais()["$register->local"]}}
                                </small>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12">
                    @if($register->active == 0)
                        <table class="table table-bordered">
                            <thead>
                            <tr class="bg bg-faded">
                                <th class="text-lg-center"><small><b>Situação</b></small></th>
                                <th class="text-lg-center"><small><b>Ações</b></small></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-lg-center text-warning"><small>Inscrição não confirmada</small></td>
                                <td class="text-lg-center">
                                    <a href="{{route('project.registers.preview',['register'=>$register->id])}}" class="btn-sm btn btn-warning">
                                        <i class="fa fa-search-plus" aria-hidden="true"></i> Gerar Boleto
                                    </a>
                                    {{--
                                        @if($register->job->project->isencao == 1)
                                            <hr/>
                                            <a href="{{route('admin.project.registers.preview',['id'=>$register->id])}}" class="btn-sm btn btn-secondary">
                                                <i class="fa fa-search-plus" aria-hidden="true"></i> soliciar isenção
                                            </a>
                                        @endif
                                     --}}

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    @else
                        <table class="table table-bordered">
                            <thead>
                            <tr class="bg bg-faded">
                                <th class="text-lg-center"><small><b>Situação</b></small></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-lg-center text-blue-instituto"><small>Inscrição confirmada</small></td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

        </div>
    @endforeach
