@extends("layouts.layout")

@section("title")
Админ-панель
@endsection

@section("content")
<main class="flex-grow px-4 py-6 container mx-auto min-h-175">
    <h2 class="text-2xl font-bold mb-5 mt-15">Заявки от пользователей</h2>
{{-- {{ dd($lesons) }} --}}
    @if (session('success'))
        <p class="text-green-600 mb-4">{{ session('success') }}</p>
    @endif

    @if ($applications->isEmpty())
        <p class="text-gray-600">Админ-панель: сейчас нет заявок.</p>
    @else
        <article class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-teal-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Пользователь</th>
                        <th class="px-4 py-2">Курс</th>
                        <th class="px-4 py-2">Дата начала</th>
                        <th class="px-4 py-2">Оплата</th>
                        <th class="px-4 py-2">Статус</th>
                        <th class="px-4 py-2">Отзыв</th>
                        <th class="px-4 py-2">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $app)
                        <tr class="bg-teal-100/75 even:bg-teal-50 hover:bg-teal-100 duration-150">
                            <td class="border px-4 py-2 text-center">{{ $app->id }}</td>
                            <td class="border px-4 py-2">{{ $app->user->fio }}<br>({{ $app->user->login }})</td>
                            <td class="border px-4 py-2 font-semibold">{{ $lesons[$app->leson_id - 1]->leson }}</td>
                            <td class="border px-4 py-2">{{ $app->start_date }}</td>
                            <td class="border px-4 py-2 text-center">
                                @if ($app->payment_method == 'cash')
                                    Наличные
                                @else
                                    Перевод по телефону
                                @endif
                            </td>
                            <td class="border px-4 py-2 text-center font-semibold">{{ $app->status }}</td>
                            <td class="border px-4 py-2">{{ $app->review ?? '—' }}</td>
                            <td class="border w-auto py-4">
                                <form method="POST" action="/admin/applications/{{ $app->id }}/status"
                                    class="flex flex-row items-center justify-center gap-3.5">
                                    @csrf
                                    <select name="status"
                                        class="border border-gray-400 rounded-lg px-2.5 py-1.5 focus:outline-none">
                                        <option value="new" {{ $app->status == 'new' ? 'selected' : '' }}>Новая
                                        </option>
                                        <option value="in_progress"
                                            {{ $app->status == 'in_progress' ? 'selected' : '' }}>Идёт обучение</option>
                                        <option value="completed" {{ $app->status == 'completed' ? 'selected' : '' }}>
                                            Обучение завершено</option>
                                    </select>
                                    <button type="submit"
                                        class="font-semibold bg-amber-300 hover:bg-amber-400 cursor-pointer duration-150 text-black px-4 py-1.5 rounded-lg">
                                        Обновить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
    @endif

    <article class="mt-4 text-center">
        <a href="/applications" class="text-blue-500 font-bold hover:underline"><- Назад</a>
    </article>
</main>
@endsection
