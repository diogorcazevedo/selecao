@extends('admin::layout.app')

@section('content')

    <div class="container">
        {!! Form::open(['route'=>['admin.project.registers.slips.storeDate',$register->id]]) !!}


        @include('project::registers.assets._slips.partial._form')


        {!! Form::close()!!}
    </div>

@endsection
