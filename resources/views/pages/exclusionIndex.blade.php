@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumbs">
  <ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/fabric">Заводы</a></li>
    <li><a href="{{ url()->previous() }}">Шаблон {{$id}}</a></li>
    <li><span>Новый шаблон</span></li>
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
      <div>
      	<a href="#" class="btn btn-secondary">Отменить</a>
      	<a href="#" class="btn btn-primary">Сохранить исключения</a>
      </div>
    </div>
    <div class="content__list" style="flex: 0 0 100%; width: 100%;">
      <div class="content__list-header">
        <form action="" class="content__list-index">
          <div class="placeholder">тут будут выбранный справочники</div>
        </form>
      </div>
      <div class="content__list-list justify-start">
        <strong>Использование кабеля во взрывоопасных зонах</strong>
        <ul>
          @for ($i = 0; $i < 6; $i++)
          <li class="content__list-item">
            <label for="in{{$i}}" class="content__list-label">
              <input type="checkbox" name="{{$i}}" id="in{{$i}}">
              <b>нг(А)</b>
              <span>устойчивость к ультрафиолету в течение всего срока службы кабеля, стойкость к воздействию дождя, динамическому абразивному воздействию пыли, выпадению инея</span>
            </label>
          </li>
          @endfor
        </ul>
      </div>
      <a href="/fabric/{{$id}}/exclusion/new?index=нг(А)" class="btn btn-primary" style="width: fit-content;">Подтвердить</a>
    </div>
  </div>
</div>

@endsection