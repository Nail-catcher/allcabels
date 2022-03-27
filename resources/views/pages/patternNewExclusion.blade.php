@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumbs">
  <ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/fabric">Заводы</a></li>
    <li><a href="{{ url()->previous() }}">Шаблоны {{$id}}</a></li>
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
        <h1>Новый шаблон</h1>
      </div>
      <div>
      	<a href="/fabric/{{$id}}/exclusion/new" class="btn btn-primary">Задать исключения</a>
      </div>
    </div>
    <div class="row-flex">
    	<div class="content__list">
    		<div class="content__list-form">
    			<form action="">
    				<label for="#">
    					<span>Название</span>
    					<input type="text" placeholder="Название шаблона" name="name" id="name">
    				</label>
    				<input type="text" class="xs" placeholder="Введите префикс" name="prefix" id="prefix">
    			</form>
    		</div>
    		<div class="content__list-list">
    			<strong>Элементы шаблона</strong>
    			<ul>
    				@for ($i = 0; $i < 16; $i++)
    				<li class="content__list-item">
    					<span>Использование кабеля во взрывоопасных зонах</span>
    					<div class="content__list-action">
	    					<label for="u{{$i}}">
	    						<input type="checkbox" name="unique" id="u{{$i}}">
	    						<span>Уникальный</span>
	    					</label>
	    					<a title="Удалить" href="#" class="btn-circle btn-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>
	    					<span class="movable"></span>
    					</div>
    				</li>
    				@endfor
    			</ul>
    		</div>
    	</div>
    	<div class="content__form"></div>
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