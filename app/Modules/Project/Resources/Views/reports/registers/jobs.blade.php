@extends('_layouts.app')

@section('content')

    <div class="container">
        <div class="card card-block">

          <h4 class="alert alert-info text-uppercase">Relatório de inscritos por Cargo</h4>
            <br/>
            <div class="row">

                <div class="container" style="width: 70%;">
                    <canvas id="myChart" ></canvas>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{asset("js/chart/scripts.js")}}"></script>


    <script>
        window.onload = function() {

            var data = {
                labels: {!! json_encode($local) !!},
                datasets: [
                    {
                        label: "Inscritos",
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        data: {!! json_encode($count_row) !!},
                    }
                ]
            };


            var ctx = document.getElementById("myChart");




            new Chart(ctx, {
                type: "bar",
                data: data,
                options: {
                    scales: {
                        xAxes: [{
                            stacked: true
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
            });

        };
    </script>


@endsection

