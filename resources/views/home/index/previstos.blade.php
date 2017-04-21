<div class="container">
    <div class="row">
        <div class="col-lg-12 card card-block ">
            <div class="ribbon-wrapper-green">

                <p class="text-title text-lg-center ribbon-cavaleiros"><br/> Previstos</p>

            </div>
            <br/>
            <div class="col-lg-12">
                @foreach($projects->where('status',1) as $project)

                    <div class=" col-lg-6 center-block">
                        <div  class="card card-block">
                            <p class="text-uppercase bg-faded text-lg-center">
                                <small>{{$project->description}}</small>
                            </p>
                            @if(count($project->images)>0)
                                <p class="text-lg-center">
                                    <img class="img-fluid" src="{{asset('uploads/images/projects/'.$project->id.'/'.$project->images->where('file_images_id',2)->first()->id.'.'.$project->images->where('file_images_id',2)->first()->extension)}}"/>
                                </p>
                            @else
                                <p class="text-lg-center">
                                    <img src="{{asset('assets/img/logos/callback_default.png')}}" width="100"/>
                                </p>
                            @endif
                        </div>
                    </div>


                @endforeach
            </div>

            <div style="clear: both;"></div>

        </div>
    </div>
</div>

