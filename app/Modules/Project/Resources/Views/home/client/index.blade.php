@extends('_layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('project::home.client.index.projects')
            </div>
            <div class="col-md-8">
                @include('project::home.client.index.registers')
            </div>
        </div>
    </div>

@endsection