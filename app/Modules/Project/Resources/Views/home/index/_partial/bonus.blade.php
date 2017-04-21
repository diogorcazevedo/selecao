


<div class="modal fade" id="modalBonus{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title lead bg-faded"><b>{{$job->name}}</b></h4>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-12 text-lg-center">

                                <div class="offset-lg-2 col-lg-8 text-lg-center">
                                    <table class="table table-bordered table-sm card-8" style=" text-align: center;  ">
                                        <thead>
                                        <tr class="bg-faded">
                                            <br/>
                                            <br/>
                                            <th class="text-lg-center"><small><b>Benefícios</b></small></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($job->bonus as $round)
                                            <tr>
                                                <td><br/>{{$round->name}}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div style="clear: both;"></div>
                                <br/>
                                <br/>
                        </div>
                    </div>

                <div class="modal-footer">
                    <p class="pull-lg-right"> <i class="fa fa-money fa-3x" aria-hidden="true"></i></p>
                </div>
            </div>
        </div>
    </div>
</div>