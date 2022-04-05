@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumbs">
  <ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/fabric">Заводы</a></li>
    <li><a href="{{ url()->previous() }}">Шаблоны {{$fabric->name}}</a></li>
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
      {{--<div>--}}
      	{{--<a href="/fabric/exclusion/new" class="btn btn-primary">Задать исключения</a>--}}
      {{--</div>--}}
    </div>
    <div class="row-flex">
    	<div class="content__list">
    		<div class="content__list-form">
    			<form action="">
    				<label for="#">
    					<span>Название</span>
    					<input type="text" placeholder="Название шаблона" name="name" id="name">
    				</label>
					<input type="hidden" class="xs" name="fabric" id="fabric" value="{{$fabric->id}}">

					<input type="text" class="xs" placeholder="Введите префикс" name="prefix" id="prefix">
    			</form>
    		</div>
    		<div class="content__list-list">
    			<strong>Элементы шаблона</strong>
    			<ul id="sortable">

    				{{--<li class="content__list-item">--}}
    					{{--<span>Использование кабеля во взрывоопасных зонах</span>--}}
    					{{--<div class="content__list-action">--}}
	    					{{--<label for="u1">--}}
	    						{{--<input type="checkbox" name="unique" id="u1">--}}
	    						{{--<span>Уникальный</span>--}}
	    					{{--</label>--}}
	    					{{--<a href="#" title="Удалить" class="btn-circle btn-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>--}}
	    					{{--<span class="movable"></span>--}}
    					{{--</div>--}}
    				{{--</li>--}}

    			</ul>
    		</div>
    	</div>
    	<div class="content__form" id="content__form">
        <form action="#" class="content__form-form">
          <div class="content__form-title">Добавить справчоник</div>
          <fieldset class="content__form-fieldset">
            <input type="text" class="xs input-search" placeholder="Поиск" name="search">
			  <div class="content__form-list" id = "cfl">
                {{--@foreach($fabric->guides as $guide)--}}
              {{--<label for="l1" class="content__form-list-item">--}}
                {{--<input type="checkbox" name="" id="l1">--}}
                {{--<p>{{$guide->name}}</p>--}}
              {{--</label>--}}
             {{--@endforeach--}}
            </div>
          </fieldset>
          <fieldset class="content__form-fieldset">
            <strong>Добавить разделитель</strong>
            <label for="">
              <input type="text" placeholder="Введите разделитель" id="constant" name="">
              <a href="#" class="btn btn-primary" id="constantbutton" >Добавить</a>
            </label>
          </fieldset>
          <fieldset class="content__form-fieldset">
            <strong>Добавить ГОСТ / ТУ</strong>
            <label for="">
              <input type="text" placeholder="Введите ГОСТ или ТУ" id="gosttu" name="">
              <a href="#" class="btn btn-primary" id="gosttubutton">Добавить</a>
            </label>
          </fieldset>
        </form> 
      </div>
    </div>
  </div>
</div>

<div class="content__bottom">
	<a href="#" class="btn btn-secondary-border">Отменить</a>
	<a href="#" class="btn btn-primary" id="btn">Сохранить</a>
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

<script>
	var points = [];
	var constantcount = 0;
	function ola() {
		let q = document.getElementById('sortable');
		q.innerHTML =null;
		//points.forEach(e=> q.innerHTML +=e.html)
		points.forEach(e=> q.innerHTML +=e.html)
	}
	function uuu(id, name,type) {
		let bool = 0;
		if(!type){
			let type= 'hola';
		}
		let ivent = {
			id: id.toString(),
			name: name.toString(),
			unique: 0,
			type:type,
			html: '<li class="content__list-item">\n' +
					'    \t\t\t\t\t<span>'+ name +'</span>\n' +
					'    \t\t\t\t\t<div class="content__list-action">\n' +
					'\t    \t\t\t\t\t<label for="u1">\n' +
					'\t    \t\t\t\t\t\t<input type="checkbox" name="unique" id="u1">\n' +
					'\t    \t\t\t\t\t\t<span>Уникальный</span>\n' +
					'\t    \t\t\t\t\t</label>\n' +
					'\t    \t\t\t\t\t<a href="#" onclick="uuu('+"'"+id+"'"+', '+"'"+name+"'"+')" title="Удалить" class="btn-circle btn-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>\n' +
					'\t    \t\t\t\t\t<span class="movable"></span>\n' +
					'    \t\t\t\t\t</div>\n' +
					'    \t\t\t\t</li>',
		};

		points.forEach(e=>{
			if(e.id==id) {
				bool = 1;
				var index =  points.indexOf(e);
				if (index >= 0) {
					points.splice( index, 1 );
					ola();
				}
			}
		});
		if(bool ===0){
			points.push(ivent);
			ola();
		}


		console.log(points);
		//console.log(newpoints);

	}
	function hui () {
	    let fabric = 1;

		const url = '{{ route('guides.index') }}';
		const data = {
			fabric: 1,

		};
		let b = document.getElementById('cfl');
		const csrfToken = "{{csrf_token()}}"
		fetch('/api/guides?fabric=1', {
			method: 'GET',

		}).then(response => response.json())
				.then(guide => (
						// guide.data.forEach(e=>console.log(e.name))
						 guide.data.forEach(e=> b.innerHTML +='<label for="l1" class="content__form-list-item"><input type="checkbox" name="checkli" id="'+e.name+'" onchange="uuu(this.value, this.id, this.name)" value="'+e.id+'"><p>'+e.name+'</p></label>')

				))

				// 				'<label for="l1" class="content__form-list-item">'+'<input type="checkbox" name="" id="l1">'+'<p>'+e.name+'</p>'+'</label>'))
				// // )


	}
	function addConstant(){
		let name = document.getElementById("constant").value;
		let id = 'Const'+constantcount;
		let type = 'constant';
		constantcount ++;
		uuu(id,name, type);

	}
	function addGostTu(){
		let name = document.getElementById("gosttu").value;
		let id = 'GOST';
		let type = 'constant';
		uuu(id,name, type);

	}
	function storePattern() {
		let prefix = {
			id: "Prefix",
			name: document.getElementById("prefix").value,
			type: "prefix"
		};
		points.unshift(prefix)
		const url = '{{ route('patterns.store') }}';
		const data = {
			fabric: document.getElementById("fabric").value,
			name: document.getElementById("name").value,
			guides:points
		};
		const csrfToken = "{{csrf_token()}}"

		// var data = new FormData()
		// data.append('fabric', document.getElementById("fabric").value)
		// data.append('name', document.getElementById("name").value)
		// data.append('points', points)
		fetch(url, {
			method: 'POST',
			redirect: 'follow',
			body: JSON.stringify(data),
			headers: {
				'Content-Type': 'application/json',
				'x-csrf-token': csrfToken
			}
		}).then(response => response.json())
				.then(pattern => (document.location.href = '/patterns?fabric='+document.getElementById("fabric").value))
				.catch(error => {
					// обработка ошибки
					console.log(error);
				});

	}
	document.getElementById("constantbutton").onclick = addConstant;
	document.getElementById("gosttubutton").onclick = addGostTu;
	document.getElementById("btn").onclick = storePattern;
	hui();
	// document.getElementsByName('checkli').onclick = hui2;

	//document.getElementById("btn").onclick = storeGuide;

</script>
@endsection