@extends('admin.layouts.admin_lte')
@section('content')
    <div class="box box-default">
        <div class="box-body">
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Форма изменение страницу</h5>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.page.update', ['id' => $page->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input class="form-control" value="{{ $page->title }}" required name="title" id="title" placeholder="Введите наименование" type="text">
                            </div>

                            <div class="form-group">
                                <label for="seo_keywords">Ключевые слова</label>
                                <textarea class="form-control" name="seo_keywords" id="seo_keywords" cols="30" rows="2">
                                    {{ $page->seo_keywords }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="seo_description">Описание для СЕО</label>
                                <textarea class="form-control" name="seo_description" id="seo_description" cols="30" rows="2">
                                    {{ $page->seo_description }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="short_description">Короткое описание</label>
                                <textarea class="form-control tinymce" name="short_description" id="short_description" cols="30" rows="2">
                                    {!! $page->short_description !!}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="full_description">Полное описание</label>
                                <textarea class="form-control tinymce" name="full_description" id="editor1" cols="30" rows="2">
                                    {!! $page->full_description !!}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="status">Опубликовать</label>
                                <select name="status" class="form-control custom-select d-block w-100" id="status">
                                    <option @if($page->status == 1) selected @endif value="1">Да</option>
                                    <option @if($page->status == 0) selected @endif value="0">Нет</option>
                                </select>
                            </div>

                            <hr>
                            <button class="btn btn-primary" name="edit_page" type="submit">Изменить страницу</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
        </div>
        </div>
@stop
