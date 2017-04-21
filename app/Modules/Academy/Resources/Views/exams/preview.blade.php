@extends('_layouts.app')
@section('content')

    <div class="container">
        <div class="card card-block">
            <p class="text-lg-right">
                <a href="{{route('exams.create',['job'=>$job->id,'program'=>$job->programs()->first()->program_id])}}" class="btn btn-sm btn-outline-secondary text-blue-cavaleiros">
                    <i class="fa fa-edit" aria-hidden="true"></i> EDITAR
                </a>
                <a href="{{route('exams.pdf',['job'=>$job->id])}}" class="btn btn-sm btn-outline-secondary text-warning">
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                </a>
            </p>
            <div class="row">
                <div class="col-lg-12">
                    <br/>
                    <br/>
                    @include('academy::_partial.loop_exam')
                </div>

                {{--
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-auto">
                            <a href="{{route('items.save',['item_id'=>$item->id,'status'=>0])}}" class="btn text-info btn-outline-secondary">
                                <i class="fa fa-recycle" aria-hidden="true"></i> enviar para reciclar
                            </a>
                        </div>
                        <div class="col col-lg-2">
                            <a href="{{route('items.save',['item_id'=>$item->id,'status'=>50])}}" class="btn text-success btn-outline-secondary">
                                <i class="fa fa-check-square" aria-hidden="true"></i> aprovar item
                            </a>
                        </div>
                        <div class="col col-lg-2">
                            <a href="{{route('items.destroy',['item_id'=>$item->id])}}" class=" btn text-danger btn-outline-secondary">
                                <i class="fa fa-trash" aria-hidden="true"></i> descartar
                            </a>
                        </div>
                        <div class="col col-lg-2">
                            <a href="{{route('items.save',['item_id'=>$item->id,'status'=>100])}}" class="btn btn-outline-secondary">
                                <i class="fa fa-files-o" aria-hidden="true"></i> publicar no site
                            </a>
                        </div>
                    </div>
                </div>
                --}}

            </div>
        </div>
    </div>
@endsection

