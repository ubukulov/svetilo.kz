@extends('themes.besmart.layouts.app')
@section('content')
    {!! Breadcrumbs::render('cart.index') !!}
    <div class="row">
        <div class="col-md-12">
            @if(\App\Classes\ShoppingCart::hasProducts())
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Наименование товара</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($cartItems as $cartItem)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>
                                <a href="{{ $cartItem->product->url() }}">
                                    <img style="max-width: 90px;" align="left" src="{{ $cartItem->product->image('t') }}" title="{{ $cartItem->product->title }}" alt="{{ $cartItem->product->title }}">
                                    {{ $cartItem->product->title }}
                                </a>
                            </td>
                            <td>{{ $cartItem->product->price }}&nbsp;тг.</td>
                            <td>{{ $cartItem->quantity }}</td>
                            <td>{{ $cartItem->product->price * $cartItem->quantity }}&nbsp;тг.</td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach

                        <tr>
                            <td colspan="2">Итого</td>
                            <td colspan="3">
                                <span style="float: right;">{{ \App\Classes\ShoppingCart::getTotalPrice() }}&nbsp;тг.</span></td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                        <a style="float: right;" href="{{ route('checkout.index') }}" class="btn btn-danger"><i class="fa fa-shopping-cart"></i>&nbsp;Оформить заказ</a>
                    </div>
                </div>
            @else
                Ваша корзина пуста
            @endif
        </div>
    </div>
@stop
