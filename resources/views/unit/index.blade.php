@extends('layouts.app')

@section('content')
    <section class="pt-10">
        <div class="container">
            <h2 class="_title text-primary mb-8 lg:mb-[60px] text-3xl xs:text-4xl lg:text-5xl 2xl:text-6xl/[1]">
                {{ $category->title }}
            </h2>
            @if($units->isNotEmpty())
                <div class="grid lg:grid-cols-2 2xl:grid-cols-3 gap-4 text-black mb-6 md:mb-[60px]">
                    @foreach ($units as $unit)
                        @php
                            $img = asset('/images/no-img.svg');
                            if(isset($unit->thumbnail)){
                                $img = makeThumbnail('storage/' . $unit->thumbnail, 'nullx600');
                            }
                        @endphp
                        <div class="p-4 rounded-[20px] bg-white">
                            <div class="flex gap-3 xs:gap-[30px] mb-3 xs:mb-[30px]">
                                <div class="h-[216px] xs:min-w-[190px] min-w-[150px] relative rounded overflow-hidden">
                                    <a href="{{ route('unit.show', $unit->slug) }}">
                                        <img class="object-cover h-full w-full" src="{{ $img }}" alt="{{ $unit->title }}">
                                    </a>
                                </div>
                                <div class="flex flex-col justify-between">
                                    <h4 class="mb-3 text-lg xs:text-[21px]/[calc(24/21*100%)] uppercase font-commissioner-700">
                                        <a href="{{ route('unit.show', $unit->slug) }}">{{ $unit->title }}</a>
                                    </h4>
                                    <p class="line-clamp-6 mb-2">
                                        {{ $unit->content }}
                                    </p>
                                    <a class="text-primary-light mt-auto" href="{{ route('unit.show', $unit->slug) }}">Подробнее</a>
                                </div>
                            </div>
                            <form class="vote_form" method="POST" action="{{ route('vote', ['id' => $unit->id]) }}">
                                @csrf
                                <button class="text-white bg-primary disabled:bg-gray w-full py-2.5 rounded-lg" @if($isDisabledVoteButton) disabled="disabled" @endif type="submit">
                                Голосовать
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
                {{ $units->onEachSide(2)->links() }}
            @else
                <p class="text-xl">В разделе еще нет записей</p>
            @endif
        </div>
    </section>
@endsection