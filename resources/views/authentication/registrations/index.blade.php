@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{--
                   <div class="card-header text-lg-center">
                       <div class="row">

                          <div class="col-md-6">
                              <button style="border: none;" class="btn btn-secondary" type="button">
                                  LISTAR USUÁRIOS
                              </button>
                          </div>

                          <div class="col-md-6">
                              {{ Form::open(['route'=>['users.index'],'method'=>'GET']) }}

                              @include('_partial._tables.search')

                              {{ Form::close()}}
                          </div>
                        </div>
                    </div>
                     --}}
                    <div class="card-block">
                        @include('_partial._tables.users',['table' => 'edit'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection