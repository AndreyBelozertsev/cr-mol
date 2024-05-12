@props([
    'category'
])
<div class="rounded-[20px] lg:min-h-[248px] bg-primary px-9 py-[30px] relative">
    <h4 class="font-eesti-500 text-lg lg:text-[21px]/[calc(24/21*100%)] mb-3 uppercase text-ellipsis max-w-[248px] overflow-hidden">
        <a href="{{route('category.show', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
    </h4>
    <p>{{ $category->content }}</p>
    <img class="absolute block w-[52px] h-[45px] top-[14px] right-4" src="{{ Storage::disk('public')->url($category->thumbnail)  }}" alt="{{ $category->title }}">
</div>