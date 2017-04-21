<div class="row">
    <div class="collapse" id="registers">
        <br/>
        <span class=" dropdown dropdown-menu-left">
            <a class="btn btn-outline-blue-cavaleiros btn-sm nav-item" href="#" id="registry" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small> HOMOLOGAÇÃO</small>
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="registry">
                @foreach($projects->where('status','>',0) as $project)
                    <br/>
                    <p><a class="dropdown-item btn btn-outline-blue-cavaleiros btn-sm" href="{{route('homologation.index',['project'=>$project->id])}}">{{$project->sponsor->alias}}</a></p>
                @endforeach
            </div>
        </span>
    </div>
</div>