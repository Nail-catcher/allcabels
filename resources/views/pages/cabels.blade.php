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
              @foreach($fabrics as $fabric)
              <div class="select__dropdown-item">
                <label for="d1">
                  <input type="checkbox" name="" onchange="getPatterns(this.value)" id="d1" value="{{$fabric->patterns}}">
                  <p>{{$fabric->name}}</p>
                </label>
              </div>
              @endforeach

            </div>
          </div>
        </div>
        <div class="select__container tags">
          <div class="select__container-button">Выберите марку <i></i></div>
          <div class="select__container-dropdown">
            <div class="select__dropdown">

              <div class="select__dropdown-item" id="patternfilter">

              </div>

            </div>
          </div>
        </div>
        <div class="content__filter-reset">
          <button>Сбросить фильтр &#215;</button>
        </div>
      </div>  
      {{--<div class="content__filter-row">--}}
        {{--<div class="content__filter-tags">--}}
          {{--<span>КуПе</span>--}}
          {{--<span>КУИН</span>--}}
          {{--<span>КУСИЛ-КГТП</span>--}}
          {{--<span>ГЕРДА-КОУ</span>--}}
          {{--<span>ГЕРДА-ТП</span>--}}
        {{--</div>--}}
      {{--</div>--}}
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
          @foreach ($cabels as $cabel)
            <tr>
              <td><a href="/cabels/{{$cabel->id}}">{{$cabel->index}}</a></td>
              <td>{{$cabel->fabric->name}}</td>
              <td>{{$cabel->created_at}}</td>
              <td>
                <div class="table__action">
                  <a onclick="return confirm('Are you sure?')" href="{{url('product/destroy/'.$cabel->id)}}" title="Удалить" class="table__action-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>
                </div>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="content__footer">
        <div class="content__footer-count">
          <span>Показано {{$cc}} из {{$cac}} кабелей</span>
        </div>
        <div class="content__footer-pagination">
          <a href="{{$cabels->previousPageURL()}}" class="prev"></a>
          <ul>
            <li><a href="#" class="active">{{$cabels->currentPage()}}</a></li>

          </ul>
          <a href="{{$cabels->nextPageURL()}}" class="next"></a>
        </div>
      </div>
    </div>
  </div>
</div>


  <script>
    function fltr(id) {
      document.location.href = 'cabels?pattern='+id
    }
    function getPatterns(fabric) {
      let fabricjson = JSON.parse(fabric);
      console.log(typeof(fabricjson));
      let b = document.getElementById('patternfilter');
      // fabricjson.forEach(e=>console.log(e));
      fabricjson.forEach(e=> b.innerHTML +='<label for="d'+e.id+'">' +
              '              <input type="checkbox" onchange="fltr(this.value)" name="" id="d'+e.id+'" value="'+e.id+'">' +
              '              <p>'+e.name+'</p>' +
              '              </label>')



    }
  </script>
@endsection