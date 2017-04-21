@if($project->id == 2)
    <br/>
    <div class="card card-block bg-blue-001c36">
        <div class="container">
            <p class="text-lg-center text-blue-cavaleiros"><small>{{$project->description}}</small></p>
            <hr/>
            <a href="{{route("project.home.index",['slug'=>$project->slug])}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-md-center"> <img src="{{asset('img/bandeiras/bandeiraEspiritoSanto.png')}}" width="60" /></p>
                        </div>
                        {{--
                        <div class="col-lg-6">
                            <p class="text-md-center"><button class="btn btn-warning btn-sm">Novo Cronograma</button>  </p>
                        </div>
                        --}}
                    </div>
                </div>
            </a>
        </div>
    </div>
@elseif($project->id == 5)
    <br/>
    <div class="card card-block bg-blue-001c36">
        <div class="container">
            <p class="text-lg-center text-blue-cavaleiros"><small>{{$project->description}}</small></p>
            <hr/>
            <a href="{{route("project.home.index",['slug'=>$project->slug])}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <p class="text-md-center">  <img  src="{{asset('img/bandeiras/bandeiradePernambuco.png')}}" width="60" /> </p>
                        </div>
                        <div class="col-lg-3">
                            <p class="text-md-center"><img  src="{{asset('img/bandeiras/bandeiradaParaiba.png')}}" width="60"/></p>
                        </div>
                        <div class="col-lg-3">
                            <p class="text-md-center"><img src="{{asset('img/bandeiras/bandeiraRioGrandedoNorte.png')}}" width="60" /></p>
                        </div>
                        <div class="col-lg-3">
                            <p class="text-md-center"><img src="{{asset('img/bandeiras/bandeiradeAlagoas.png')}}" width="60" /></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endif