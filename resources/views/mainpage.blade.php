@extends('layouts.layout')
@section('title')
    Главная страница
@endsection

@section('content')
    <section class="flex flex-row container mx-auto justify-center relative">
        <article class="bg-gray-100/50 w-full h-auto"></article>
        <article class="relative w-full max-w-250 h-auto overflow-hidden">
            <article id="carousel" class="flex transition-transform duration-500">
                <img src="https://avatars.mds.yandex.net/i?id=89d150972a743cedd1ec9667b19287c3_l-4988848-images-thumbs&n=13"
                    class="w-full flex-shrink-0" />
                <img src="https://avatars.mds.yandex.net/i?id=8841f062b726e41a39a5d47ba6271522_l-16494489-images-thumbs&n=13"
                    class="w-full flex-shrink-0" />
                <img src="https://avatars.mds.yandex.net/i?id=0c0f8b0e7797532934c87ba0c59f871d_l-12851522-images-thumbs&n=13"
                    class="w-full flex-shrink-0" />
                <img src="https://t4.ftcdn.net/jpg/00/59/53/11/360_F_59531145_qgiegEgV8AiQ9wjktLaK5clWzt9xO9J4.jpg"
                    class="w-full flex-shrink-0" />
            </article>

            <button id="prev"
                class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/70 p-2 rounded-full shadow font-bold px-3.5 hover:bg-white/90 duration-150 cursor-pointer">
                < </button>

                    <button id="next"
                        class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/70 p-2 rounded-full shadow font-bold px-3.5 hover:bg-white/90 duration-150 cursor-pointer">
                        >
                    </button>
        </article>
        <article
            class="flex flex-col bg-white shadow-2xl absolute top-1/12 left-7.5 rounded-xl pt-5 pb-15 px-15 gap-15 w-175">
            <article class="flex flex-col gap-1.5">
                <h1 class="text-3xl font-bold text-teal-800">Желаете получить дополнительное образование?</h1>
                <p class="text-xl font-light text-teal-800 text-end">И в комфортных условиях?</p>
            </article>
            <article class="flex flex-col relative left-15">
                <p class="text-2xl text-teal-800">Обращайтесь к нам: <b>Korochk.i++</b></p>
                <p class="text-lg text-teal-800">- И получите <b class="text-rose-700 font-black">скидку</b> на первое
                    занятие!</p>
            </article>
            <a href="/register" class="bg-teal-700 text-white rounded-xl py-3.5 px-5 font-bold self-end">Начать обучение</a>
        </article>
    </section>
    <section class="flex flex-col items-center gap-7.5 my-15">
        <h2 class="font-bold text-2xl text-teal-800">Наши преимущества:</h2>
        <ul class="flex flex-row gap-15">
            <li class="flex flex-col items-center gap-1.5"><img src="https://www.wehive.digital/upload/medialibrary/b44/b440d82697b724da1818d546759501f1.png"
                    alt="" class="w-15 h-15">
                <p class="text-lg font-semibold text-teal-800 text-center w-75">У нас отучились 100+ учеников</p>
            </li>
            <li class="flex flex-col items-center gap-1.5"><img src="https://avatars.mds.yandex.net/i?id=35daf5d76dd2899d6a1c7b38eaaa3f13_l-5220968-images-thumbs&n=13"
                    alt="" class="w-15 h-15">
                <p class="text-lg font-semibold text-teal-800 text-center w-75">99% уже работают по своей профессии</p>
            </li>
            <li class="flex flex-col items-center gap-1.5"><img src="https://static.vecteezy.com/system/resources/previews/019/787/057/non_2x/business-handshake-on-transparent-background-free-png.png"
                    alt="" class="w-15 h-15">
                <p class="text-lg font-semibold text-teal-800 text-center w-75">Проводим безопасные сделки по оплате и проведению уроков</p>
            </li>
        </ul>
    </section>
    <section class="flex flex-col items-center container mx-auto px-5 pb-15 gap-7.5">
        <h3 class="font-bold text-2xl text-teal-800">Ответы на частые вопросы:</h3>
        <article class="flex flex-col w-6/12 gap-5">
            <ul class="flex flex-col gap-1.5 bg-stone-200/75 py-5 px-15 rounded-xl w-full relative cursor-pointer hover:bg-stone-200 duration-150 faq-list">
                <li class="font-bold text-teal-800 text-xl">Сколько стоит обучение?</li>
                <li class="text-teal-800 text-lg hidden">- В среднем за один урок 100 рублей</li>
                <span class="absolute right-5 top-3.5 text-2xl font-bold cursor-default">^</span>
            </ul>
            <ul class="flex flex-col gap-1.5 bg-stone-200/75 py-5 px-15 rounded-xl w-full relative cursor-pointer hover:bg-stone-200 duration-150 faq-list">
                <li class="font-bold text-teal-800 text-xl">Когда можно начать обучение?</li>
                <li class="text-teal-800 text-lg hidden">- В любой момент, когда вам будет удобно</li>
                <span class="absolute right-5 top-3.5 text-2xl font-bold cursor-default">^</span>
            </ul>
            <ul class="flex flex-col gap-1.5 bg-stone-200/75 py-5 px-15 rounded-xl w-full relative cursor-pointer hover:bg-stone-200 duration-150 faq-list">
                <li class="font-bold text-teal-800 text-xl">Что, если не приду на занятие?</li>
                <li class="text-teal-800 text-lg hidden">- Деликатно попросим деньги за занятие, на котором вас не было</li>
                <span class="absolute right-5 top-3.5 text-2xl font-bold cursor-default">^</span>
            </ul>
        </article>
    </section>

    <script>
        let faq_list = document.querySelectorAll(".faq-list")
        faq_list.forEach((el) => {
            el.addEventListener("click", () => {
                el.children[1].classList.toggle('hidden')
                el.children[2].classList.toggle('rotate-180')
            })
        })

        let carousel = document.getElementById("carousel");
        let slidesCount = carousel.children.length;
        let index = 0;

        function updateCarousel() {
            carousel.style.transform = `translateX(-${index * 100}%)`;
        }

        document.getElementById("next").onclick = () => {
            index = (index + 1) % slidesCount;
            updateCarousel();
        };

        document.getElementById("prev").onclick = () => {
            index = (index - 1 + slidesCount) % slidesCount;
            updateCarousel();
        };

        setInterval(() => {
            if (index == 3) {
                index = 0
            } else {
                index++
            }
            updateCarousel()
        }, 1000);
    </script>
@endsection
