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
            <h1>Кабели <a href="#" class="add">+</a></h1>
        </div>
        <div class="content__filter">
        	<select name="" id="" placeholder="Выберите завод">
        		<option value="" disabled selected>Выберите завод</option>
        		<option value="">Кабельком</option>
        		<option value="">Кабельмаш</option>
        		<option value="">Кубань Кабель</option>
        		<option value="">Спецкабель</option>
        		<option value="">Матоллокамбинат Кубани</option>
        	</select>
        	<select name="" id="" placeholder="Выберите кабели">
        		<option value="" disabled selected>Выберите кабели</option>
        		<option value="">СКАБ</option>
        		<option value="">КВИП</option>
        		<option value="">КуПе</option>
        		<option value="">КУИН</option>
        		<option value="">КУСИЛ-КГТП</option>
        		<option value="">ГЕРДА-КОУ</option>
        		<option value="">ГЕРДА-ТП</option>
        	</select>
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
        			@for ($i = 0; $i < 14; $i++)
	        			<tr>
	        				<td>КВИП нг(А) УФ x2x ЭМ ГОСТ Р 51511-2001</td>
	        				<td>Кабельком</td>
	        				<td>12.03.2022</td>
	        				<td>
	        					<div class="table__action">
	        						<a href="#" class="table__action-edit"><img src="{{ asset('images/svg/edit.svg') }}" alt=""></a>
	        						<a href="#" class="table__action-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>
	        					</div>
	        				</td>
	        			</tr>
        			@endfor
        		</tbody>
        	</table>
        	<div class="content__table-footer">
        		<div class="content__table-count">
        			<span>Показано 14 из 300 кабелей</span>
        		</div>
        		<div class="content__table-pagination">
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
