@extends('layouts.app')

@section('breadcrumb')
    <div class="breadcrumbs">
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/fabric">Заводы</a></li>
            <li><a href="{{ url()->previous() }}">Шаблон {{$pattern->name}}</a></li>
            <li><span>Новое исключение</span></li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="content__header">
                <div>
                    <a href="{{ url()->previous() }}" class="header-back"></a>
                    <h1>Выберите исключающий индекс</h1>
                </div>
                {{--<div>--}}
                {{--<a href="#" class="btn btn-secondary">Отменить</a>--}}
                {{--<a href="#" class="btn btn-primary">Сохранить исключения</a>--}}
                {{--</div>--}}
            </div>
            <div class="content__list" style="flex: 0 0 100%; width: 100%;">
                <div class="content__list-header">
                    <form action="" class="content__list-index">
                        @if(isset(request() -> index))
                            <span class="label label-in">{{ request() -> index }}</span>
                        @else
                            <div class="placeholder"></div>
                        @endif
                    </form>
                </div>
                <div class="content__list-list">
                    <strong>Выберите справочник</strong>
                    <ul>
                        @foreach ($pattern->guides as $guide)
                            <li class="content__list-item">
                                <a href="/patternconflicts/show?guide={{$guide->id}}&pattern={{$pattern->id}}"><span>{{$guide->name}}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="content__footer">
                <div class="content__footer-count">
                    <span>Показано 14 из 300 кабелей</span>
                </div>
                <div class="content__footer-pagination">
                    <a href="#" class="prev"></a>
                    <ul>
                        <li><a href="#">1</a></li>
                        <li><a href="#" class="active">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><span>...</span></li>
                        <li><a href="#">22</a></li>
                    </ul>
                    <a href="#" class="next"></a>
                </div>
            </div>
        </div>
    </div>

@endsection