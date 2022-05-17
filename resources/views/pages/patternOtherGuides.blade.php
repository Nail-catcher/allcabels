@extends('layouts.app')

@section('breadcrumb')
    <div class="breadcrumbs">
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/fabric">Заводы</a></li>
            <li><a href="/fabric">Шаблоны {{$pattern->id}}</a></li>
            <li><span>Исключения</span></li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="content__header">
                <div>
                    <a href="{{ url()->previous() }}" class="header-back"></a>
                    <h1>Общие справочники «Шаблона {{$pattern->name}}»</h1>
                </div>
                <div>
                    <a href="/patternotherguides/create?pattern={{$pattern->id}}" class="btn btn-primary">Задать общие справочники</a>
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
                    @foreach ($pattern->otherguidespoints as $point) <tr>
                        {{--<td>Исключение 1</td>--}}
                        <td>{{$point->index}}</td>
                        <td>{{$point->description}}</td>
                        <td>
                            <div class="table__action">
                                <input type="hidden" id="pattern" value="{{$pattern->id}}">

                                <input type="hidden" id="point" value="{{$point->id}}">
                                <a title="Удалить" onclick="deletePoint()"  class="table__action-remove"><img src="{{ asset('images/svg/trash.svg') }}" alt=""></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="content__footer">
                    <div class="content__footer-count">
                        <span>Показано 1 из 1 общих справочников</span>
                    </div>
                    <div class="content__footer-pagination">
                        <a href="#" class="prev"></a>
                        <ul>
                            <li><a href="#" class="active">1</a></li>


                        </ul>
                        <a href="#" class="next"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        function deletePoint() {
            const data = {
                point: document.getElementById("point").value,
                pattern: document.getElementById('pattern').value,
            };

            const url = '{{ route('patternotherguides.destroy', 0) }}';
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

        document.getElementById("btn").onclick = storeGuide;
    </script>
@endsection



