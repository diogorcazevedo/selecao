<p class="text-lg-right">
    <button type="button" class="btn btn-sm btn-blue-cavaleiros" data-toggle="modal" data-target="#exampleModal{{$item->id}}">inserir imagens</button>
</p>

<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title alert alert-info" id="exampleModalLabel">INSERIR IMAGENS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{Form::model($item,['route'=>['items.update',$item->id],'method'=>'post','enctype'=>'multipart/form-data']) }}
                {{Form::hidden('program_id',$item->program->id)}}
                {{Form::hidden('url',URL::current())}}
                {{Form::hidden('user_id',$item->user->id)}}
                {{Form::hidden('id',$item->id)}}
                <div class="form-group  card-block row">
                    <div class="col-sm-3">
                        <label for="recipient-name" class="form-control-label"><b>upload:</b> </label>
                    </div>
                    <div class="col-sm-9">
                        {!! Form::file('image',null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <hr/>
                <div class="form-group card-block row">
                    <div class="col-sm-3">
                        <label for="message-text" class="form-control-label"><b>Posição da Imagem:</b></label>
                    </div>
                    <div class="col-sm-9">
                        <label class="radio-inline alert">{{ Form::radio('position', '1') }} Antes do texto</label>
                        <label class="radio-inline alert">{{ Form::radio('position', '2') }} Depois do texto</label>
                        <label class="radio-inline alert">{{ Form::radio('position', '1') }} Item sem texto</label>
                    </div>
                </div>
                <hr/>
                <div class="form-group card-block row">
                    <div class="col-sm-3">
                        <label for="message-text" class="form-control-label"><b>Disposição Imagem:</b></label>
                    </div>
                    <div class="col-sm-9">
                        <label class="radio-inline alert">{{ Form::radio('file_images_id', '4') }} vertical</label>
                        <label class="radio-inline alert">{{ Form::radio('file_images_id', '5') }} horizontal</label>
                        <label class="radio-inline alert">{{ Form::radio('file_images_id', '6') }} quadrada</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::submit('Salvar',['class'=>'btn  btn-blue-cavaleiros']) }}
            </div>
        </div>
    </div>
</div>


<div class="container">

    @if(count($item->images->where('position',1)) > 0)
        @foreach($item->images->where('position',1) as $image)
            <p class="text-lg-center"><img src="{{asset('uploads/images/items/'.$item->id.'/'.$image->id.'.'.$image->extension)}}" width="300"/></p>
            <p class="text-lg-right"><a href="{{route('items.img.destroy',['id'=>$image->id])}}" class="btn btn-sm btn-outline-secondary"> <i class="fa fa-times text-danger" aria-hidden="true"></i></a> </p>
        @endforeach
<hr/>
    @endif


        {{Form::model($item,['route'=>['items.update',$item->id],'method'=>'post','id'=>'second']) }}
        {{Form::hidden('program_id',$item->program->id)}}
        {{Form::hidden('url',URL::current())}}
        {{Form::hidden('user_id',$item->user->id)}}
        {{Form::hidden('id',$item->id)}}

        <br/>
        <div class="container">
            {!! Form::textarea('description',null,['class'=>'form-control','id'=>'froala']) !!}
        </div>
        <br/>


        <div class="form-group ">
            {{ Form::submit('Salvar',['class'=>'btn btn-sm btn-blue-cavaleiros pull-right']) }}
        </div>
        {{Form::close()}}

    @if(count($item->images->where('position',2)) > 0)
<br/>
<hr/>
        @foreach($item->images->where('position',2) as $image)
            <p class="text-lg-center"><img src="{{asset('uploads/images/items/'.$item->id.'/'.$image->id.'.'.$image->extension)}}" width="300"/></p>
            <p class="text-lg-right"><a href="{{route('items.img.destroy',['id'=>$image->id])}}" class="btn btn-sm btn-outline-secondary"> <i class="fa fa-times text-danger" aria-hidden="true"></i></a> </p>
        @endforeach
    @endif

</div>




