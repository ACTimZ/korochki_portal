@extends("layouts.layout")

@section("title")
Вход
@endsection

@section("content")
<section class="min-h-175 flex flex-row justify-center items-center">
    <article class="bg-gray-50 border border-gray-400 py-12 px-25 rounded-xl w-2/6">
        <h1 class="text-2xl font-bold mb-5 text-center">Авторизация</h1>

        @if ($errors->has('login_error'))
            <article class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                {{ $errors->first('login_error') }}
            </article>
        @endif

        <form method="POST" action="/login" class="flex flex-col gap-5">
            @csrf

            <article>
                <label class="block font-light">Логин:</label>
                <input type="text" name="login" class="bg-white w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none" placeholder="Логин">
            </article>

            <article>
                <label class="block font-light">Пароль:</label>
                <input type="password" name="password" class="bg-white w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none" placeholder="Пароль">
            </article>

            <button type="submit" class="cursor-pointer self-center bg-teal-700 text-white font-semibold px-15 py-3 rounded-lg hover:bg-teal-800 transition-colors">
                Войти
            </button>
        </form>

        <p class="mt-4 text-center text-sm">
            <a href="/register" class="text-amber-500 text-xs hover:underline">Еще не зарегистрированы? <span class="font-bold">Регистрация</span></a>
        </p>
    </article>
</section>
@endsection
