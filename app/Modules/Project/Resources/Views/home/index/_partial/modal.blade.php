<td colspan="3">
    <br/>
    <a href="#modalDate{{$job->id}}" data-toggle="modal" data-target="#modalDate{{$job->id}}" class="btn btn-sm btn-outline-secondary text-blue-cavaleiros"><i class="fa fa-calendar" aria-hidden="true"></i> data e horário</a>
    @include('project::home.index._partial.date')

    <a href="#modalBoard{{$job->id}}" data-toggle="modal" data-target="#modalBoard{{$job->id}}" class="btn btn-sm btn-outline-secondary text-blue-cavaleiros"><i class="fa fa-edit " aria-hidden="true"></i> provas</a>
    @include('project::home.index._partial.board')

    <a href="#modalProgram{{$job->id}}" data-toggle="modal" data-target="#modalProgram{{$job->id}}" class="btn btn-sm btn-outline-secondary text-blue-cavaleiros"><i class="fa fa-graduation-cap " aria-hidden="true"></i> programa</a>
    @include('project::home.index._partial.program')

    <a href="#modalBonus{{$job->id}}" data-toggle="modal" data-target="#modalBonus{{$job->id}}" class="btn btn-sm btn-outline-secondary text-blue-cavaleiros"><i class="fa fa-money " aria-hidden="true"></i> benefícios</a>
    @include('project::home.index._partial.bonus')

    <a href="#modalRequirement{{$job->id}}" data-toggle="modal" data-target="#modalRequirement{{$job->id}}" class="btn btn-sm btn-outline-secondary text-blue-cavaleiros"><i class="fa fa-id-card " aria-hidden="true"></i> requisitos</a>
    @include('project::home.index._partial.requirement')

    <a href="#modalInfo{{$job->id}}" data-toggle="modal" data-target="#modalInfo{{$job->id}}" class="btn btn-sm btn-outline-secondary text-blue-cavaleiros"><i class="fa fa-info-circle " aria-hidden="true"></i> informações</a>
    @include('project::home.index._partial.info')
    <br/>
    <br/>

</td>