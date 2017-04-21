@if(Auth::check())
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

                                @if(count(auth()->user()->registers()->where('job_id',$job->id)->get()) > 0)

                                        @if(count(auth()->user()->registers()->where(['job_id'=>$job->id,'active'=>'1'])->get()) > 0)
                                            <p><small>Inscrição deferida</small></p>
                                            <a href="{{route('project.home.client')}}" class="btn-sm btn btn-blue-logo">
                                                <i class="fa fa-search-plus" aria-hidden="true"></i> visualizar
                                            </a>
                                        @else
                                            <a href="{{route('project.registers.preview',['register'=>auth()->user()->registers()->where('job_id',$job->id)->first()->id])}}" class="btn btn-sm btn-warning text-blue-instituto"><i class="fa fa-barcode" aria-hidden="true"></i> 2ª via - boleto</a>
                                        @endif
                                  @else

                                      <p class="text-lg-center"><a href="{{route('project.registers.create' ,['user'=>auth()->user()->id,'job'=>$job->id])}}" class="btn btn-success btn-sm text-blue-instituto"><i class="fa fa-plus-square" aria-hidden="true"></i> Inscrição</a></p>

                                @endif
                            @endif
                        </td>

                    </tr>
                    <tr>
                        @include('project::home.index._partial.modal')
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
@endif