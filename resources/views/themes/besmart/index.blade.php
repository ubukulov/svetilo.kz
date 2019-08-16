@extends('themes.besmart.layouts.app')
@section('content')
    @if($agent->isMobile())
        <div class="catalog">
            <div class="catalog-title sb_title">
                <i class="fas fa-bars"></i>&nbsp;КАТАЛОГ
            </div>
            <ul class="catalog-list">
                @foreach($cats as $cat)
                    @if(count($cat->children) != 0)
                        <li>
                            <a class="m-link" href="{{ $cat->url() }}">{{ $cat->title }}</a>
                            <span class="plus" data-id="{{ $cat->id }}"><i class="fas fa-plus"></i></span>
                            <ul class="ul-child-items item{{ $cat->id }}">
                                @foreach($cat->children as $child)
                                    <li><a class="m-link-c" href="{{ $child->url() }}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ $cat->url() }}">{{ $cat->title }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>

        @section('filters')

        @show
    @endif
    <div class="wtitle">
        <svg style="width: 20px; " aria-hidden="true" focusable="false" data-prefix="fas" data-icon="network-wired" class="svg-inline--fa fa-network-wired fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M640 264v-16c0-8.84-7.16-16-16-16H344v-40h72c17.67 0 32-14.33 32-32V32c0-17.67-14.33-32-32-32H224c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h72v40H16c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16h104v40H64c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32h-56v-40h304v40h-56c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32h-56v-40h104c8.84 0 16-7.16 16-16zM256 128V64h128v64H256zm-64 320H96v-64h96v64zm352 0h-96v-64h96v64z"></path></svg>
        &nbsp;ГРУППЫ ТОВАРОВ И УСЛУГ
    </div>
    <div class="row">
        @foreach($cats as $cat)
        <div class="col-md-6">
            <div class="cat-block">
                <div class="cat-image">
                    <a href="{{ route('catalog.view', ['alias' => $cat->alias]) }}">
                        <img class="cat-im" src="{{ $cat->image() }}" alt="{{ $cat->alias }}">
                    </a>
                </div>

                <div class="cat-info">
                    <span>{{ $cat->title }}</span> <br>
                    <a class="btn btn-blue go_link" href="{{ route('catalog.view', ['alias' => $cat->alias]) }}">Перейти</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($agent->isMobile())
        <div class="sidebar_contacts">
            <div class="sd_contact_title sb_title">
                <i class="fas fa-address-book"></i>&nbsp;КОНТАКТЫ
            </div>

            <div class="sb_div">
                <span class="sb_div_t">Компания</span><br>
                <span>Svetilo.kz</span>
            </div>

            <div class="sb_div">
                <span class="sb_div_t">Адрес</span> <br>
                <span>г. Алматы, ул. Брусиловского 107Б</span>
            </div>
			
			<div class="sb_div">
				<iframe src="https://yandex.kz/map-widget/v1/-/CChuj2iX" style="width: 100%;" height="200" frameborder="1" allowfullscreen="true"></iframe>
			</div>

            <div class="sb_div">
                <span class="sb_div_t">Телефоны</span> <br>
                <span><a href="tel:+77777941654">+7 777 794 1654</a></span>
            </div>

            <div class="sb_div">
                <span class="sb_div_t">Email</span> <br>
                <span><a href="mailto:ibraemovm@gmail.com">ibraemovm@gmail.com</a></span>
            </div>
        </div>

        <div class="work_grafic">
            <div class="sb_title">
                <i class="far fa-calendar-alt"></i>&nbsp;ГРАФИК РАБОТЫ
            </div>

            <ul class="cs-sked__table">
                <li class="cs-sked__row">
                    <div class="cs-sked__cell"><span class="cs-sked__day">Понедельник</span></div>
                    <div class="cs-sked__cell">
                        <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                        <span class="cs-sked__time">20:00</span>
                    </div>
                </li>
                <li class="cs-sked__row">
                    <div class="cs-sked__cell">
                        <span class="cs-sked__day">Вторник</span>
                    </div><div class="cs-sked__cell">
                        <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                        <span class="cs-sked__time">20:00</span>
                    </div>
                </li>
                <li class="cs-sked__row">
                    <div class="cs-sked__cell">
                        <span class="cs-sked__day">Среда</span>
                    </div>
                    <div class="cs-sked__cell">
                        <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                        <span class="cs-sked__time">20:00</span>
                    </div>
                </li>
                <li class="cs-sked__row">
                    <div class="cs-sked__cell">
                        <span class="cs-sked__day">Четверг</span>
                    </div><div class="cs-sked__cell">
                        <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                        <span class="cs-sked__time">20:00</span>
                    </div>
                </li>
                <li class="cs-sked__row">
                    <div class="cs-sked__cell">
                        <span class="cs-sked__day">Пятница</span>
                    </div>
                    <div class="cs-sked__cell">
                        <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                        <span class="cs-sked__time">20:00</span>
                    </div>
                </li>
                <li class="cs-sked__row">
                    <div class="cs-sked__cell">
                        <span class="cs-sked__day">Суббота</span>
                    </div>
                    <div class="cs-sked__cell">
                        <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                        <span class="cs-sked__time">18:00</span>
                    </div>
                </li>
                <li class="cs-sked__row">
                    <div class="cs-sked__cell">
                        <span class="cs-sked__day">Воскресенье</span>
                    </div>
                    <div class="cs-sked__cell">
                        <span class="cs-sked__time">Выходной</span>
                    </div>
                </li>
            </ul>
        </div>
    @endif
@stop
