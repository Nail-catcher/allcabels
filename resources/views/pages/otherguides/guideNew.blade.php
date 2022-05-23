@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumbs">
  <ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/otherguides">Другие справочники</a></li>
    <li><span>Cправочник {{$guide->name}}</span></li>
  </ul>
</div>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="content__header">
      <div>
        <a href="{{ url()->previous() }}" class="header-back"></a>
        <h1>Cправочник {{$guide->name}}</h1>
      </div>
      <div>
      	{{--<a href="/fabric/exclusion/new" class="btn btn-secondary">Задать исключения</a>--}}
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
	          	@foreach($guide->points as $point)
	          	<tr>
		            <td>{{$point->index ?? 'Без индекса'}}</td>
		            <td>{{$point->description}}</td>
		            <td>
		              <div class="table__action">
						  <a href="#" title="Редактировать"  data-modal data-target="editIndex" data-index="{{$point->index}}" data-description="{{$point->description}}" onclick="dataUpdatePoint({{$point}})" class="table__action-edit"><img src="{{ asset('images/svg/edit.svg') }}" alt=""></a>
						  <a onclick="return confirm('Are you sure?') ? deleteOGuidePoint({{$point->id}}) : false"  title="Удалить" class="table__action-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>
					  </div>
		            </td>
	            </tr>

	            @endforeach
	        </tbody>
	    </table>
	    <div class="content__table-action">
	    	<a href="#" data-modal data-target="addIndex"><span>+</span> Добавить индекс</a>
	    </div>
    </div>
  </div>
</div>

{{--<div class="content__bottom">--}}
	{{--<a href="#" class="btn btn-secondary-border">Отменить</a>--}}
	{{--<a href="#" class="btn btn-primary">Сохранить</a>--}}
{{--</div>--}}

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

					<input type="hidden" id="guide" name="guide" value="{{$guide->id}}">
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
			<a href="#" id="btn" class="btn btn-primary">Добавить</a>
		</div>
	</div>
</div>
<div class="modal" id="editIndex">
	<div class="modal__overlay"></div>
	<div class="modal__content">
		<div class="modal__content-title">
			<strong>Добавить индекс</strong>
			<a href="#" data-dismiss class="close">&#215;</a>
		</div>
		<div class="modal__content-body">
			<form action="" method="POST">
				<label for="">
					<input type="hidden" id="editpoint" name="guide">
					<input type="hidden" id="editguide" name="guide" value="{{$guide->id}}">
					<span>Индекс</span>
					<input type="text" id="editname" name="name" placeholder="Введите индекс">
				</label>
				<label for="">
					<span>Описание</span>
					<textarea name="editdescription" id="editdescription" placeholder="Введите описание"></textarea>
				</label>
			</form>
		</div>
		<div class="modal__content-footer">
			<a href="#" class="btn btn-secondary" data-dismiss>Отменить</a>
			<a href="#" id="btn" class="btn btn-primary" onclick="updatePoint()">Добавить</a>
		</div>
	</div>
</div>
<script>
	function storeGuide() {
		const url = '{{ route('otherguidespoints.store') }}';
		const data = {
			guide: document.getElementById("guide").value,
			index: document.getElementById("name").value,
			description: document.getElementById("description").value
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
		}).then(response => {
			console.log(data);
			window.location.reload()
		}).catch(error => {
			// обработка ошибки
			console.log(error);
		});

	}

	document.getElementById("btn").onclick = storeGuide;
	function dataUpdatePoint(point) {
		console.log(point);
		document.getElementById("editpoint").value=point.id
		document.getElementById("editname").value=point.index
		document.getElementById("editdescription").value=point.description
	}

	function updatePoint (){
				{{--const url = '{{ route('points.update') }}';--}}
		const data = {
					point: document.getElementById("editpoint").value,
					guide: document.getElementById("guide").value,
					index: document.getElementById("editname").value,
					description: document.getElementById("editdescription").value
				};
		const url = '/otherguidespoints/'+data.point;
		const csrfToken = "{{csrf_token()}}"
		fetch(url, {
			method: 'PUT',
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
	function deleteOGuidePoint (point){
				{{--const url = '{{ route('points.update') }}';--}}
		const data = {
					// fabric: document.getElementById("fabric").value,
					point: point,

				};
		const url = '/otherguidespoints/'+point;
		const csrfToken = "{{csrf_token()}}"
		fetch(url, {
			method: 'DELETE',
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
</script>
@endsection