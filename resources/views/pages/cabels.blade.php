@extends('layouts.app')
@section('breadcrumb')
<div class="breadcrumbs">
  <ul>
    <li><a href="/">Главная</a></li>
    <li><span>Кабели</span></li>
  </ul>
</div>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="content__header">
      {{-- <a href="#" class="header-back"></a> --}}
      <h1>Кабели</h1>
    </div>
    <div class="content__filter">
      <div class="content__filter-row">
        <div class="select__container single">
          <div class="select__container-button" data-placeholder="Выберите завод">Выберите завод <i></i></div>
          <div class="select__container-dropdown">
            <div class="select__dropdown">
              <div class="select__dropdown-item">
                <label for="d1">
                  <input type="checkbox" name="" id="d1" value="Кабельком">
                  <p>Кабельком</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d2">
                  <input type="checkbox" name="" id="d2" value="Кабельмаш">
                  <p>Кабельмаш</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d3">
                  <input type="checkbox" name="" id="d3" value="Кубань Кабель">
                  <p>Кубань Кабель</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d4">
                  <input type="checkbox" name="" id="d4" value="Спецкабель">
                  <p>Спецкабель</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d5">
                  <input type="checkbox" name="" id="d5" value="Матоллокамбинат Кубани">
                  <p>Матоллокамбинат Кубани</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d6">
                  <input type="checkbox" name="" id="d6">
                  <p>Кабельком</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d7">
                  <input type="checkbox" name="" id="d7">
                  <p>Кабельмаш</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d8">
                  <input type="checkbox" name="" id="d8">
                  <p>Кубань Кабель</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d9">
                  <input type="checkbox" name="" id="d9">
                  <p>Спецкабель</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d10">
                  <input type="checkbox" name="" id="d10">
                  <p>Матоллокамбинат Кубани</p>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="select__container tags">
          <div class="select__container-button">Выберите кабели <i></i></div>
          <div class="select__container-dropdown">
            <div class="select__dropdown">
              <div class="select__dropdown-item">
                <label for="d11">
                  <input type="checkbox" name="" id="d11" value="СКАБ">
                  <p>СКАБ</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d12">
                  <input type="checkbox" name="" id="d12" value="КВИП">
                  <p>КВИП</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d13">
                  <input type="checkbox" name="" id="d13" value="КуПе">
                  <p>КуПе</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d14">
                  <input type="checkbox" name="" id="d14" value="КУИН">
                  <p>КУИН</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d15">
                  <input type="checkbox" name="" id="d15" value="КУСИЛ-КГТП">
                  <p>КУСИЛ-КГТП</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d16">
                  <input type="checkbox" name="" id="d16" value="ГЕРДА-КОУ">
                  <p>ГЕРДА-КОУ</p>
                </label>
              </div>
              <div class="select__dropdown-item">
                <label for="d17">
                  <input type="checkbox" name="" id="d17" value="ГЕРДА-ТП">
                  <p>ГЕРДА-ТП</p>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="content__filter-reset">
          <button>Сбросить фильтр &#215;</button>
        </div>
      </div>  
      <div class="content__filter-row">
        <div class="content__filter-tags">
          <span>КуПе</span>
          <span>КУИН</span>
          <span>КУСИЛ-КГТП</span>
          <span>ГЕРДА-КОУ</span>
          <span>ГЕРДА-ТП</span>
        </div>
      </div>
    </div>
    <div class="content__table">
      <table>
        <thead>
          <tr>
            <th>Название</th>
            <th>Завод</th>
            <th>Дата</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @for ($i = 0; $i < 16; $i++)
            <tr>
              <td><a href="/cabels/id{{$i}}">КВИП нг(А) УФ x2x ЭМ ГОСТ Р 51511-2001</a></td>
              <td>Кабельком</td>
              <td>12.03.2022</td>
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