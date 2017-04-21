@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-24">
                    <div class="card-block">
                        <br/>
                        {{ Form::open(['route'=>['project.registers.store']]) }}

                        <div class="offset-md-1 col-md-10">
                            <p class="bg-faded text-md-center text-blue-cavaleiros"><br/>{{$job->name}}<br/><br/></p>

                            @include('_partial._forms._inputs.registers.needs')
                            <br/>
                            @include('_partial._forms._inputs.registers.quotas')
                            <br/>
                            @include('_partial._forms._inputs.registers.handicapped')
                            <br/>
                            @include('_partial._forms._inputs.registers.local')
                            <br/>

                            {{ Form::hidden('job_id',$job->id)}}
                            {{ Form::hidden('url',$url)}}
                            {{ Form::hidden('user_id',$user->id)}}

                            <div class="form-group pull-lg-right ">
                                <br/>
                                {{ Form::submit('Salvar',['class'=>'btn btn-blue-cavaleiros pull-right']) }}
                                <br/>
                                <br/>
                            </div>
                        </div>

                        {{ Form::close() }}
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection