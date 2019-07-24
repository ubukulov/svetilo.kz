@extends('admin.layouts.admin_lte')
@section('content')
    <div class="box box-default">
        <div class="box-body">
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Форма добавление товара</h5>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Наименование</label>
                                        <input class="form-control" required name="title" id="title" placeholder="Введите наименование" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Выберите категорию</label>
                                        <select name="category_id" class="form-control custom-select d-block w-100" id="category_id">
                                            @foreach($cats as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="seo_keywords">Ключевые слова</label>
                                        <textarea class="form-control" name="seo_keywords" id="seo_keywords" cols="30" rows="2"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="seo_description">Описание для СЕО</label>
                                        <textarea class="form-control" name="seo_description" id="seo_description" cols="30" rows="2"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="active">Опубликовать</label>
                                        <select name="active" class="form-control custom-select d-block w-100" id="active">
                                            <option value="1">Да</option>
                                            <option value="0">Нет</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="article">Артикуль товара</label>
                                        <input class="form-control" name="article" id="article" placeholder="Введите артикуль" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Цена</label>
                                        <input class="form-control" required name="price" id="price" placeholder="Введите цену" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="old_price">Старая цена</label>
                                        <input class="form-control" name="old_price" id="old_price" placeholder="Введите старую цену" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity">Количество</label>
                                        <input class="form-control" name="quantity" id="quantity" placeholder="Введите количество" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="base_price">Себестоимость товара</label>
                                        <input class="form-control" name="base_price" id="base_price" placeholder="Введите себестоимость" type="text">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Row -->
                            <span>Картинки</span>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="file" required class="form-control" name="images[]" multiple/>
                                </div>
                            </div>

                            <br>
                            <hr>
                            <div class="form-group">
                                <label for="short_description">Короткое описание</label>
                                <textarea class="form-control tinymce" name="short_description" id="short_description" cols="30" rows="2">

                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="full_description">Полное описание</label>
                                <textarea class="form-control tinymce" name="full_description" id="editor1" cols="30" rows="2">

                                </textarea>
                            </div>

                            <hr>
                            <button class="btn btn-primary" name="add_category" type="submit">Добавить товар</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
        </div>
        </div>
@stop
