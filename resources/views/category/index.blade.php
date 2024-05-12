@extends('layouts.app')

@section('content')
    <section class="py-8 md:py-16">
        <div class="container">
            <h1 class="_title text-primary mb-10 lg:mb-[110px] text-3xl xs:text-4xl lg:text-5xl 2xl:text-6xl/[1]">
                {{ $category->title }}
            </h1>
            <div>
                <div class="grid md:grid-cols-2 2xl:grid-cols-3 gap-4 text-white">
                    @foreach ($category->child  as $categoryChild)
                        @if($categoryChild->type_of->value == 'special')
                            <x-category.special.list-item :category="$categoryChild" />
                        @else
                            <x-category.standart.list-item :category="$categoryChild" />
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection