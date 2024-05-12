<?php
namespace App\Models;


use App\Traits\HasSeo;
use App\Traits\HasSlug;
use App\Traits\CreateSeo;
use App\Traits\ScopeActive;
use App\QueryBuilders\PageQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Page extends Model
{
    use HasFactory, HasSlug, ScopeActive, HasSeo, CreateSeo;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'sort',
        'status',
    ];

    protected $routeName = 'page.show';

    public function newEloquentBuilder($query): PageQueryBuilder 
    {
        return new PageQueryBuilder($query);
    }

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

    protected function slugFrom():string
    {
        return 'slug';
    }
}
