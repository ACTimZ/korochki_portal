@extends('layouts.layout')

@section('title')
    Мои заявки
@endsection

@section('content')
    <main class="flex-grow px-4 py-6 container mx-auto min-h-175">
        <h2 class="text-2xl font-bold mb-4">Мои заявки</h2>

        @if (session('success'))
            <p class="text-green-600 mb-4">{{ session('success') }}</p>
        @endif

        @if ($applications->isEmpty())
            <p class="text-gray-400 font-semibold text-3xl mb-15">У вас сейчас нет заявок на обучение!</p>
        @else
            {{-- @foreach ($lesons as $lsn)
                <div>
                    {{ $lsn->leson }}
                    <!-- Или любое другое поле из таблицы lesons -->
                </div>
            @endforeach --}}
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
                                <td class="border px-4 py-2">{{ $lesons[$app->leson_id - 1]->leson }}</td>
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
                                            <textarea name="review" rows="2" class="border rounded-lg px-2 py-1 resize-none focus:outline-none"></textarea>
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
@endsection
