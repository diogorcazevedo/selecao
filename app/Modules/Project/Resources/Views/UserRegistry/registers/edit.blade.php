@extends('admin::layout.app')

@section('content')


    {!! Form::model($register,['route'=>['admin.project.registers.update',$register->id]]) !!}


    @include('project::registers.partial._form')


    {!! Form::close()!!}

@endsection


@section('footer')
    <link href="{{asset('assets/select/css/select2.min.css')}}" rel="stylesheet">
    <script src="{{asset("assets/select/js/select2.min.js")}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#select").select2();
        });
    </script>

@endsection