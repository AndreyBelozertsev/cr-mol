<?php

namespace App\Models;


use App\Traits\HasSeo;
use App\Traits\HasSlug;
use App\Traits\CreateSeo;
use App\Traits\ScopeActive;
use App\QueryBuilders\UnitQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Unit extends Model
{
    use HasFactory, HasSlug, HasSeo, CreateSeo, ScopeActive;

    protected $fillable = [
        'title',
        'slug',
        'address',
        'description',
        'content',
        'thumbnail',
        'images',
        'category_id',
        'status'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function newEloquentBuilder($query): UnitQueryBuilder 
    {
         return new UnitQueryBuilder($query);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected $routeName = 'unit.show';

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

    public function users():BelongsToMany
    {
        return $this->belongsToMany(
            User::class, 'likes'
        )->withTimestamps();
    }

}
