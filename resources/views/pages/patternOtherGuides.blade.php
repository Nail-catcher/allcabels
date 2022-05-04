@extends('layouts.app')

@section('breadcrumb')
    <div class="breadcrumbs">
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/fabric">Заводы</a></li>
            <li><a href="/fabric">Шаблоны {{$pattern->id}}</a></li>
            <li><span>Исключения</span></li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="content__header">
                <div>
                    <a href="{{ url()->previous() }}" class="header-back"></a>
                    <h1>Общие справочники «Шаблона {{$pattern->name}}»</h1>
                </div>
                <div>
                    <a href="/patternotherguides/create?pattern={{$pattern->id}}" class="btn btn-primary">Задать общие справочники</a>
                </div>
            </div>
            <div class="content__table">
                <table>
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pattern->otherguides as $guide) <tr>
                        {{--<td>Исключение 1</td>--}}
                        <td>{{$guide->name}}</td>
                        <td>{{$guide->description}}</td>
                        <td>
                            <div class="table__action">
                                <a title="Удалить" onclick="return confirm('Are you sure?')" href="{{url('patternotherguides/destroy/'.$guide->id)}}" class="table__action-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="content__footer">
                    <div class="content__footer-count">
                        <span>Показано 1 из 1 общих справочников</span>
                    </div>
                    <div class="content__footer-pagination">
                        <a href="#" class="prev"></a>
                        <ul>
                            <li><a href="#" class="active">1</a></li>


                        </ul>
                        <a href="#" class="next"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
