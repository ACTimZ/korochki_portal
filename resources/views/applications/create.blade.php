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
@endsection
