@extends("layouts.layout")

@section("title")
Главная страница
@endsection

@section("content")
<main class="flex-grow flex items-center justify-center min-h-175">
    <article class="text-center">
        <h2 class="text-3xl font-bold mb-4">Добро пожаловать!</h2>
        <p class="text-gray-700">Вы вошли в систему как
            <b>{{ session()->get('is_admin') ? 'администратор' : 'пользователь' }}</b></p>
    </article>
</main>
@endsection
