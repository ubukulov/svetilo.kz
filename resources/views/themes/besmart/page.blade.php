@extends('themes.besmart.layouts.app')
@section('content')
    {!! $page->full_description !!}

    @if($page->alias == 'kontakty')
        <iframe src="https://yandex.kz/map-widget/v1/-/CChuj2iX" width="560" height="400" frameborder="1" allowfullscreen="true"></iframe>
    @endif
@stop
