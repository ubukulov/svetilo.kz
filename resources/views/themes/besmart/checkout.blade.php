@extends('themes.besmart.layouts.app')
@section('content')
    {!! Breadcrumbs::render('checkout.index') !!}
    <div class="row">
        <div class="col-md-12">
            @if(\App\Classes\ShoppingCart::hasProducts())
            <form action="{{ route('checkout.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="first_name">Имя</label>
                    <input type="text" @if(Auth::check()) value="{{ Auth::user()->first_name }}" @endif name="first_name" required id="first_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" @if(Auth::check()) value="{{ Auth::user()->email }}" @endif name="email" required id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" @if(Auth::check()) value="{{ Auth::user()->phone }}" @endif name="phone" id="phone" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" name="address" id="address" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="order_notes">Замечение к заказу</label>
                    <textarea name="order_notes" class="form-control" id="order_notes" cols="30" rows="3"></textarea>
                </div>

                <hr>
                <span>Список товары</span>
                <br><br>
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
                <br><br>
                <div class="form-group">
                    <button type="submit" name="order" class="btn btn-danger"><i class="fa fa-shopping-cart"></i>&nbsp;Отправить заказ</button>
                </div>
            </form>
            @else
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {!!Session::get('message')!!}
                    </div>
                @endif
            @endif
        </div>
    </div>
@stop
