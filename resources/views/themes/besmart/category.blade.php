@extends('themes.besmart.layouts.app')
@section('content')
    {!! Breadcrumbs::render('catalog.view', $category) !!}
    <div class="wtitle">
        <svg style="width: 20px; " aria-hidden="true" focusable="false" data-prefix="fas" data-icon="network-wired" class="svg-inline--fa fa-network-wired fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M640 264v-16c0-8.84-7.16-16-16-16H344v-40h72c17.67 0 32-14.33 32-32V32c0-17.67-14.33-32-32-32H224c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h72v40H16c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16h104v40H64c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32h-56v-40h304v40h-56c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32h-56v-40h104c8.84 0 16-7.16 16-16zM256 128V64h128v64H256zm-64 320H96v-64h96v64zm352 0h-96v-64h96v64z"></path></svg>
        &nbsp;
        {!! $category->title !!}
    </div>

    @if(count($category->getFilters()) != 0)
        @section('filters')
            <div class="category_filters">
                <div class="filter_title sb_title">
                    <i class="fas fa-filter"></i>&nbsp;ФИЛЬТРЫ
                </div>
                <ul class="filter-pU">
                    @foreach($category->getFilters() as $filter)
                        <li>
                            {{ $filter->title }}
                            @if($filter->values)
                                <ul class="filter-cU">
                                    @foreach($filter->values as $fv)
                                    <li>
                                        <a href="#">{{ $fv->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endsection
    @endif

    <div class="row">
        @foreach($category->products as $product)
        <div class="col-md-4 column">
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
                    <a href="{{ route('cart.add', ['product_id' => $product->id]) }}" style="font-size: 13px;" class="btn btn-danger"><i class="fa fa-shopping-cart"></i>&nbsp; Купить</a>
                    <a href="{{ url('/cart/add/'.$product->id.'/return') }}" style="font-size: 13px;" class="btn btn-danger"><i></i>&nbsp; В корзину</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop
