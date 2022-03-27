@extends('layouts.app')
@section('breadcrumb')
<div class="breadcrumbs">
  <ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/fabric">Заводы</a></li>
    <li><span>Справочники {{$id}}</span></li>
  </ul>
</div>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="content__header">
      <div>
        <a href="{{ url()->previous() }}" class="header-back"></a>
        <h1>Справочники {{$id}} <a href="guides/new" class="add">+</a></h1>
      </div>
      <a href="/fabric/{{$id}}/exclusion" class="btn btn-secondary">Исключения <img src="{{ asset('images/svg/exclusion.svg') }}" alt=""></a>
    </div>
    <div class="content__table">
      <table>
        <thead>
          <tr>
            <th>Название</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @for ($i = 0; $i < 16; $i++) <tr>
            <td>Индивидуальный экран каждой пары</td>
            <td>
              <div class="table__action">
                <a href="#" title="Редактировать" class="table__action-edit"><img src="{{ asset('images/svg/edit.svg') }}" alt=""></a>
                <a href="#" title="Удалить" class="table__action-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>
              </div>
            </td>
            </tr>
            @endfor
        </tbody>
      </table>
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
</div>
@endsection