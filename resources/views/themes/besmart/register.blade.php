@extends('themes.besmart.layouts.app')
@section('content')
    {!! Breadcrumbs::render('registration') !!}
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('registration') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="first_name">Имя</label>
                    <input type="text" name="first_name" id="first_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" required name="phone" id="phone" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" required name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Подтвердите пароль</label>
                    <input type="password" required name="confirm_password" id="confirm_password" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" name="register" class="btn btn-danger"><i class="fa fa-user-plus"></i>&nbsp;Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
@stop
