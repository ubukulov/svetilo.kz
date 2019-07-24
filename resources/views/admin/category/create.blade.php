@extends('admin.layouts.admin_lte')
@section('content')
    <div class="box box-default">
        <div class="box-body">
            <!-- Row -->
            <div class="row">
        <div class="col-md-12">
            <h5 class="hk-sec-title">Форма добавление категорию</h5>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Наименование</label>
                            <input class="form-control" required name="title" id="title" placeholder="Введите наименование" type="text">
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Родитель</label>
                            <select name="parent_id" class="form-control custom-select d-block w-100" id="parent_id">
                                <option value="0">--- Нет родителя ---</option>
                                @foreach($cats as $cat)
                                    @if($cat->isRoot())
                                        <option @if(Session::get('rem_cat_id') == $cat->id) selected @endif value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @if($cat->hasChildren())
                                            @foreach($cat->children as $child)
                                                <option @if(Session::get('rem_cat_id') == $child->id) selected @endif value="{{ $child->id }}">&nbsp;----{{ $child->title }}</option>
                                                @if($child->hasChildren())
                                                    @foreach($child->children as $grandson)
                                                        <option @if(Session::get('rem_cat_id') == $grandson->id) selected @endif value="{{ $grandson->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;----{{ $grandson->title }}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Картинка</label>
                            <input type="file" name="image" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="active">Опубликовать</label>
                            <select name="active" class="form-control custom-select d-block w-100" id="active">
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </div>

                        <hr>
                        <button class="btn btn-primary" name="add_category" type="submit">Добавить категорию</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@stop
