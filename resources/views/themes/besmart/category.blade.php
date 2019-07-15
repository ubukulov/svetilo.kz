@extends('themes.besmart.layouts.app')
@section('content')
    {!! Breadcrumbs::render('catalog.view', $category) !!}
    <div class="row">
        @foreach($category->products as $product)
        <div class="col-md-3 column">
            <div class="product-info">
                <div class="product-thumbs">
                    <a href="{{ $product->url() }}">
                        <img src="{{ $product->image('t') }}" title="{{ $product->title }}" alt="{{ $product->title }}">
                    </a>
                </div>

                <div class="product-article">
                    <span>Код: {{ $product->id }}</span>
                </div>

                <div class="product-title">
                    <a href="{{ $product->url() }}">
                        {{ $product->title }}
                    </a>
                </div>

                <div class="product-price">
                    @if(empty($product->old_price))
                        {{ $product->price }} &nbsp; тг.
                    @else
                        <div class="new_price">
                            {{ $product->price }} &nbsp; тг.
                        </div>

                        <div class="old_price">
                            {{ $product->old_price }} &nbsp; тг.
                        </div>

                        <div class="clear"></div>
                    @endif
                </div>

                <div class="product-cart">
                    <a href="{{ route('cart.add', ['product_id' => $product->id]) }}" style="font-size: 14px;" class="btn btn-danger"><i class="fa fa-shopping-cart"></i>&nbsp; Купить</a>
                    <a href="{{ url('/cart/add/'.$product->id.'/return') }}" style="font-size: 14px;" class="btn btn-danger"><i></i>&nbsp; В корзину</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop
