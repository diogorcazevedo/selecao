@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header text-lg-center">
                    @include('project::applications.schools._config._head')
                </div>
                <div class="card-block">
                    @foreach($school->blocks as $block)
                        <div class="card">
                            <div class="card-header text-lg-center">
                                @include('project::applications.schools._config._block')
                            </div>
                            <br/>
                            @foreach($block->blockfloors as $floor)
                                <div class="card-block">
                                <div class="container">
                                <div class="row">
                                    @include('project::applications.schools._config._floors')
                                </div>
                                </div>
                                </div>
                            @endforeach

                        </div>
                        <br/>
                        <br/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script id="fr-fek">try{(function (k){localStorage.FEK=k;t=document.getElementById('fr-fek');t.parentNode.removeChild(t);})('XE-11vjnrhhjpddqfhc1efgE5eykA3lB-16==')}catch(e){}</script>
    <link href='{{asset('froala/css/froala_editor.min.css')}}' rel='stylesheet' type='text/css' />
    <link href='{{asset('froala/css/froala_style.min.css')}}' rel='stylesheet' type='text/css' />
    <link href='{{asset('froala/css/plugins/colors.min.css')}}' rel='stylesheet' type='text/css' />

    <script src="{{asset('froala/js/froala_editor.min.js')}}"></script>
    <script src="{{asset('froala/js/plugins/font_family.min.js')}}"></script>
    <script src="{{asset('froala/js/plugins/font_size.min.js')}}"></script>
    <script src="{{asset('froala/js/plugins/colors.min.js')}}"></script>
    <script src="{{asset('froala/js/plugins/paragraph_format.min.js')}}"></script>
    <script src="{{asset('froala/js/plugins/paragraph_style.min.js')}}"></script>
    <script src="{{asset('froala/js/plugins/lists.min.js')}}"></script>
    <script src="{{asset('froala/js/plugins/align.min.js')}}"></script>


    <script>
        $(function() {
            $('textarea#froala').froalaEditor({
                toolbarInline: true,
                charCounterCount: false,
                toolbarButtons: ['bold', 'italic', 'underline', 'fontFamily',
                    'font_size', 'strikeThrough', 'color', 'emoticons', '-',
                    'paragraphFormat', 'align', 'formatOL', 'formatUL',
                    'indent', 'outdent', '-', 'insertImage', 'insertLink',
                    'insertFile', 'insertVideo', 'undo', 'redo','inlineStyle',
                    'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL',
                    'formatUL', 'outdent', 'indent']
            })
        });
    </script>
@endsection
