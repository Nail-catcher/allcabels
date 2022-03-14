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
            <h1>Заводы <a href="#" class="add">+</a></h1>
        </div>
    </div>
</div>
@endsection
