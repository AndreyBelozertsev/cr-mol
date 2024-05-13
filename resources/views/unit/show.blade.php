@extends('layouts.app')

@section('content')

@php
    $img = asset('/images/no-img.svg');
    if(isset($unit->thumbnail)){
        $img = makeThumbnail('storage/' . $unit->thumbnail, 'nullx600');
    }
@endphp
<div class="breadcrumbs pt-10">
    <div class="container">
        <ul class="text-primary-light flex gap-9 gap-y-2 flex-wrap">
            <li>
                <a class="font-commissioner-300 text-xl/[calc(20.5/20*100%)]" href="/">Премия Крым Молодёжный</a>
            </li>
            <li>
                <a class="font-commissioner-300 text-xl/[calc(20.5/20*100%)]"
                    href="{{ route('category.show', $unit->category->slug) }}">Номинация
                    «{{ $unit->category->title  }}»</a>
            </li>
            <li class="active text-primary">
                <span class="font-commissioner-700 text-xl/[calc(20.5/20*100%)]">{{ $unit->title }}</span>
            </li>
        </ul>
    </div>
</div>
<section class="mt-7 md:mt-[60px]">
    <div class="container">
        <div class="flex gap-7 flex-wrap justify-center lg:flex-nowrap 2xl:gap-[60px] lg:justify-between">
            <div class="max-w-[340px] xl:max-w-[436px] w-full">
                <div class="rounded-[20px] relative w-full pb-[91.745%] mb-[30px] overflow-hidden">
                    <img class="absolute w-full h-full" src="{{ $img }}" alt="{{ $unit->title }}">
                </div>
                <form class="vote_form" method="POST" action="{{ route('vote', ['id' => $unit->id]) }}">
                    @csrf
                    <button class="text-white bg-primary disabled:bg-gray text-xl/[calc(20.5/20*100%)] w-full py-3.5 rounded-lg" @if($isDisabledVoteButton) disabled="disabled" @endif type="submit">
                    Голосовать
                    </button>
                </form>
            </div>
            <div class="w-full text-black text-lg md:text-xl/[calc(20.5/20*100%)] mr-auto relative pt-10 2xl:pt-0">
                <h1
                    class="text-black uppercase font-commissioner-700 mb-5 lg:mb-10 text-3xl xs:text-4xl lg:text-5xl 2xl:text-6xl/[1] max-w-[615px]">
                    {{ $unit->title }}
                </h1>
                <div>
                    <ul class="max-w-[615px]">
                        @if($unit->address)
                            <li class="flex items-center gap-2.5 mb-2.5">
                                <img class="h-[30px] w-9" src="/images/icons/lightning.svg" alt="">
                                <p>{{ $unit->address }}</p>
                            </li>
                        @endif
                        @if($unit->age)
                            <li class="flex items-center gap-2.5 mb-2.5">
                                <img class="h-[30px] w-9" src="/images/icons/lightning.svg" alt="">
                                <p>{{ $unit->age }}</p>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="grid gap-4 xl:gap-8 mb-5 xl:mb-8 max-w-[615px]">
                    {!! $unit->content !!}
                </div>
            </div>
        </div>
    </div>
</section>
@if($unit->images && count($unit->images))
    <section class="mt-7 md:mt-[60px]">
        <div class="container">
            <div>
                <div class="md:px-16 relative">
                    <div class="swiper swiper-default gallery-slider" style="padding:0 32px 40px 32px">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            @foreach($unit->images as $image)
                                <a class="swiper-slide" href="{{ asset('storage/' . $image) }}">
                                    <div class="rounded-lg overflow-hidden">
                                        <div>
                                            <img src="{{ makeThumbnail('storage/' . $image, '518x320', 'fit') }}" alt="{{ $unit->title }}">
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
@endsection