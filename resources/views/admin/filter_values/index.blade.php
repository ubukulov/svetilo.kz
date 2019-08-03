@extends('admin.layouts.admin_lte')
@section('content')
    <div class="box box-default">
        <div class="box-body">
            <!-- Row -->
            <div class="row">
                <div class="col-md-12">
                    <section class="hk-sec-wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="hk-sec-title">Список значение фильтров</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.fv.create') }}" class="btn btn-blue">Добавить значение фильтра</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-wrap">
                                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Фильтр</th>
                                            <th>Наименование</th>
                                            <th>Alias</th>
                                            <th>Опуб.</th>
                                            <th>Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($filter_values as $fv)
                                            <tr>
                                                <td>{{ $fv->id }}</td>
                                                <td>{{ $fv->filter->title }}</td>
                                                <td>{{ $fv->title }}</td>
                                                <td>{{ $fv->alias }}</td>
                                                @if($fv->status == 1)
                                                    <td>Да</td>
                                                @else
                                                    <td>Нет</td>
                                                @endif
                                                <td style="width: 270px;">
                                                    <a href="{{ route('admin.fv.edit', ['id' => $fv->id]) }}" class="btn btn-blue"><i class="fa fa-edit"></i>&nbsp; Редак.</a>
                                                    <a href="{{ route('admin.fv.destroy', ['id' => $fv->id]) }}" class="btn btn-danger"><i class="fa fa-remove"></i>&nbsp; Удалить</a>
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
        </div>
    </div>
@stop
