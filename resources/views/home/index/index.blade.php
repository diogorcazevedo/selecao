@extends('_layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if(count($projects->where('status',2))>0)
                    <div class="col-lg-12 card card-8 card-block ">
                        @include("home.index.abertos")
                    </div>
                @endif
            </div>
            <div class="col-lg-4">
                @if(count($projects->where('status',3))>0)
                    <div class="card card-8 card-block ">
                        @include("home.index.game")
                    </div>
                @endif
            </div>

        </div>
    </div>
    <br/><br/>
    <div class="seta-gray"></div>
    <div class="container-fluid background-white">
        <br/><br/>
        @include("home.index.previstos")
        <br/><br/>
        <div class="seta-white"></div>
    </div>
    <div class="container-fluid">
        <br/><br/>
        @include("home.index.footer")
        <br/><br/>
    </div>


@endsection