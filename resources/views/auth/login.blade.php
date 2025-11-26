<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
</head>
<body>

<h1>Авторизация</h1>

@if ($errors->has('login_error'))
    <div style="color:red;">
        {{ $errors->first('login_error') }}
    </div>
@endif

<form method="POST" action="/login">
    @csrf

    <label>Логин:</label><br>
    <input type="text" name="login"><br><br>

    <label>Пароль:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Войти</button>
</form>

<br>
<a href="/register">Еще не зарегистрированы? Регистрация</a>

</body>
</html>
