@extends('_layouts.app')



<link rel="stylesheet" href="{{asset('css/checkout.css')}}">

@section('content')

    <div class="container">
        <div class="card card-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="text-lg-center text-uppercase">
                            <strong>Candidato:
                                <span class="text-warning">{{$register->user->name}}</span>
                            </strong>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="text-lg-center text-uppercase">
                            <strong>Cargo:
                                <span class="text-warning">{{$register->job->name}}</span>
                            </strong>
                        </p>
                    </div>
                </div>
            </div>
       <br/>
       <br/>
            <div class="text-lg-center credit-card-payment">

                {{Form::open(['route'=>'project.iugu.charge','id'=>"payment-form"]) }}

                <div class="footer">
                    <div class="container">
                        <div class="row">

                            {{--
                            <div class="col-lg-6">
                                <img src="http://storage.pupui.com.br/9CA0F40E971643D1B7C8DE46BBC18396/assets/payments-by-iugu.1df7caaf6958f1b5774579fa807b5e7f.png" alt="Pagamentos por Iugu" border="0" />
                            </div>
                            --}}
                            <div class="offset-md-4 col-md-6">
                                <img src="http://storage.pupui.com.br/9CA0F40E971643D1B7C8DE46BBC18396/assets/cc-icons.e8f4c6b4db3cc0869fa93ad535acbfe7.png" alt="Visa, Master, Diners. Amex" border="0" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="usable-creditcard-form">
                    <div class="wrapper">
                        <div class="input-group nmb_a">
                            <div class="icon ccic-brand"></div>
                            <input autocomplete="off" class="credit_card_number" data-iugu="number" placeholder="Número do Cartão" type="text" value="" />
                        </div>
                        <div class="input-group nmb_b">
                            <div class="icon ccic-cvv"></div>
                            <input autocomplete="off" class="credit_card_cvv" data-iugu="verification_value" placeholder="CVV" type="text" value="" />
                        </div>
                        <div class="input-group nmb_c">
                            <div class="icon ccic-name"></div>
                            <input class="credit_card_name" data-iugu="full_name" placeholder="Titular do Cartão" type="text" value="" />
                        </div>
                        <div class="input-group nmb_d">
                            <div class="icon ccic-exp"></div>
                            <input autocomplete="off" class="credit_card_expiration" data-iugu="expiration" placeholder="MM/AA" type="text" value="" />
                        </div>
                        <input type="hidden" name="customer_id" value="{{$customer->id}}"/>
                        <input type="hidden" name="token" id="token" value=""/>
                        <input type="hidden" name="register_id" id="token" value="{{$register->id}}"/>
                    </div>
                    <br/>
                    <div class="container">
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group{{ $errors->has('complement[children]') ? ' has-error' : '' }} row">
                                {{ Form::select('parcelas', arrayparcelas(), null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="submit-div ">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
        </div>

    </div>


@endsection
@section('footer')
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://js.iugu.com/v2"></script>
    <script src="{{asset('js/formatter.js')}}"></script>



    <script>
        Iugu.setAccountID("{{$register->job->project->iuguProject->id_api}}");


       // Iugu.setTestMode(true); // Retirar esta linha para produção

        jQuery(function ($) {
            $('#payment-form').submit(function (evt) {

                var form = $(this);
                var tokenResponseHandler = function (data) {

                    if (data.errors) {
                        alert("Erro salvando cartão: " + JSON.stringify(data.errors));
                    } else {
                        $("#token").val(data.id);
                        form.get(0).submit();
                    }
                }

                Iugu.createPaymentToken(this, tokenResponseHandler);
                return false;

            });

            cc_checkbox_label = $('#credit-card-checkbox-label')
            credit_card_form = $('.usable-creditcard-form')



        });
    </script>

@endsection

