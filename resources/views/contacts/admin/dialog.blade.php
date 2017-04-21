@extends('_layouts.app')

<?php
$name =  primeiroNome($order->user->name);
$profile =  $order->profile;
?>

@section('content')

    @foreach($errors->all() as $error)
        <p class="text-lg-center text-uppercase alert alert-danger"><small>{{$error}}</small></p>
    @endforeach
    <div class="container">
        <div class="row">
            @foreach($order->notes as $note)

                @if($note->status == 0)
                    <div class="col-lg-7">
                        <div class="card card-8"  style="padding: 2%;">
                            <p class="offset-md-1"><small>{{primeiroNome($order->user->name)}}</small></p>
                            <p class="offset-md-1">
                                {!! $note->description !!}
                            </p>
                            @if(count($note->docs)>0)
                                <hr/>
                                @foreach($note->docs as $doc)
                                    <p class="text-lg-center">
                                        <a class="btn btn-sm btn-outline-secondary" href="{{asset('uploads/documents/orders/'.$doc->order_id.'/'.$doc->id.'.'.$doc->extension)}}" download>
                                            <i class="fa fa-file-text text-blue-instituto" aria-hidden="true"></i> {{$doc->name}}
                                        </a>
                                    </p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                @else
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <div class="offset-md-5 col-md-7">
                        <div class="card card-8 card-success"  style="padding: 2%;">
                            <p class="offset-md-1 text-uppercase"><small><b>{{primeiroNome($note->agent)}}</b></small></p>
                            <p class="offset-md-1">
                                {!! $note->description !!}
                            </p>
                            @if(count($note->docs)>0)
                                <hr/>
                                @foreach($note->docs as $doc)
                                    <p class="text-lg-center">
                                        <a class="btn btn-sm btn-outline-blue-instituto" href="{{asset('uploads/documents/orders/'.$doc->order_id.'/'.$doc->id.'.'.$doc->extension)}}" download>
                                            <i class="fa fa-file-text" aria-hidden="true"></i> {{$doc->name}}
                                        </a>
                                    </p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                @endif
            @endforeach
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                {!! Form::open(['route'=>['contacts.get.notes.store',$order->id],'enctype'=>'multipart/form-data']) !!}


                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::textarea('description',null,['class'=>'form-control','value'=> old('description')]) !!}
                    @if ($errors->has('description'))
                        <span class="help-block">
                             <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                {!! Form::hidden('order_id',$order->id) !!}
                {!! Form::hidden('status',1) !!}
                {!! Form::hidden('agent',auth()->user()->name) !!}

                <div class="container">
                    <div class="row">
                        <div class="form-group col-md-7">
                            {!! Form::file('image',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group offset-md-2 col-md-3 ">
                            {!! Form::submit('Enviar',['class'=>'btn btn-blue-cavaleiros']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close()!!}
            </div>
            <div class="col-lg-5">
                <p class="bg-faded text-lg-center">EDIÇÕES</p>
                @include("contacts.admin.modal.dadospessoais")
                <button class="btn btn-blue-logo btn-sm card-8 pull-lg-right " data-toggle="modal" data-target="#dadospessoais"> DADOS PESSOAIS</button>
                <br/>
                <br/>
                <br/>
                <div>
                    @foreach($user->registers as $row)
                        <button class="btn btn-warning btn-sm card-8 pull-lg-right " data-toggle="modal" data-target="#concursos{{$row->id}}">{{$row->job->name}}</button>
                        @include("contacts.admin.modal.concursos")
                        <br/>
                        <br/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

    <br/>
    <br/>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#focusedDiv").css('outline',0).attr('tabindex',-1).focus();

        });
    </script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>


    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],

            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
            //toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",


            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };


        tinymce.init(editor_config);
    </script>
@endsection

