@php $count = 1; $alternativa = 1; @endphp
@if(count($item->images->where('position',1)) > 0)
    @foreach($item->images as $image)
        <p class="text-lg-center"><img src="{{asset('uploads/images/items/'.$item->id.'/'.$image->id.'.'.$image->extension)}}" width="300"/></p>
    @endforeach
@endif

<p><small>{!!$item->description!!}</small></p>

@if(count($item->images->where('position',2)) > 0)
    @foreach($item->images as $image)
        <p class="text-lg-center"><img src="{{asset('uploads/images/items/'.$item->id.'/'.$image->id.'.'.$image->extension)}}" width="300"/></p>
    @endforeach
@endif

@foreach($item->questions as $question)
    <div class="bg-faded page-break">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <div class="row">
                    <div class="col-sm-1">
                        <br/>
                        <b>{{$count++}}: </b>
                    </div>
                    <div class="col-sm">
                        <p>{!!$question->description!!}</p>
                    </div>
                </div>
                <br/>
                @foreach($question->choices as $choice)

                    @if($choice->status == 1)
                        <div class="row bg-info">
                            <div class="col-sm-1 text-lg-right">
                                <br/>
                                <b>{{alternative($alternativa++)}} </b>
                            </div>
                            <div class="col-sm">
                                <p><b>{!!$choice->description!!}</b></p>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-1 text-lg-right">
                                <br/>
                                <b>{{alternative($alternativa++)}} </b>
                            </div>
                            <div class="col-sm">
                                <p>{!!$choice->description!!}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <br/>
    </div>
    <br/>
    <br/>
    @php $alternativa = 1; @endphp
@endforeach