<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Создание заявки</title>
</head>

<body>

    <h1>Формирование заявки</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/applications/create">
        @csrf

        <label>Наименование курса:</label><br>
        <input type="text" name="course_name" value="{{ old('course_name') }}"><br><br>

        <label>Желаемая дата начала:</label><br>
        <input type="date" name="start_date" value="{{ old('start_date') }}"><br><br>

        <label>Способ оплаты:</label><br>
        <select name="payment_method">
            <option value="cash">Наличные</option>
            <option value="phone_transfer">Перевод по телефону</option>
        </select><br><br>

        <button type="submit">Отправить</button>
    </form>

    <br>
    <a href="/applications">Назад</a>

</body>

</html>
