@props([
    'category'
])
<a style="font-family:Commissioner-Regular" href="{{route('category.show', ['slug' => $category->slug]) }}">
    <div class="rounded-[20px] lg:min-h-[248px] bg-primary px-9 py-[30px] relative">
        <h4 class="font-commissioner-700 text-lg lg:text-[21px]/[calc(24/21*100%)] mb-3 uppercase text-ellipsis max-w-[248px] overflow-hidden">
        {{ $category->title }}
        </h4>
        <p>{{ $category->content }}</p>
        <img class="absolute block w-[52px] h-[45px] top-[14px] right-4" src="{{ Storage::disk('public')->url($category->thumbnail)  }}" alt="{{ $category->title }}">
    </div>
</a>