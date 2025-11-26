<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мои заявки</title>
</head>
<body>

<h1>Мои заявки</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Курс</th>
        <th>Дата начала</th>
        <th>Оплата</th>
        <th>Статус</th>
        <th>Отзыв</th>
    </tr>

    @foreach ($applications as $app)
        <tr>
            <td>{{ $app->id }}</td>
            <td>{{ $app->course_name }}</td>
            <td>{{ $app->start_date }}</td>
            <td>
                @if ($app->payment_method === 'cash')
                    Наличные
                @else
                    Перевод по телефону
                @endif
            </td>
            <td>{{ $app->status }}</td>
            <td>
                @if ($app->review)
                    {{ $app->review }}
                @else
                    <form method="POST" action="/applications/{{ $app->id }}/review">
                        @csrf
                        <textarea name="review" rows="3" cols="30"></textarea><br>
                        <button type="submit">Отправить</button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
</table>

<br>
<a href="/dashboard">Назад</a>

</body>
</html>
