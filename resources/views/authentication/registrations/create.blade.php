@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-24">
                <div class="card-block">
                    <br/>
                     {{ Form::open(['route'=>['authentication.registrations.store',$job->id], 'role'=>"form"]) }}
                        @include('_partial._forms.users',['form' => 'registrations'])
                     {{ Form::close()}}
                    <br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
