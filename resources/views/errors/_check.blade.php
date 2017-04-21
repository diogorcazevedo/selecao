@if($errors->any())

    <button style="display: none;" id="error" data-toggle="modal" data-target=".bd-example-modal-lg"></button>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">AVISO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($errors->all() as $error)
                        <p class="text-lg-center text-uppercase alert alert-danger"><small>{{$error}}</small></p>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function(){
            document.getElementById("error").click();

            setTimeout(function(){
                $('#close').click();
            }, 1800);

        }
    </script>

@endif


@if(Session::has('success'))



    <button style="display: none;" id="modal" data-toggle="modal" data-target=".bd-example-modal-lg"></button>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">AVISO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="alert alert-success">{{Session::get('success')}}</p>
                </div>
                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function(){
            document.getElementById("modal").click();

            setTimeout(function(){
                $('#close').click();
            }, 1500);

        }
    </script>

    {{Session::forget('success')}}

@endif

@if(Session::has('error'))



    <button style="display: none;" id="modal" data-toggle="modal" data-target=".bd-example-modal-lg"></button>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">AVISO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p class="alert alert-danger">{{Session::get('error')}}</p>
                </div>
                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>




    <script>
        window.onload = function(){
            document.getElementById("modal").click();

            setTimeout(function(){
                $('#close').click();
            }, 1500);

        }
    </script>

    {{Session::forget('error')}}
@endif

