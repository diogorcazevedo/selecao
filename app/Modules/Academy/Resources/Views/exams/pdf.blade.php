<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{--
    <link href="{{asset('css/bootstrap_4/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap_4/bootstrap.js')}}"></script>
    --}}
    <style>
        .square {
            margin-top: 3px;
            width: 15px;
            height: 15px;
            border: solid 1px #000;
            margin-left: 1%;
        }
        .part {
            width: 60%;
        }
        .part2 {
            width: 25%;
        }
        .part3 {
            width: 30%;
        }
        .padding5{
            padding:5%;
        }
        .margin-top{
            margin-top: 1%;
        }

        .page-break {
            /*page-break-after: always;*/
            page-break-inside: avoid;

        }
    </style>
</head>
<body style="font-size: 13px;">

<?php $count = 1; $alternativa = 1; ?>

    <div class="page-break" >
        <div style="border: solid 1px #000;">
            <span style="display: inline-block; margin-left: 5%; margin-top: 1%;" class="part">{{$job->name}}</span>
            <span style="display: inline-block; margin-left: 10%; margin-right: 5%; margin-top: 1%;" class="part3">|||||||||||||||||||||</span>
            <div style="clear: both;"></div>
            <span style="display: inline-block; margin-left: 5%;" class="part">SILVA DA SILVA</span>
            <span style="display: inline-block; margin-left: 10%; margin-right: 5%;" class="part3">CPF:000.000.000-00</span>
            <div style="clear: both;"></div>
            <span style="display: inline-block; margin-left: 5%;" class="part3">UNOPAR-LINHARES</span>
            <span style="display: inline-block; margin-left: 5%;" class="part2">SALA 5</span>
            <span style="display: inline-block; margin-left: 5%;" class="part2">CADEIRA 1</span>
        </div>

        <div style="margin-left: 25%;">
        @for ($i = 1; $i < 21; $i++)

            @if($i < 10)
                <span>0{{$i}}</span>
            @else
                <span>{{$i}}</span>
            @endif
            <p style="display: inline-block;" class="square"></p>
            <p style="display: inline-block;" class="square"></p>
            <p style="display: inline-block;" class="square"></p>
            <p style="display: inline-block;" class="square"></p>
            <p style="display: inline-block;" class="square"></p>


            <span style="display: inline-block; margin-left: 10%;">{{$i + 20}}</span>
            <p style="display: inline-block;" class="square"></p>
            <p style="display: inline-block;" class="square"></p>
            <p style="display: inline-block;" class="square"></p>
            <p style="display: inline-block;" class="square"></p>
            <p style="display: inline-block;" class="square"></p>


            <br/>


        @endfor
    </div>
    </div>
<div style="page-break-before: always;"></div>
<div style="page-break-after: always;"></div>

<div class="padding5">

    @foreach($job->items()->orderBy('item_job.created_at')->get() as $item)
        <div class="">
            @if(count($item->images->where('position',1)) > 0)
                @foreach($item->images as $image)
                    <p><img src="{{asset('uploads/images/items/'.$item->id.'/'.$image->id.'.'.$image->extension)}}" width="600"/></p>
                @endforeach
            @endif

                {!!$item->description!!}

            @if(count($item->images->where('position',2)) > 0)
                @foreach($item->images as $image)
                    <p><img src="{{asset('uploads/images/items/'.$item->id.'/'.$image->id.'.'.$image->extension)}}" width="600"/></p>
                @endforeach
            @endif
        </div>
        <br/>
        @foreach($item->questions as $question)
            <div class="page-break">
                <p>{{$count++}}: {!!preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $question->description)!!}</p>

                @foreach($question->choices as $choice)
                    @if($choice->status == 1)
                     <p>  <b>{{alternative($alternativa++)}} {!!preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $choice->description)!!}</b></p>
                    @else
                        <p>{{alternative($alternativa++)}} {!!preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $choice->description)!!}</p>
                    @endif
                @endforeach
            </div>
            <br/>
            <?php $alternativa = 1; ?>
        @endforeach
    @endforeach

</div>


</body>
</html>