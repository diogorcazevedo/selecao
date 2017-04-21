@extends('_layouts.app')

@section('content')
    <div class="container">
        @include('academy::exams._tables_create.head')
        <div class="row">
            <div class="col-sm">
                @include('academy::exams._tables_create.items')
            </div>
            <div class="col-sm">
                @include('academy::exams._tables_create.exams')
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
@endsection