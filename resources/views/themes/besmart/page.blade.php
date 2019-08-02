@extends('themes.besmart.layouts.app')
@section('content')
    {!! Breadcrumbs::render('catalog.view', $page) !!}
    <div class="wtitle">
        {!! $page->title !!}
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! $page->full_description !!}

                @if($page->alias == 'kontakty')
                    <iframe src="https://yandex.kz/map-widget/v1/-/CChuj2iX" style="width: 100%;" height="400" frameborder="1" allowfullscreen="true"></iframe>
                @endif
            </div>
        </div>
    </div>
@stop
