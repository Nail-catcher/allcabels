@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumbs">
  <ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/fabric">Заводы</a></li>
    <li><a href="{{ url()->previous() }}">Справочники {{$id}}</a></li>
    <li><span>Новый справочник</span></li>
  </ul>
</div>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="content__header">
      <div>
        <a href="{{ url()->previous() }}" class="header-back"></a>
        <h1>Новый справочник</h1>
      </div>
      <div>
      	<a href="/fabric/{{$id}}/exclusion/new" class="btn btn-secondary">Задать исключения</a>
      	<a href="#" class="btn btn-primary">Импорт Excel</a>
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
	          	@for ($i = 0; $i < 2; $i++) 
	          	<tr>
		            <td>нг(А)</td>
		            <td>не распространяющие горение при групповой прокладке по категории "А"</td>
		            <td>
		              <div class="table__action">
		                <a href="#" title="Редактировать" class="table__action-edit"><img src="{{ asset('images/svg/edit.svg') }}" alt=""></a>
		                <a href="#" title="Удалить" class="table__action-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>
		              </div>
		            </td>
	            </tr>
	          	<tr>
		            <td>УФ</td>
		            <td>устойчивость к ультрафиолету в течение всего срока службы кабеля, стойкость к воздействию дождя, динамическому абразивному воздействию пыли, выпадению инея</td>
		            <td>
		              <div class="table__action">
		                <a href="#" title="Редактировать" class="table__action-edit"><img src="{{ asset('images/svg/edit.svg') }}" alt=""></a>
		                <a href="#" title="Удалить" class="table__action-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>
		              </div>
		            </td>
	            </tr>
	          	<tr>
		            <td>Эм</td>
		            <td>оплетка из медных проволок</td>
		            <td>
		              <div class="table__action">
		                <a href="#" title="Редактировать" class="table__action-edit"><img src="{{ asset('images/svg/edit.svg') }}" alt=""></a>
		                <a href="#" title="Удалить" class="table__action-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>
		              </div>
		            </td>
	            </tr>
	          	<tr>
		            <td>без индекса</td>
		            <td>без общего экрана</td>
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
	    <div class="content__table-action">
	    	<a href="#" data-modal data-target="addIndex"><span>+</span> Добавить индекс</a>
	    </div>
    </div>
  </div>
</div>

<div class="content__bottom">
	<a href="#" class="btn btn-secondary-border">Отменить</a>
	<a href="#" class="btn btn-primary">Сохранить</a>
</div>

<div class="modal" id="addIndex">
	<div class="modal__overlay"></div>
	<div class="modal__content">
		<div class="modal__content-title">
			<strong>Добавить индекс</strong>
			<a href="#" data-dismiss class="close">&#215;</a>
		</div>
		<div class="modal__content-body">
			<form action="" method="POST">
				<label for="">
					<span>Индекс</span>
					<input type="text" id="name" name="name" placeholder="Введите индекс">
				</label>
				<label for="">
					<span>Описание</span>
					<textarea name="description" id="description" placeholder="Введите описание"></textarea>
				</label>
			</form>
		</div>
		<div class="modal__content-footer">
			<a href="#" class="btn btn-secondary" data-dismiss>Отменить</a>
			<a href="#" class="btn btn-primary">Далее</a>
		</div>
	</div>
</div>

@endsection