
            <!-- Modal -->
        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ID:: {{$item->id}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @php $count = 1; $alternativa=1; @endphp
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>