@extends('themes.besmart.layouts.app')
@section('content')
    <div class="row">
        @foreach($cats as $cat)
        <div class="col-md-6">
            <div class="cat-block" style="border: 1px solid #f5f5f5; height: 182px;">
                <div class="cat-image" style="width: 300px; float: left;">
                    <a href="{{ route('catalog.view', ['alias' => $cat->alias]) }}">
                        <img src="{{ $cat->image() }}" alt="{{ $cat->alias }}">
                    </a>
                </div>

                <div class="cat-info" style="margin: 50px 0px;">
                    <span style="font-size: 18px;">{{ $cat->title }}</span> <br>
                    <a class="btn btn-blue" style="background: chocolate; margin-top: 15px; border-radius: 50px; padding: 5px 20px; color: white;" href="{{ route('catalog.view', ['alias' => $cat->alias]) }}">Перейти</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop
