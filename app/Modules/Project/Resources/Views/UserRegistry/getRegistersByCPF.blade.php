@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="card card-block">
            <p class="bg-faded text-lg-center">Pagamento de taxa</p>
            <br/>
            <div class="row">
                <br/>
                <br/>
                <div class="offset-md-2 col-md-8">
                    {{ Form::open(['route'=>['registryOperations.getRegistersByCPF']]) }}

                    <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }} row">
                        <br/>
                        <label for="cpf" class="col-md-3 col-form-label">Informe CPF:</label>

                        <div class="col-md-7">
                            {{ Form::text('cpf',null,['class'=>'form-control','required' => 'required','data-mask'=>"000.000.000-00",'placeholder'=>"999.999.999-99"]) }}
                            @if ($errors->has('cpf'))
                                <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="col-md-2">
                            {{ Form::submit('Buscar',['class'=>'btn btn-blue-nav']) }}
                        </div>
                        <div style="clear: both;"></div>
                        <br/>
                        <br/>
                    </div>

                    {{ Form::close()}}

                </div>
                <br/>
                <br/>
                <br/>
                <div class="offset-md-1 col-md-11">
                    @if(isset($registers))
                        <table class="table table-bordered col-lg-6">

                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Candidato</th>
                                <th>Concurso</th>
                                <th colspan="2" class="text-lg-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($registers as $register)
                                <tr>
                                    <td><small>{{$register->id}}</small></td>
                                    <td><small>{{$register->user}}</small></td>
                                    <td><small>{{$register->job}}</small></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm pull-lg-left" href="{{route('project.slips.store',['register'=>$register->id, 'job'=>$register->job_id, 'type'=>1])}}" target="_blank"><i class="fa fa-barcode fa-lg" aria-hidden="true"></i>  Imprimir Boleto</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm pull-lg-left" href="{{route('project.iugu.checkout',['register'=>$register->id])}}" target="_blank"><i class="fa fa-credit-card fa-lg" aria-hidden="true"></i>  Pagar com Cartão</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection


