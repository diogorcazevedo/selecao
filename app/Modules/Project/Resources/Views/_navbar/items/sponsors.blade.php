@can('permissao_sponsor')
        <span class=" dropdown dropdown-menu-left">
            <a class="btn btn-outline-warning btn-sm nav-item" href="#" id="projects" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small> FINANCEIRO </small>
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="projects">
                @foreach(auth()->user()->sponsor->projects as $project)
                    <br/>
                    <p><a class="dropdown-item btn btn-outline-warning btn-sm" href="{{route('financial.transactions.index',['project'=>$project->id])}}">{{$project->sponsor->alias}}</a></p>
                @endforeach
            </div>
        </span>
        <span class=" dropdown dropdown-menu-left">
            <a class="btn btn-outline-warning btn-sm nav-item" href="#" id="projects" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small> INSCRIÇÕES </small>
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="projects">
                @foreach(auth()->user()->sponsor->projects as $project)
                    <br/>
                    <p><a class="dropdown-item btn btn-outline-warning btn-sm" href="{{route('financial.transactions.index',['project'=>$project->id])}}">{{$project->sponsor->alias}}</a></p>
                @endforeach
            </div>
        </span>
        <span class=" dropdown dropdown-menu-left">
            <a class="btn btn-outline-warning btn-sm nav-item" href="#" id="projects" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small> INSCRITOS POR LOCAL</small>
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="projects">
                @foreach(auth()->user()->sponsor->projects as $project)
                    <br/>
                    <p><a class="dropdown-item btn btn-outline-blue-cavaleiros btn-sm" href="{{route('reports.registers.cities',['project'=>$project->id])}}">{{$project->sponsor->alias}}</a></p>
                @endforeach
            </div>
        </span>
        <span class=" dropdown dropdown-menu-left">
            <a class="btn btn-outline-warning btn-sm nav-item" href="#" id="projects" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small> INSCRITOS POR CARGO</small>
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="projects">
                @foreach(auth()->user()->sponsor->projects as $project)
                    <br/>
                    <p><a class="dropdown-item btn btn-outline-blue-cavaleiros btn-sm" href="{{route('reports.registers.jobs',['project'=>$project->id])}}">{{$project->sponsor->alias}}</a></p>
                @endforeach
            </div>
        </span>
@endcan