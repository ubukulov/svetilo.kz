@extends('admin.layouts.admin_lte')
@section('content')
    <div class="box box-default">
        <div class="box-body">
            <!-- Row -->
            <div class="row">
                <div class="col-md-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Форма редактирование фильтра</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.filter.update', ['id' => $filter->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Наименование</label>
                                                <input class="form-control" required name="title" value="{{ $filter->title }}" id="title" placeholder="Введите наименование" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label for="active">Опубликовать</label>
                                                <select name="status" class="form-control custom-select d-block w-100" id="active">
                                                    <option @if($filter->status == 1) selected @endif value="1">Да</option>
                                                    <option @if($filter->status == 0) selected @endif value="0">Нет</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-primary" name="edit_filter" type="submit">Изменить фильтр</button>
                                            </div>
                                        </div>
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
