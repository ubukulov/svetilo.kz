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
                    <ul class="tabs">
                        <li>
                            <input type="radio" name="tabs" id="tab-1" checked>
                            <label for="tab-1">Описание</label>
                            <div class="tab-content">
                                {!! $product->full_description !!}
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="tabs" id="tab-2">
                            <label for="tab-2">Характеристики</label>
                            <div class="tab-content">
                                Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="tabs" id="tab-3">
                            <label for="tab-3">Информация для заказа</label>
                            <div class="tab-content">
                                Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="tabs" id="tab-4">
                            <label for="tab-4">Отзывы о товаре</label>
                            <div class="tab-content">
                                Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                        </li>
                    </ul>
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
            </div>
        </div>
    </div>
@stop
