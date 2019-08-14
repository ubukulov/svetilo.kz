@extends('admin.layouts.admin_lte')
@section('content')
    <div class="box box-default">
        <div class="box-body">
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Форма редактирование товара</h5>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Наименование</label>
                                        <input class="form-control" value="{{ $product->title }}" required name="title" id="title" placeholder="Введите наименование" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Выберите категорию</label>
                                        <select name="category_id" class="form-control custom-select d-block w-100" id="category_id">
                                            @foreach($cats as $cat)
                                                @if(count($cat->children) != 0)
                                                    <option @if($product->category_id == $cat->id) selected @endif value="{{ $cat->id }}">{{ $cat->title }}</option>
                                                    @foreach($cat->children as $child)
                                                    <option @if($product->category_id == $child->id) selected @endif value="{{ $child->id }}">------{{ $child->title }}</option>
                                                    @endforeach
                                                @else
                                                <option @if($product->category_id == $cat->id) selected @endif value="{{ $cat->id }}">{{ $cat->title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="seo_keywords">Ключевые слова</label>
                                        <textarea class="form-control" name="seo_keywords" id="seo_keywords" cols="30" rows="2">{{ $product->seo_keywords }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="seo_description">Описание для СЕО</label>
                                        <textarea class="form-control" name="seo_description" id="seo_description" cols="30" rows="2">{{ $product->seo_description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="active">Опубликовать</label>
                                        <select name="active" class="form-control custom-select d-block w-100" id="active">
                                            <option @if($product->status == 1) selected @endif value="1">Да</option>
                                            <option @if($product->status == 0) selected @endif value="0">Нет</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="article">Артикуль товара</label>
                                        <input class="form-control" value="{{ $product->article }}" name="article" id="article" placeholder="Введите артикуль" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Цена</label>
                                        <input class="form-control" value="{{ $product->price }}" required name="price" id="price" placeholder="Введите цену" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="old_price">Старая цена</label>
                                        <input class="form-control" value="{{ $product->old_price }}" name="old_price" id="old_price" placeholder="Введите старую цену" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity">Количество</label>
                                        <input class="form-control" value="{{ $product->quantity }}" name="quantity" id="quantity" placeholder="Введите количество" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="base_price">Себестоимость товара</label>
                                        <input class="form-control" value="{{ $product->base_price }}" name="base_price" id="base_price" placeholder="Введите себестоимость" type="text">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Row -->
                            <span>Картинки</span>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="images[]" multiple/>
                                </div>
                                
                                <div class="col-md-6">
                                    <img width="150" src="{{ $product->image() }}" alt="">
                                </div>
                            </div>

                            <br>
                            <hr>
                            <div class="form-group">
                                <label for="short_description">Короткое описание</label>
                                <textarea class="form-control tinymce" name="short_description" id="short_description" cols="30" rows="2">
                                {!! $product->short_description !!}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="full_description">Полное описание</label>
                                <textarea class="form-control tinymce" name="full_description" id="editor1" cols="30" rows="2">
                                {!! $product->full_description !!}
                                </textarea>
                            </div>

                            <hr>
                            <button class="btn btn-primary" name="edit_category" type="submit">Изменить товар</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</div>

<div class="box box-default">
    <div class="box-body">
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Присвоение фильтров к товаром</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('fv_product') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                                <th>Фильтр</th>
                                                <th>Значение</th>
                                            </thead>
                                            <tbody>
                                            @foreach($filters as $filter)
                                                <tr>
                                                    <td>
                                                        <input class="form-control" readonly type="text" name="filters[{{ $filter->id }}]" value="{{ $filter->title }}">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="filter_values[{{ $filter->id }}][]" id="fv_id">
                                                            <option value="0"></option>
                                                            @foreach($filter->values as $fv)
                                                                <option @if(array_key_exists($fv->id, $fvs)) selected @endif value="{{ $fv->id }}">{{ $fv->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" name="fv_add_to_product">Добавить фильтры к товару</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@stop
