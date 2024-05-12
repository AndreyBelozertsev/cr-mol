@extends('layouts.app')

@section('content')
    <section class="py-8 md:py-16">
        <div class="container">
            <div>
                <h1 class="_title text-primary mb-5 lg:mb-10 text-2xl lg:text-[38px]/[calc(40/38*100%)]">Авторизация</h1>
            </div>
            <p
                class="text-center font-eesti-500 tracking-wide text-xl w-fit px-5 py-3 rounded text-accent-r bg-accent mb-10">
                Внимание! Для участия в голосовании необходимо зарегистрироваться!
            </p>
            <div>
                <a href="{{ route('socailite.redirect','vkontakte') }}"
                    class="min-h-[50px] w-fit xl:w-min text-center 2xl:w-fit px-5 flex justify-center items-center rounded-full bg-azure ml-auto xl:ml-0 font-eesti-400 text-white text-sm sm:text-base">
                    Авторизоваться через VK
                </a>
                <p class="mt-4">Нажимая на кнопку "Авторизоваться через VK" вы соглашаетесь с <a class="font-bold underline" href="/policy">политикой обработки персональных данных</a>.</p>
            </div>
        </div>
    </section>
@endsection