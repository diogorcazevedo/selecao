<div class="modal fade" id="modalProgram{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


                <h4 class="modal-title bg-faded text-lg-center"><small>{{$job->name}}<br/></small></h4>

            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">

                        @foreach($job->programs as $program)

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">

                                        <p>{{$program->name}} - {{$program->type == 0 ? 'Conhecimento Geral' : 'Conhecimento Específico' }} </p>

                                    </div>
                                    <div class="card-block">
                                        <div style="page-break-after: always;">
                                            @foreach($program->programItems as $item)
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <span style="text-transform: uppercase;"><small>{{$item->name}}</small></span>
                                                        @foreach($item->sub_items as $sub)
                                                            : <span style="text-transform: uppercase;"> <small>{{$sub->name}}</small></span>,
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <hr/>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        <div style="clear: both;"></div>
                        <br/>
                        <br/>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <p class="pull-lg-right"> <i class="fa fa-graduation-cap fa-3x" aria-hidden="true"></i></p>
            </div>
        </div>
    </div>
</div>