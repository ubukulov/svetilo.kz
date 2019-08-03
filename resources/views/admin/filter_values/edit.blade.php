@extends('admin.layouts.admin_lte')
@section('content')
    <div class="box box-default">
        <div class="box-body">
            <!-- Row -->
            <div class="row">
                <div class="col-md-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Форма редактирование значение фильтра</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.fv.update', ['id' => $fv->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <label for="filter_id">Выберите фильтр</label>
                                                <select class="form-control" name="filter_id" id="filter_id">
                                                    @foreach($filters as $filter)
                                                        <option @if($filter->id == $fv->filter_id) selected @endif value="{{ $filter->id }}">{{ $filter->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Значение фильтра</label>
                                                <input class="form-control" required name="title" value="{{ $fv->title }}" id="title" placeholder="Введите значение" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label for="active">Опубликовать</label>
                                                <select name="status" class="form-control custom-select d-block w-100" id="active">
                                                    <option @if($fv->status == 1) selected @endif value="1">Да</option>
                                                    <option @if($fv->status == 0) selected @endif value="0">Нет</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-primary" name="edit_filter_value" type="submit">Изменить значение фильтра</button>
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
