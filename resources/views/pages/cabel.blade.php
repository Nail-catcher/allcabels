@extends('layouts.app')
@section('breadcrumb')
<div class="breadcrumbs">
  <ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/cabels">Кабели</a></li>
    <li><span>Кабель {{$cabel->id}}</span></li>
  </ul>
</div>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="content__header">
      <div>
        <a href="#" class="header-back"></a>
        <h1>Кабель {{$cabel->id}}</h1>
      </div>
    </div>
    <div class="content__text">
      <div class="content__text-block">
        <h2>{{$cabel->index}}</h2>
        {{--<strong>kvip-nga-uf-x2x-em-</strong>--}}
      </div>
      <div class="content__text-block">
        <h3>Марка\Шаблон</h3>
        <p>{{$cabel->pattern->name}}</p>
      </div>
      <div class="content__text-block">
        <h3>Характеристики:</h3>
        <ul>
          @foreach($cabel->points as $point)
          <li><b>{{$point->index}}</b><p>{{$point->description}}</p></li>
         @endforeach
        </ul>
      </div>
      <div class="content__text-block">
        <h3>Описание</h3>
        <p>{{$cabel->description}}</p>
         </div>
    </div>
  </div>
</div>
@endsection