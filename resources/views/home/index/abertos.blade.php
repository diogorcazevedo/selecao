<div class="ribbon-wrapper-green">
    <p class="text-title text-lg-center ribbon-warning"><br/> Inscrições</p>
</div>
<br/>
<div class="container">
    <div class="row">
        @foreach($projects->where('status',2) as $project)
            <div class="col-sm">
                <div class="card card-block card-8">
                    <br/>
                    @if(count($project->images)>0)
                        <div class="card card-block">
                            <a style="text-decoration: none;" href="{{route("project.home.index",['slug'=>$project->slug])}}">
                                <p class="text-lg-center">
                                    <img class="img-fluid" src="{{asset('uploads/images/projects/'.$project->id.'/'.$project->images->where('file_images_id',2)->first()->id.'.'.$project->images->where('file_images_id',2)->first()->extension)}}" />
                                </p>
                            </a>
                            <br/>
                            <p class="text-lg-center">
                                <a href="{{route("project.home.index",['slug'=>$project->slug])}}" class="btn btn-sm btn-success"><i class="fa fa-sign-out" aria-hidden="true"></i> inscrições</a>
                                {{--     <a href="{{route("admin.project.registers.segundaVia.getRegistersByCPF")}}" class="btn btn-sm btn-warning"><i class="fa fa-barcode" aria-hidden="true"></i> 2ª via boleto</a>--}}
                            </p>
                        </div>

                        @include("home.index._extras.crefito",['project'=>$project])
                    @else
                        <p>INSERIR IMAGEM !!!!</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <br/>
    <br/>
</div>


