@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumbs">
 	<ul>
 		<li><a href="/">Главная</a></li>
 		<li><span>Заводы</span></li>
 	</ul>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="content__header">
            <h1>Заводы <a href="#" class="add" data-modal data-target="addManufacture">+</a></h1>
        </div>
        <div class="content__grid">
        	@for ($i = 0; $i < 16; $i++)
        		<div class="content__card">
        			<div class="content__card-title">Кабельком</div>
        			<div class="content__card-btn">
        				<a href="fabric/id{{$i}}/guides" class="btn btn-primary">Справочники</a>
        				<a href="fabric/id{{$i}}/patterns" class="btn btn-secondary">Шаблоны</a>
        			</div>
        		</div>
        	@endfor
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

<div class="modal" id="addManufacture">
	<div class="modal__overlay"></div>
	<div class="modal__content">
		<div class="modal__content-title">
			<strong>Добавьте завод</strong>
			<a href="#" data-dismiss class="close">&#215;</a>
		</div>
		<div class="modal__content-body">
			<form action="" method="POST">
				<label for="">
					<span>Название завода</span>
					<input type="text" id="name" name="name" placeholder="Введите название завода">
				</label>
			</form>
		</div>
		<div class="modal__content-footer">
			<a href="#" class="btn btn-secondary" data-dismiss>Отменить</a>
			<a href="#" class="btn btn-primary">Отправить</a>
		</div>
	</div>
</div>
@endsection
