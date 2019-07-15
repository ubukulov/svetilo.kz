@extends('themes.besmart.layouts.app')
@section('content')
    {!! Breadcrumbs::render('product.index', $product) !!}
    <div class="row">
        <div class="col-md-8">
            <h4>{{ $product->title }}</h4> <br>
            <img style="max-width: 600px; max-height: 400px;" src="{{ $product->image() }}" title="{{ $product->title }}" alt="{{ $product->title }}">

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        {!! $product->full_description !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="left-product-info">
                <div class="left-product-article">
                    <span>Код: {{ $product->id }}</span>
                </div>

                <div class="left-product-price">
                    <span>Цена: {{ $product->price }} тг.</span>
                </div>

                <div class="left-product-buy">
                    <a href="{{ route('cart.add', ['product_id' => $product->id]) }}" class="btn btn-danger">Купить</a>
                </div>

                <div style="margin-top: 20px;">
                    <a href="https://api.whatsapp.com/send?phone=7777941654&text=Здравствуйте!%20Я%20хотел%20бы%20узнать%20по%20подробнее%20о товаре%20!.%20Спасибо!%20Артикуль товара:%20{{ $product->id }}%20Товар%20по%20этому%20адресу:%20{{ $product->url() }}">
                        <img width="200" src="{{ asset('img/whatsapp_btn.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
