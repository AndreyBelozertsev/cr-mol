<?php
namespace App\QueryBuilders;


use Illuminate\Database\Eloquent\Builder;

class CategoryQueryBuilder extends Builder
{

    public function activeItem($slug): CategoryQueryBuilder
    {
        return $this->active()
            ->where('slug', $slug)
            ->with([
                'child' => fn ($query) => $query
                    ->active()
                    ->orderBy('sort', 'asc')
                    ->select(['id','title','slug','sort','thumbnail','content','status','type_of','category_id'])
            ])
            ->select(['id','title','slug','sort','thumbnail','content', 'status', 'category_id']);
    }
    public function activeItems(): CategoryQueryBuilder
    {
        return $this->active()
            ->orderBy('sort', 'asc')
            ->select(['title','slug','sort','thumbnail','content', 'status', 'type_of']);
    }

}