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
			@foreach($fabrics as $fabric)
        		<div class="content__card">

        			<div class="content__card-title">{{$fabric->name}}</div>
        			<div class="content__card-btn">
        				<a href="/guides?fabric={{$fabric->id}}" class="btn btn-primary">Справочники</a>
        				<a href="/patterns" class="btn btn-secondary">Шаблоны</a>
        			</div>

        		</div>
			@endforeach
        </div>
        <div class="content__footer">
        	<div class="content__footer-count">
        		<span>Показано {{count($fabrics)}} из {{$count}} Заводов</span>
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
			<a href="#" id="btn" class="btn btn-primary">Отправить</a>
		</div>
	</div>
</div>
	<script>

function storeFab() {
	const url = '{{ route('fabrics.store') }}';
	const data = {name: document.getElementById("name").value};
	const csrfToken = "{{csrf_token()}}"
	fetch(url, {
		method: 'POST',
		redirect: 'follow',
		body: JSON.stringify(data),
		headers: {
			'Content-Type': 'application/json',
			'x-csrf-token': csrfToken
		}
	}).then(response => {
		console.log(data);
		window.location.reload()
	}).catch(error => {
		// обработка ошибки
		console.log(error);
	});
}

document.getElementById("btn").onclick = storeFab;
	</script>
@endsection
