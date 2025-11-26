<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
    <h1>Регистрация пользователя</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <label>Логин:</label><br>
        <input type="text" name="login" value="{{ old('login') }}"><br><br>

        <label>Пароль:</label><br>
        <input type="password" name="password"><br><br>

        <label>ФИО:</label><br>
        <input type="text" name="fio" value="{{ old('fio') }}"><br><br>

        <label>Телефон (формат 8(XXX)XXX-XX-XX):</label><br>
        <input type="text" name="phone" value="{{ old('phone') }}"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email" value="{{ old('email') }}"><br><br>

        <button type="submit">Создать пользователя</button>
    </form>

    <br>
    <a href="/login">Уже зарегистрированы? Войти</a>
</body>
</html>
