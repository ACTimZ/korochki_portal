<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex items-center justify-center min-h-screen">

    <article class="bg-gray-50 border border-gray-400 py-12 px-25 rounded-xl w-2/6">
        <h1 class="text-2xl font-bold mb-5 text-center">Регистрация</h1>

        @if ($errors->any())
            <article class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </article>
        @endif

        <form method="POST" action="/register" class="flex flex-col gap-5">
            @csrf

            <article>
                <label class="block font-light">Логин:</label>
                <input type="text" name="login" value="{{ old('login') }}" class="bg-white w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none" placeholder="Логин">
            </article>

            <article>
                <label class="block font-light">Пароль:</label>
                <input type="password" name="password" class="bg-white w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none" placeholder="Пароль">
            </article>

            <article>
                <label class="block font-light">ФИО:</label>
                <input type="text" name="fio" value="{{ old('fio') }}" class="bg-white w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none" placeholder="Кумушкин Иван Петрович">
            </article>

            <article>
                <label class="block font-light">Телефон:</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="bg-white w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none" placeholder="8(XXX)XXX-XX-XX">
            </article>

            <article>
                <label class="block font-light">Email:</label>
                <input type="text" name="email" value="{{ old('email') }}" class="bg-white w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none" placeholder="example@example.com">
            </article>

            <button type="submit" class="cursor-pointer self-center bg-teal-700 text-white font-semibold px-15 py-3 rounded-lg hover:bg-teal-800 transition-colors">
                Зарегистрироваться
            </button>
        </form>

        <p class="mt-4 text-center text-sm">
            <a href="/login" class="text-amber-500 text-xs hover:underline">Уже зарегистрированы? <span class="font-bold">Войти</span></a>
        </p>
    </article>

</body>
</html>
