<br/>
<div class="container">
    <div class="row">
        @foreach($project->jobs as $job)
            <table class="table table-bordered card-24">

                <tbody>

                <tr class="bg-faded">
                    <td><small><strong>{{$job->name}}</strong></small></td>
                    <td><small>{{$job->license}}</small></td>
                    <td>
                        @if($job->project->status != '2')

                            <p class="bg-faded"><small> encerradas</small></p>

                        @else

                                <p class="text-lg-center"> <a href="#modal{{$job->id}}" data-toggle="modal" data-target="#modal{{$job->id}}" class="btn btn-sm btn-warning"><i class="fa fa-plus-square" aria-hidden="true"></i>  Inscrição</a></p>

                                @include('project::home.index._partial.inscricao')

                        @endif
                    </td>

                </tr>
                <tr>
                    @include('project::home.index._partial.modal')
                    <br/>
                    <br/>
                </tr>
                </tbody>
            </table>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
        @endforeach
    </div>
</div>