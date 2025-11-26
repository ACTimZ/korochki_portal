<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои заявки</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-teal-700">
        <article class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-white">Портал "Корочки.есть"</h1>
            <nav class="space-x-25">
                <a href="/applications" class="text-white hover:underline">Мои заявки</a>
                <a href="/applications/create" class="text-white hover:underline">Создать заявку</a>
                @if (session()->get('is_admin'))
                    <a href="/admin" class="text-white hover:underline">Админка</a>
                @endif
                <a href="/logout"
                    class="text-white duration-150 bg-red-700 hover:bg-red-800 py-1.5 px-2.5 rounded-xl">Выйти</a>
            </nav>
        </article>
    </header>

    <main class="flex-grow px-4 py-6 container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Мои заявки</h2>

        @if (session('success'))
            <p class="text-green-600 mb-4">{{ session('success') }}</p>
        @endif

        @if ($applications->isEmpty())
            <p class="text-gray-400 font-semibold text-3xl mb-15">У вас сейчас нет заявок на обучение!</p>
        @else
            <article class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-teal-600 text-white">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Курс</th>
                            <th class="px-4 py-2">Дата начала</th>
                            <th class="px-4 py-2">Оплата</th>
                            <th class="px-4 py-2">Статус</th>
                            <th class="px-4 py-2">Отзыв</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $app)
                            <tr class="bg-white even:bg-gray-100">
                                <td class="border px-4 py-2 text-center">{{ $app->id }}</td>
                                <td class="border px-4 py-2">{{ $app->course_name }}</td>
                                <td class="border px-4 py-2">{{ $app->start_date }}</td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($app->payment_method === 'cash')
                                        Наличные
                                    @else
                                        Перевод по телефону
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">{{ $app->status }}</td>
                                <td class="border px-4 py-2 w-1/6">
                                    @if ($app->review)
                                        {{ $app->review }}
                                    @else
                                        <form method="POST" action="/applications/{{ $app->id }}/review"
                                            class="flex flex-row items-center justify-between gap-3.5">
                                            @csrf
                                            <textarea name="review" rows="2"
                                                class="border rounded-lg px-2 py-1 resize-none focus:outline-none"></textarea>
                                            <button type="submit"
                                                class="bg-amber-400 text-black font-semibold py-1.5 px-3 rounded-lg hover:bg-amber-500 duration-150 cursor-pointer w-max">
                                                Отправить
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </article>
        @endif

        <article class="mt-6">
            <a href="/dashboard" class="text-blue-500 font-bold hover:underline duration-150"><- Назад</a>
        </article>
    </main>


</body>

</html>
