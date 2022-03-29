@extends('layouts.app')
@section('breadcrumb')
<div class="breadcrumbs">
  <ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/fabric">Заводы</a></li>
    <li><span>Справочники {{$fabric->name}}</span></li>
  </ul>
</div>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="content__header">
      <div>
        <a href="{{ url()->previous() }}" class="header-back"></a>
        <h1>Справочники  {{$fabric->name}}<a href="#" class="add" data-modal data-target="addManufacture">+</a></h1>
      </div>
      <a href="/fabric/?/exclusion" class="btn btn-secondary">Исключения <img src="{{ asset('images/svg/exclusion.svg') }}" alt=""></a>
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
          @foreach ($guides as $guide) <tr>
            <td>{{$guide->name}}</td>
            <td>
              <div class="table__action">
                <a href="{{url('/guide?guide='.$guide->id)}}" title="Редактировать" class="table__action-edit"><img src="{{ asset('images/svg/edit.svg') }}" alt=""></a>
                <a onclick="return confirm('Are you sure?')" href="{{url('guide/destroy/'.$guide->id)}}" title="Удалить" class="table__action-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>
              </div>
            </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="content__footer">
        <div class="content__footer-count">
          <span>Показано {{count($guides)}} из {{$count}} Справочников</span>
        </div>
        <div class="content__footer-pagination">
          <a href="#" class="prev"></a>
          <ul>

            <li><a href="#" class="active">1</a></li>
            {{--<li><a href="#">3</a></li>--}}
            {{--<li><a href="#">4</a></li>--}}
            {{--<li><span>...</span></li>--}}
            {{--<li><a href="#">22</a></li>--}}
          </ul>
          <a href="#" class="next"></a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="addManufacture">
  <div class="modal__overlay"></div>
  <div class="modal__content">
    <div class="modal__content-title">
      <strong>Добавьте спавочник</strong>
      <a href="#" data-dismiss class="close">&#215;</a>
    </div>
    <div class="modal__content-body">
      <form action="" method="POST">
        <label for="">
          <input type="hidden" id="fabric" name="fabric" value="{{$fabric->id}}">
          <span>Название справочника</span>
          <input type="text" id="name" name="name" placeholder="Введите название справочника">
          <span>Описание справочника</span>
          <input type="text" id="desc" name="desc" placeholder="Введите описание справочника">
        </label>
      </form>
    </div>
    <div class="modal__content-footer">
      <a href="#" class="btn btn-secondary" data-dismiss>Отменить</a>
      <a href="#" id="btn" class="btn btn-primary">Отправить</a>
    </div>
  </div>
</div>

  <script>
    function storeGuide() {
      const url = '{{ route('guides.store') }}';
      const data = {
        fabric: document.getElementById("fabric").value,
        name: document.getElementById("name").value,
        description: document.getElementById("desc").value
      };
      const csrfToken = "{{csrf_token()}}"
      fetch(url, {
        method: 'POST',
        redirect: 'follow',
        body: JSON.stringify(data),
        headers: {
          'Content-Type': 'application/json',
          'x-csrf-token': csrfToken
        }
      }).then(response => response.json())
              .then(guide => (document.location.href = '/guide?guide='+guide.id))
    .catch(error => {
      // обработка ошибки
      console.log(error);
    });


    }

    document.getElementById("btn").onclick = storeGuide;

  </script>
@endsection