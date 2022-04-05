@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumbs">
  <ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/fabric">Заводы</a></li>
    <li><a href="{{ url()->previous() }}">Исключения {{$fabric->name}}</a></li>
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
      {{--<div>--}}
      	{{--<a href="#" class="btn btn-secondary">Отменить</a>--}}
      	{{--<a href="#" class="btn btn-primary">Сохранить исключения</a>--}}
      {{--</div>--}}
    </div>
    <div class="content__list" style="flex: 0 0 100%; width: 100%;">
      <div class="content__list-header">
        <form action="" class="content__list-index">
          <div class="placeholder"></div>
        </form>
      </div>
      <input type="hidden" id="fabric" value="{{$fabric->id}}">
      <input type="hidden" id="guide" value="{{$guide->id}}">
      <div class="content__list-list justify-start">
        <strong>{{$guide->name}}</strong>
        <ul>
          @foreach ($points as $point)
          <li class="content__list-item">
            <label for="in{{$point->id}}" class="content__list-label">
              <input type="checkbox" onchange="redir(this.name)" name="{{$point->id}}" id="in{{$point->id}}">
              <b>{{$point->index}}</b>
              <span>{{$point->description}}</span>
            </label>
          </li>
          @endforeach
        </ul>
      </div>
      <a href="/fabric/{{$fabric->id}}/exclusion/new?index=нг(А)" class="btn btn-primary" style="width: fit-content;">Подтвердить</a>
    </div>
  </div>
</div>
<script>

  function redir(id){
    let guide = document.getElementById('guide').value;
    let fabric = document.getElementById('fabric').value;
  document.location.href = ' /conflicts/create?guide='+guide+'&fabric='+fabric+'&index='+id;
  }
</script>
@endsection