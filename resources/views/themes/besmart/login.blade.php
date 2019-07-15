@extends('themes.besmart.layouts.app')
@section('content')
    {!! Breadcrumbs::render('login') !!}
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('authenticate') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" required name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" required name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-danger" value="enter"><i class="fa fa-sign-in"></i>&nbsp;Войти</button>
                </div>
            </form>
        </div>
    </div>
@stop
