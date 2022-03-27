@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumbs">
 	<ul>
 		<li><span>Главная</span></li>
 	</ul>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="content__header">
            <h1>Главная</h1>
        </div>
        <div class="content__empty">
        	<h2>Сейчас тут пусто</h2>
        	<p>На этой странице будет отображаться стастика <br/>по вашей работе. Начните работы с добавления завода</p>
        	<a href="/fabric" class="btn btn-primary">Начать работу</a>
        </div>
    </div>
</div>
@endsection
