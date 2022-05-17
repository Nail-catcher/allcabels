@extends('layouts.app')

@section('breadcrumb')
    <div class="breadcrumbs">
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/fabric">Заводы</a></li>
            <li><a href="{{ url()->previous() }}">Исключения шаблона {{$pattern->name}}</a></li>
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
                    <h1>Выберите исключаемый индекс</h1>
                </div>
                {{--<div>--}}
                {{--<a href="#" class="btn btn-secondary">Отменить</a>--}}
                {{--<a href="#" class="btn btn-primary">Сохранить исключения</a>--}}
                {{--</div>--}}
            </div>
            <div class="content__list" style="flex: 0 0 100%; width: 100%;">

                <input type="hidden" id="pattern" value="{{$pattern->id}}">
                <div class="content__list-list justify-start">
                    {{--<strong>{{$guide->name}}</strong>--}}
                    <ul>
                        @foreach ($guide->points as $point)
                            <li class="content__list-item">
                                <label for="in{{$point->id}}" class="content__list-label">
                                    <input type="checkbox" value = "{{$point->id}}" name="{{$point->id}}" id="in{{$point->id}}" class="checkbox">
                                    <b>{{$point->index}}</b>
                                    <span>{{$point->description}}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <a href="#" class="btn btn-primary"   onclick="storeConflicts()" style="width: fit-content;">Подтвердить</a>
            </div>
        </div>
    </div>
    <script>

        function getCheckedCheckBoxes() {
            var checkboxes = document.getElementsByClassName('checkbox');
            var checkboxesChecked = []; // можно в массиве их хранить, если нужно использовать
            for (var index = 0; index < checkboxes.length; index++) {
                if (checkboxes[index].checked) {
                    checkboxesChecked.push(checkboxes[index].value); // положим в массив выбранный
                    // alert(checkboxes[index].value); // делайте что нужно - это для наглядности
                }
            }
            return checkboxesChecked; // для использования в нужном месте
        }

        function storeConflicts() {
            const url = '{{ route('patternotherguides.store') }}';
            const data = {
                pattern: document.getElementById("pattern").value,

                points: getCheckedCheckBoxes()
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
            }).then(response => document.location.href = '/patternotherguides?pattern='+data.pattern)

                .catch(error => {
                    // обработка ошибки
                    console.log(error);
                });


        }


    </script>
@endsection