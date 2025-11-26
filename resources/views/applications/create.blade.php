<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявки</title>
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

    <main class="flex-grow px-4 py-6 flex justify-center">
        <article class="w-full max-w-md mt-15">
            <h2 class="text-2xl font-bold mb-4 text-center">Формирование заявки</h2>

            @if ($errors->any())
                <article class="text-red-600 mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </article>
            @endif

            <form method="POST" action="/applications/create" class="flex flex-col space-y-4">
                @csrf

                <article class="flex flex-col">
                    <label class="ms-1 font-light">Наименование курса:</label>
                    <input type="text" name="course_name" value="{{ old('course_name') }}"
                        class="border border-gray-400 rounded-lg px-3 py-2 focus:outline-none">
                </article>

                <article class="flex flex-col">
                    <label class="ms-1 font-light">Желаемая дата начала:</label>
                    <input type="date" name="start_date" value="{{ old('start_date') }}"
                        class="border border-gray-400 rounded-lg px-3 py-2 focus:outline-none">
                </article>

                <article class="flex flex-col">
                    <label class="ms-1 font-light">Способ оплаты:</label>
                    <select name="payment_method"
                        class="border border-gray-400 rounded-lg px-3 py-2 focus:outline-none">
                        <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Наличные</option>
                        <option value="phone_transfer"
                            {{ old('payment_method') == 'phone_transfer' ? 'selected' : '' }}>Перевод по телефону
                        </option>
                    </select>
                </article>

                <button type="submit"
                    class="bg-teal-700 font-semibold self-center px-15 text-white py-2 rounded-lg cursor-pointer hover:bg-teal-800 duration-150">
                    Отправить
                </button>
            </form>

            <article class="mt-4 text-center">
                <a href="/applications" class="text-blue-500 font-bold hover:underline"><- Назад</a>
            </article>
        </article>
    </main>

</body>

</html>
