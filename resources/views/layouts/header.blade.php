<header class="bg-teal-700">
    <article class="container mx-auto px-15 py-4 flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-white">
            <img src="{{ asset('logo.png') }}" alt="Logo">

        </a>
        <nav class="flex flex-row justify-between gap-15 items-center">
            <a href="/applications" class="text-white hover:underline">Мои заявки</a>
            <a href="/applications/create" class="text-white hover:underline">Создать заявку</a>
            @if (session()->get('is_admin'))
                <a href="/admin" class="text-white hover:underline">Админка</a>
            @endif
            @if (!session()->has('user_id'))
                <article class="flex flex-row gap-5">
                    <a href="/login"
                        class="duration-150 rounded-xl bg-white hover:bg-white/75 text-teal-700 font-bold px-3.5 py-1.5">Войти</a>
                    <a href="/register"
                        class="text-white font-bold border-1 hover:bg-white/25 border-white py-1.5 px-3.5 duration-150 rounded-xl">Зарегистрироваться</a>
                </article>
            @endif
            @if (session()->has('user_id'))
                <a href="/logout"
                    class="text-white duration-150 bg-red-700 hover:bg-red-800 py-1.5 px-2.5 rounded-xl">Выйти</a>
            @endif
        </nav>
    </article>
</header>
