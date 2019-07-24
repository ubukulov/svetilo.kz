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
                        <h5 class="hk-sec-title">Список заказы</h5>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table id="datable_1" class="table table-hover w-100 display pb-30">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ФИО</th>
                                    <th>Телефон</th>
                                    <th>Адрес</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->full_name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->address }}</td>
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
