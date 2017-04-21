<html>
<head>
    <link href="{{asset('css/bootstrap_4/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap_4/bootstrap.js')}}"></script>
    <style>
        .square {
            margin-top: 2%;
            width: 30px;
            height: 30px;
            border: solid 1px #000;
            margin-left: 1%;
        }
        .padding5{
            padding:5%;
        }
        .margin-top{
            margin-top: 1%;
        }
    </style>
</head>
<body class="padding5" style="border: 20px solid #cccccc">


<div class="padding5">

    <h4 class="alert alert-info">{{$user->name}}</h4>

    @for ($i = 1; $i < 11; $i++)

        @if($i < 10)
            <span>0{{$i}}</span>
        @else

            <span>{{$i}}</span>
        @endif
        <p style="display: inline-block;" class="square "></p>
        <p style="display: inline-block;" class="square"></p>
        <p style="display: inline-block;" class="square"></p>
        <p style="display: inline-block;" class="square"></p>
        <p style="display: inline-block;" class="square"></p>

        <span class="margin-top" style="display: inline-block; margin-left: 10%;">{{$i + 10}}</span>
        <p style="display: inline-block;" class="square"></p>
        <p style="display: inline-block;" class="square"></p>
        <p style="display: inline-block;" class="square"></p>
        <p style="display: inline-block;" class="square"></p>
        <p style="display: inline-block;" class="square"></p>


        <br/>


    @endfor






</div>


</body>
</html>
