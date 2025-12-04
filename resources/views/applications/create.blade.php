@extends("layouts.layout")

@section("title")
Создание заявки на обучение
@endsection

@section("content")
<main class="flex-grow px-4 py-6 flex justify-center min-h-175">
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
                <select name="leson_id" id="" class="border border-gray-400 rounded-lg px-3 py-2 focus:outline-none">
                    <option value="1" {{ old('leson_id') == 1 ? 'selected' : '' }}>Основы алгоритмизации и программирования</option>
                    <option value="2"
                        {{ old('leson_id') == 2 ? 'selected' : '' }}>Основы веб-дизайна
                    </option>
                    <option value="3" {{ old('leson_id') == 3 ? 'selected' : '' }}>Основы проектирования баз данных</option>
                </select>
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
@endsection
