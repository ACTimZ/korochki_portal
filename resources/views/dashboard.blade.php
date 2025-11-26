<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-teal-700">
        <article class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-white">Портал "Корочки.есть"</h1>
            <nav class="space-x-25">
                <a href="/applications" class="text-white hover:underline">Мои заявки</a>
                <a href="/applications/create" class="text-white hover:underline">Создать заявку</a>
                @if(session()->get('is_admin'))
                    <a href="/admin" class="text-white hover:underline">Админка</a>
                @endif
                <a href="/logout" class="text-white duration-150 bg-red-700 hover:bg-red-800 py-1.5 px-2.5 rounded-xl">Выйти</a>
            </nav>
        </article>
    </header>

    <main class="flex-grow flex items-center justify-center">
        <article class="text-center">
            <h2 class="text-3xl font-bold mb-4">Добро пожаловать!</h2>
            <p class="text-gray-700">Вы вошли в систему как <b>{{ session()->get('is_admin') ? 'администратор' : 'пользователь' }}</b></p>
        </article>
    </main>

</body>
</html>
