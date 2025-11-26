<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
</head>
<body>

<h1>Админ-панель: Все заявки</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Пользователь</th>
        <th>Курс</th>
        <th>Дата начала</th>
        <th>Оплата</th>
        <th>Статус</th>
        <th>Отзыв</th>
        <th>Действия</th>
    </tr>

    @foreach ($applications as $app)
        <tr>
            <td>{{ $app->id }}</td>
            <td>{{ $app->user->fio }}<br>({{ $app->user->login }})</td>
            <td>{{ $app->course_name }}</td>
            <td>{{ $app->start_date }}</td>
            <td>
                @if ($app->payment_method == 'cash')
                    Наличные
                @else
                    Перевод по телефону
                @endif
            </td>
            <td>{{ $app->status }}</td>
            <td>{{ $app->review ?? '—' }}</td>
            <td>
                <form method="POST" action="/admin/applications/{{ $app->id }}/status">
                    @csrf

                    <select name="status">
                        <option value="new" {{ $app->status=='new'?'selected':'' }}>Новая</option>
                        <option value="in_progress" {{ $app->status=='in_progress'?'selected':'' }}>Идёт обучение</option>
                        <option value="completed" {{ $app->status=='completed'?'selected':'' }}>Обучение завершено</option>
                    </select>

                    <button type="submit">Обновить</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<br>
<a href="/dashboard">Назад</a>

</body>
</html>
