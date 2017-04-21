@extends('_layouts.app')

@section('content')

    <div class="container">
        @include('academy::rails._head',['program'=>$item->program])
        <div class="card card-block">
            @include('academy::rails._partial.item')
        </div>
        <br/>
        <br/>
        <br/>

        @foreach($item->questions as $question)
            <div class="card card-block">
                @include('academy::rails._partial.text')
                <br/>
                <br/>
                <br/>
                @include('academy::rails._partial.choices')
                <br/>
                <br/>
                @include('academy::rails._partial.justificativa')
                <br/>
                @include('academy::rails._partial.program',['program'=>$item->program])
            </div>
            <br/>
            <br/>
            <br/>
        @endforeach
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