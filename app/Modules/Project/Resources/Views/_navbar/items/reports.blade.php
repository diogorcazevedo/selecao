<div class="row">
    <div class="collapse" id="reports">
        <br/>
          <span class=" dropdown dropdown-menu-left">
            <a class="btn btn-outline-blue-cavaleiros btn-sm nav-item" href="#" id="projects" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small> LOCAL</small>
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="projects">
                @foreach($projects->where('status','>',0) as $project)
                    <br/>
                    <p><a class="dropdown-item btn btn-outline-blue-cavaleiros btn-sm" href="{{route('reports.registers.cities',['project'=>$project->id])}}">{{$project->sponsor->alias}}</a></p>
                @endforeach
            </div>
        </span>
        <span class=" dropdown dropdown-menu-left">
            <a class="btn btn-outline-blue-cavaleiros btn-sm nav-item" href="#" id="projects" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small> CARGOS</small>
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="projects">
                @foreach($projects->where('status','>',0) as $project)
                    <br/>
                    <p><a class="dropdown-item btn btn-outline-blue-cavaleiros btn-sm" href="{{route('reports.registers.jobs',['project'=>$project->id])}}">{{$project->sponsor->alias}}</a></p>
                @endforeach
            </div>
        </span>
        <span class=" dropdown dropdown-menu-left">
            <a class="btn btn-outline-blue-cavaleiros btn-sm nav-item" href="#" id="projects" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small> PUBLICIDADE</small>
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="projects">
                @foreach($projects->where('status','>',0) as $project)
                    <br/>
                    <p><a class="dropdown-item btn btn-outline-blue-cavaleiros btn-sm" href="{{route('financial.transactions.index',['project'=>$project->id])}}">{{$project->sponsor->alias}}</a></p>
                @endforeach
            </div>
        </span>
    </div>
</div>