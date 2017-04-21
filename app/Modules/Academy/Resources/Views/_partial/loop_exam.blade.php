@php $count = 1; $alternativa = 1; @endphp

    @foreach($job->items()->orderBy('item_job.created_at')->get() as $item)


        @if(count($item->images->where('position',1)) > 0)
            @foreach($item->images as $image)
                <p class="text-lg-center"><img src="{{asset('uploads/images/items/'.$item->id.'/'.$image->id.'.'.$image->extension)}}" width="600"/></p>
            @endforeach
        @endif

            {!!$item->description!!}

        @if(count($item->images->where('position',2)) > 0)
            @foreach($item->images as $image)
                <p class="text-lg-center"><img src="{{asset('uploads/images/items/'.$item->id.'/'.$image->id.'.'.$image->extension)}}" width="600"/></p>
            @endforeach
        @endif

        @foreach($item->questions as $question)
            <div class="bg-faded page-break">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="row">
                            <div class="col-sm-1">
                                <b>{{$count++}}: </b>
                            </div>
                            <div class="col-sm">
                               {!!$question->description!!}
                            </div>
                        </div>
                        <br/>
                        @foreach($question->choices as $choice)

                            @if($choice->status == 1)
                            <div class="row bg-info">
                                <div class="col-sm-1 text-lg-right">
                                    <b>{{alternative($alternativa++)}} </b>
                                </div>
                                <div class="col-sm">
                                    <b>{!!$choice->description!!}</b>
                                </div>
                            </div>
                            @else
                                <div class="row">
                                    <div class="col-sm-1 text-lg-right">
                                        <b>{{alternative($alternativa++)}} </b>
                                    </div>
                                    <div class="col-sm">
                                      {!!$choice->description!!}
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


    @endforeach
