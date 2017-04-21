@extends('_layouts.app')

@section('content')

    <?php
    $name =  primeiroNome($order->user->name);
    $profile =  $order->profile;
    ?>


    <div class="container">
        <div class="row">
            <p class="text-lg-right">
                <button class="btn btn-warning card-24" data-toggle="modal" data-target="#feedback">Criar Mensagem</button>
            </p>

            <div class="container">
                <div class="row">
                    @forelse($order->notes as $note)
                        @if($note->status == 0)
                                <div class="col-md-7">
                                    <div class="card card-8">
                                        <p class="offset-md-1"><small>{{primeiroNome($note->agent)}}</small></p>
                                        <p class="offset-md-1">
                                            {{$note->description}}
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

                        @else

                            <div class="offset-md-5 col-md-7">
                                <div class="card card-8 card-success">
                                    <p class="offset-md-1 text-uppercase"><small><b>{{primeiroNome($note->agent)}}</b></small></p>
                                    <p class="offset-md-1">
                                        {{$note->description}}
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
                        @endif
                    @empty
                        <button class="btn btn-lg btn-ligth-warning btn-quadrado card-8 " data-toggle="modal" data-target="#feedback">Iniciar Diálogo</button>
                    @endforelse

                </div>
                <div style="clear:both;"></div>

                @include("contacts.client.modal.feedback")
            </div>

        </div>
    </div>
    <br/>
    <br/>
@endsection

@section('footer')

    <script type="text/javascript">
        $(document).ready(function() {

            $("#focusedDiv").css('outline',0).attr('tabindex',-1).focus();

        });
    </script>

@endsection
