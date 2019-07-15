@extends('admin.layouts.admin')
@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-xl-6">
                        <h5 class="hk-sec-title">Список категории</h5>
                    </div>
                    <div class="col-xl-6">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-blue">Добавить категорию</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <table id="datable_1" class="table table-hover w-100 display pb-30">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Alias</th>
                                    <th>Опуб.</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cats as $cat)
                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->title }}</td>
                                    <td>{{ $cat->alias }}</td>
                                    @if($cat->active == 1)
                                    <td>Да</td>
                                    @else
                                    <td>Нет</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.category.edit', ['id' => $cat->id]) }}" class="btn btn-blue"><i class="fa fa-edit"></i>&nbsp; Редак.</a>
                                        <a href="{{ route('admin.category.destroy', ['id' => $cat->id]) }}" class="btn btn-danger"><i class="fa fa-remove"></i>&nbsp; Удалить</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
