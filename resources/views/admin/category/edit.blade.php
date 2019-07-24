@extends('admin.layouts.admin_lte')
@section('content')
    <div class="box box-default">
        <div class="box-body">
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Форма редактирование категорию</h5>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input class="form-control" value="{{ $category->title }}" required name="title" id="title" placeholder="Введите наименование" type="text">
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Родитель</label>
                                <select name="parent_id" class="form-control custom-select d-block w-100" id="parent_id">
                                    <option value="0">--- Нет родителя ---</option>
                                    @foreach($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Картинка</label>
                                        <input type="file" name="image" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if($category->image())
                                        <img src="{{ $category->image() }}" alt="{{ $category->alias }}">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="active">Опубликовать</label>
                                <select name="active" class="form-control custom-select d-block w-100" id="active">
                                    <option value="1">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>

                            <hr>
                            <button class="btn btn-primary" name="edit_category" type="submit">Изменить категорию</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
        </div>
        </div>
@stop
