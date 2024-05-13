@extends('layouts.app')

@section('content')
<section class="py-8 md:py-16">
    <div class="container">
        <div>
            <h1 class="_title text-primary mb-5 lg:mb-10 text-2xl lg:text-[38px]/[calc(40/38*100%)]">Мой профиль</h1>
        </div>
        @fullInformation
            <p
                class="text-center font-commissioner-700 tracking-wide text-xl w-fit px-5 py-3 rounded text-primary bg-accent mb-10">
                Ваш профиль полностью заполнен, можете приступать к голосованию!
            </p>
        @else
            <p
                class="text-center font-commissioner-700 tracking-wide text-xl w-fit px-5 py-3 rounded text-accent-r bg-accent mb-10">
                Внимание! Для участия в голосовании необходимо
                заполнить контактную иннформацию!
            </p>
        @endif
        <form class="max-w-[700px] profile_form" method="POST" action="{{ route('profile.store') }}">
            <div class="max-w-[450px] mx-auto">
                <div class="grid gap-1 text-lg mb-5 ">
                    <label for="first_name">Имя<span class="text-red-600">*</span></label>
                    <input 
                        class="py-3 px-5 border border-primary-light rounded-lg outline outline-0 focus:outline-0 focus:border-2 focus:border-primary-light" 
                        type="text" 
                        name="first_name"
                        placeholder="Имя" 
                        value="{{ $user->first_name }}">
                    <span class="text-error text-sm feedback-error hidden" id="first_name-error">
                        <img class="inline align-bottom" src="{{ asset('images/icons/warning-filled.svg') }}" alt="ошибка">
                        <span>Ошибка</span>
                    </span>
                </div>
                <div class="grid gap-1 text-lg mb-5 ">
                    <label for="last_name">Фамилия<span class="text-red-600">*</span></label>
                    <input 
                        class="py-3 px-5 border border-primary-light rounded-lg outline outline-0 focus:outline-0 focus:border-2 focus:border-primary-light" 
                        type="text" 
                        name="last_name"
                        placeholder="Фамилия" 
                        value="{{ $user->last_name }}">
                    <span class="text-error text-sm feedback-error hidden" id="last_name-error">
                        <img class="inline align-bottom" src="{{ asset('images/icons/warning-filled.svg') }}" alt="ошибка">
                        <span>Ошибка</span>
                    </span>
                </div>
                <div class="grid gap-1 text-lg mb-5">
                    <label for="patronymic">Отчество</label>
                    <input class="py-3 px-5 border border-primary-light rounded-lg outline outline-0 focus:outline-0 focus:border-2 focus:border-primary-light"
                        type="text" 
                        name="patronymic"
                        placeholder="Отчество" 
                        value="{{ $user->patronymic }}">
                    <span class="text-error text-sm feedback-error hidden" id="patronymic-error">
                        <img class="inline align-bottom" src="{{ asset('images/icons/warning-filled.svg') }}" alt="ошибка">
                        <span>Ошибка</span>
                    </span>
                </div>
                <div class="grid gap-1 text-lg mb-5">
                    <label for="phone">Телефон<span class="text-red-600">*</span></label>
                    <input class="py-3 px-5 border border-primary-light rounded-lg phone-number outline outline-0 focus:outline-0 focus:border-2 focus:border-primary-light" 
                        type="text"
                        name="phone" 
                        placeholder="Телефон" 
                        value="{{ $user->phone }}">
                    <span class="text-error text-sm feedback-error hidden" id="phone-error">
                        <img class="inline align-bottom" src="{{ asset('images/icons/warning-filled.svg') }}" alt="ошибка">
                        <span>Ошибка</span>
                    </span>
                </div>
                <div class="grid gap-1 text-lg mb-5">
                    <label for="birthday">Дата рождения<span class="text-red-600">*</span></label>
                    <input class="py-3 px-5 border border-primary-light rounded-lg outline outline-0 focus:outline-0 focus:border-2 focus:border-primary-light" 
                        type="date" 
                        name="birthday"
                        placeholder="Дата рождения" 
                        value="{{ $user->birthday }}">
                    <span class="text-error text-sm feedback-error hidden" id="birthday-error">
                        <img class="inline align-bottom" src="{{ asset('images/icons/warning-filled.svg') }}" alt="ошибка">
                        <span>Ошибка</span>
                    </span>
                </div>
                <div class="grid gap-1 text-lg mb-5 relative select-inp">
                    <label for="city_id">Муниципальное образование<span class="text-red-600">*</span></label>
                    <select class="py-3 px-5 border border-primary-light rounded-lg outline outline-0 focus:outline-0 focus:border-2 focus:border-primary-light" name="city_id">
                        <option value=""> - </option>
                        @foreach ($cities as $city)
                            <option @if($city->id == $user->city_id) selected="selected" @endif
                                value="{{ $city->id }}">{{ $city->title }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-error text-sm feedback-error hidden" id="city_id-error">
                        <img class="inline align-bottom" src="{{ asset('images/icons/warning-filled.svg') }}" alt="ошибка">
                        <span>Ошибка</span>
                    </span>
                </div>
                <div class="py-6 lg:py-4">
                        <div class="custom-checkbox-mark">
                            <input type="checkbox" id="custom-checkbox-agree" name="agree">
                            <label for="custom-checkbox-agree"><span>Согласен с политикой обработки персональных данных</span></label>
                            <p class="text-error text-sm feedback-error hidden" id="agree-error">
                                <img class="inline align-bottom" src="{{ asset('images/icons/warning-filled.svg') }}">
                                <span></span>
                            </p>
                        </div>
                    </div>
                <div>
                    <button class="text-white bg-primary w-full py-2.5 rounded-lg" type="submit">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection