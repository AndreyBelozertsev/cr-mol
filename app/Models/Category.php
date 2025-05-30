<?php

namespace App\Models;

use App\Models\Seo;
use App\Traits\HasSeo;
use App\Traits\HasSlug;
use App\Traits\CreateSeo;
use App\Enums\CategoryEnum;
use App\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Model;
use App\QueryBuilders\CategoryQueryBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasSlug, HasSeo, CreateSeo, ScopeActive;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'type_of',
        'status'
    ];


    protected $casts = [
        'type_of' => CategoryEnum::class
    ];

    public function newEloquentBuilder($query): CategoryQueryBuilder 
    {
         return new CategoryQueryBuilder($query);
    }


    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function child()
    {
        return $this->hasMany(self::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'category_id', 'id');
    }

    public function category_direction(): BelongsTo
    {
        return $this->belongsTo(CategoryDirection::class);
    }

    protected $routeName = 'category.show';

    protected function makeUrl($slug = null):string
    {
        if(!$slug){
            $slug = $this->slug;
        }

        return route($this->routeName, ['slug' => $slug] );
    }

    public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

}
