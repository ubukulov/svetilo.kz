@extends('themes.besmart.layouts.app')
@section('content')
    {!! Breadcrumbs::render('catalog.view', $category) !!}
    <div class="wtitle">
        <svg style="width: 20px; " aria-hidden="true" focusable="false" data-prefix="fas" data-icon="network-wired" class="svg-inline--fa fa-network-wired fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M640 264v-16c0-8.84-7.16-16-16-16H344v-40h72c17.67 0 32-14.33 32-32V32c0-17.67-14.33-32-32-32H224c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h72v40H16c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16h104v40H64c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32h-56v-40h304v40h-56c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32h-56v-40h104c8.84 0 16-7.16 16-16zM256 128V64h128v64H256zm-64 320H96v-64h96v64zm352 0h-96v-64h96v64z"></path></svg>
        &nbsp;
        {!! $category->title !!}
    </div>
    <div class="row">
        @foreach($category->children as $cat)
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
